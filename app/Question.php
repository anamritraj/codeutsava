<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Question extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "question",
        "isValid",
        "category_id",
        "question_description",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "id"
    ];
}
