<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = "products";

    protected $fillable = [];
    protected $hidden   = [];

    public $timestamp   = false;
}
