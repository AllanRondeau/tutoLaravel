<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function Post(){
        return $this->belongsToMany(Post::class);
    }
}
