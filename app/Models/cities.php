<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cities extends Model
{
    use HasFactory;
    public function countries()
    {
        return  $this->BelongsTo(countries::class, 'country_id' , 'id');
    }
}
