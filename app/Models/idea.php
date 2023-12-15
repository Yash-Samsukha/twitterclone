<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;
protected $fillable=[
    'content',
    'user_id',
    'likes',
    ];

public function  comments(){
    return $this->hasMany(Comment::class);
}
public function user(){
    Return $this->belongsTo(User::class);
}
}
