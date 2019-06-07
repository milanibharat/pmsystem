<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GaryPEGEOT\GravityFormsAPI\Client;

class CommentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function url() {
        $url = 'https://stormy-serval.w5.gravitydemo.com';
        $key = 'ck_c3f7cd48ed6c8720194a372701172b241f9058a4';
        $secret = 'cs_d2042e593e204c087e30b9bf081756abecc93f0f';
        $client = new Client($url, $key, $secret);
        $entries = $client->getFormEntries(1);
        var_dump($entries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Auth::check()) {
            $comment = Comment::create([
                        'body' => $request->input('body'),
                        'url' => $request->input('url'),
                        'commentable_id' => $request->input('commentable_id'),
                        'commentable_type' => $request->input('commentable_type'),
                        'user_id' => Auth::user()->id
            ]);

            if ($comment) {
                return back()->with('success', 'Comment created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new comment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment) {
        //
    }

}
