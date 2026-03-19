<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{
    protected $fillable = ["entreprise", "description", "historique_missions", "user_id"];
}
