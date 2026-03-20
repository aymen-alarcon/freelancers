<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ["rating", "author_id", "target_id"];

    public function author():BelongsTo{
        return $this->belongsTo(User::class, "author_id");
    }

    public function target():BelongsTo{
        return $this->belongsTo(User::class, "target_id");
    }

    public function mission():BelongsTo{
        return $this->belongsTo(Mission::class, "mission_id");
    }
}
