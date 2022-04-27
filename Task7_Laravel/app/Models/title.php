<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    use HasFactory;

    protected $table = "category";

    protected $fillable = ["name","password","email","image"];

    public $timestamps = false;


    }
