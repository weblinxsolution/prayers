<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_features extends Model
{
    use HasFactory;

    public function feature_images()
    {
        return $this->belongsTo(feature_images::class, 'id', 'feature_id');
    }
}
