<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->belongsToMany(Books::class, 'books_authors', 'books_id','authors_id');
    }
}
