<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Hospital extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "name",
        "address",
        "avg_rating",
        "contact_info",
        "specialiations",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
