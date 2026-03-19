<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientProfile extends Model
{
    protected $fillable = ["entreprise", "description", "historique_missions", "user_id"];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, "user_id");
    }

    public function missions():HasMany{
        return $this->hasMany(Mission::class, "client_id");
    }
}