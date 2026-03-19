<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeLancerProfile extends Model
{
    protected $fillable = ["competences", "tarif_journalier", "portfolio", "experience", "disponibilite", "evaluation_moyenne", "user_id"];
}
