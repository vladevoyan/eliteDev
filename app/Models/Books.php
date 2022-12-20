<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Books extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
    ];

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'books_authors', 'books_id','authors_id');
    }
}
