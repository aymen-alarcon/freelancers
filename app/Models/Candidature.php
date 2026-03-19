<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    protected $fillable = ["mission_id", "freelancer_id", "lettre_de_motivation", "tarif_proposer", "status"];

    public function mission():BelongsTo{
        return $this->belongsTo(Mission::class, "mission_id");
    }

    public function freelancer():BelongsTo{
        return $this->belongsTo(User::class, "freelancer_id");
    }
}
