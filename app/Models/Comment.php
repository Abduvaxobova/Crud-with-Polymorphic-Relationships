<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_name'
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
    use HasFactory;
}