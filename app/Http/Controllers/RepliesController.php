<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;

class RepliesController extends Controller
{

    public function __construct() 
    { 
        $this->middleware('auth'); 
    } 
 
    /** 
     * Persist a new reply. 
     * 
     * @param  Thread $thread 
     * @return \Illuminate\Http\RedirectResponse 
     */ 
    public function store($channelId, Thread $thread) 
    { 
        $this->validate(request(), ['body' => 'required']);
        $thread->addReply([ 
            'body' => request('body'), 
            'user_id' => auth()->id() 
        ]); 
 
        return back(); 
    } 

}
