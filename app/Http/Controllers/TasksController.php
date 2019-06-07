<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()) {
            $tasks = Task::where('user_id', Auth::user()->id)->get();
            return view('tasks.index', ['tasks' => $tasks]);
        }
        return view('auth.login');
    }

    public function adduser(Request $request) {
        //add user to project
        $task = Task::find($request->input('task_id'));
          if (Auth::user()->id == $task->user_id) {
            $user = User::where('email', $request->input('email'))->first();
           
            //to check if user already exists or not
             $taskUser= TaskUser::where('user_id',$user->id)
                                        ->where('task_id',$task->id)
                                        ->first(); 
             
             //if user already exists  then termiate/exit
             if($taskUser){
                 return redirect()->route('tasks.show', ['task'=>$task->id])
                        ->with('success', $request->input('email') . ' already exists');
             }
             
             
            if ($user && $task) {
                $task->users()->attach($user->id);   //used of toggle instead of attach (do not use $taskUser if using this)
                return redirect()->route('tasks.show', ['task'=>$task->id])
                        ->with('success', $request->input('email') . ' added to task Successfully');
            }
        }
        return redirect()->route('tasks.show',['task'=>$task->id])
                ->with('errors',' Error adding user to task');
   
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
        return view('tasks.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Auth::check()) {
            $task = Task::create([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'company_id' => $request->input('company_id'),
                        'user_id' => Auth::user()->id
                            //'user_id'=>$request->user()->id
            ]);

            if ($task) {
                return redirect()->route('tasks.show', ['task' => $task->id])
                                ->with('success', 'Task created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new task');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        //$project=  Project::where('id',$project->id)->first();
        $task = Task::find($task->id);
        $comments = $task->comments;
        return view('tasks.show', ['task' => $task, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        $task = Project::find($task->id);

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task) {
        //save data
        $taskUpdate = Task::where('id', $task->id)
                ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($taskUpdate) {
            return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Updated Successfully');
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
    public function destroy(Task $task) {
        //dd($project);
        $findTask = Task::find($task->id);
        if ($findTask->delete()) {
            //redirect
            return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
        }
        return back()->withInput()->with('error', 'Task not be deleted');
    }

}
