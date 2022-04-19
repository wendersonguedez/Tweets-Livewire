<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // Indicando quais colunas podem ser preenchidas ao passar o método create().
    protected $fillable = ['content'];

    // Recuperando o usuário autor de um tweet.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
