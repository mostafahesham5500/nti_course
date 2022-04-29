<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = ["title","content","image","start","end","added_by"];

    public $timestamps = false;


    }
