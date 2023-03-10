<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'cuerpo',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function communities(){
        return $this->belongsTo(Community::class);
    }
}
