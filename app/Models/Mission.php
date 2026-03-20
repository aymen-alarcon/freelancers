<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mission extends Model
{
    protected $fillable = ["title", "description", "budget", "duree", "type", "status", "client_id", "category"];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class, "category_id");
    }

    public function client():BelongsTo{
        return $this->belongsTo(User::class, "client_id");
    }

    public function technologies(): BelongsToMany {
        return $this->belongsToMany(Technology::class, "mission_technology");
    }
}