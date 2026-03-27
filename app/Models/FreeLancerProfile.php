<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FreeLancerProfile extends Model
{
    protected $table = 'Freelancers_profile';
    protected $fillable = ["competences", "tarif_journalier", "portfolio", "experience", "evaluation_moyenne", "user_id"];

    public function technologies():BelongsToMany{
        return $this->belongsToMany(Technology::class, "freelancer_tech", 'freelancer_id', 'technology_id');
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class, "user_id");
    }
}