<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $fillable = [
        'added_by',
        'product_name',
        'description',
        'price',
        'photo',
        'category',
        'specification',
        'color',
        'size',
    ];

    protected $casts = [
        'category' => 'json', 
        'specification' => 'json',
        'color' => 'json',
        'size' => 'json',
    ];

    // Foreign relationship
    public function user() {
        return $this->belongsTo(User::class, 'added_by');
    }

    use HasFactory;
}
