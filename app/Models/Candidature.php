<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = ["mission_id", "technology_id", "lettre_de_motivation", "tarif_proposer", "status"];
}
