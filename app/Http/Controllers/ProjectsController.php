<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['projects' => $projects]);
        }
        return view('auth.login');
    }

    public function adduser(Request $request) {
        //add user to project
        $project = Project::find($request->input('project_id'));
          if (Auth::user()->id == $project->user_id) {
            $user = User::where('email', $request->input('email'))->first();
           
            //to check if user already exists or not
             $projectUser= ProjectUser::where('user_id',$user->id)
                                        ->where('project_id',$project->id)
                                        ->first(); 
             
             //if user already exists  then termiate/exit
             if($projectUser){
                 return redirect()->route('projects.show', ['project'=>$project->id])
                        ->with('success', $request->input('email') . ' already exists');
             }
             
             
            if ($user && $project) {
                $project->users()->attach($user->id);   //used of toggle instead of attach (do not use $projectUser if using this)
                return redirect()->route('projects.show', ['project'=>$project->id])
                        ->with('success', $request->input('email') . ' added to project Successfully');
            }
        }
        return redirect()->route('projects.show',['project'=>$project->id])
                ->with('errors',' Error adding user to project');
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null) {
        //
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Auth::check()) {
            $project = Project::create([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'company_id' => $request->input('company_id'),
                        'user_id' => Auth::user()->id
                            //'user_id'=>$request->user()->id
            ]);

            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id])
                                ->with('success', 'Project created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) {
        //$project=  Project::where('id',$project->id)->first();
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project' => $project, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project) {
        $project = Project::find($project->id);

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project) {
        //save data
        $projectUpdate = Project::where('id', $project->id)
                ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project Updated Successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project) {
        //dd($project);
        $findProject = Project::find($project->id);
        if ($findProject->delete()) {
            //redirect
            return redirect()->route('projects.index')->with('success', 'Project Deleted Successfully');
        }
        return back()->withInput()->with('error', 'Project not be deleted');
    }

}
