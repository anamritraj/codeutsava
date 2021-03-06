<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Response extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "receipt_id",
        "hospital_id",
        "question_id",
        "response",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
