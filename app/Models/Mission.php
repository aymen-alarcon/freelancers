<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = ["title", "description", "budget", "duree", "type", "status", "client_id", "category_id"];
}
