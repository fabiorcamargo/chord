<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Verse;
use App\Models\Book;

class Bible extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev'
    ];

    public function books() {

        return $this->hasManyThrough(
            Book::class,
            Verse::class,
            'version', // Chave estrangeira na tabela verse
            'id', // Chave primária na tabela book
            'id', // Chave primária na tabela bible
            'book' // Chave estrangeira na tabela verse
        )->distinct();
    }
}
