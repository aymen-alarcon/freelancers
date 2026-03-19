<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    protected $fillable = ["name"];

    public function freelanceProfiles():BelongsToMany{
        return $this->belongsToMany(FreeLancerProfile::class, "freelancer_tech", 'technology_id', 'freelancer_id');
    }

    public function missions(): BelongsToMany {
        return $this->belongsToMany(Mission::class, 'mission_technology', 'technology_id', 'mission_id');
    }

}