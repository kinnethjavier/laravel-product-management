<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'added_by',
        'category',
        'description',
    ];

    // Foreign relationship
    public function user() {
        return $this->belongsTo(User::class, 'added_by');
    }

    use HasFactory;
}
