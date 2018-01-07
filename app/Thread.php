<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    protected $guarded = [];
    function path() {
        // return "/threads/$this->id";
        return '/threads/' . $this->id;
    }

    public function replies()
    {
        return $this->HasMany(Reply::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function addReply($reply) 
    { 
        $this->replies()->create($reply); 
    } 

}
