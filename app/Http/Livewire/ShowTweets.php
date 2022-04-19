<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{

    public $message = 'Apenas um teste';

    public function render()
    {
        /* Capturando os tweets e seus respectivos donos. with('user') faz com que seja realizada apenas duas consultas, uma para trazer todos os tweets e outra para trazer os usuários donos dos tweets. 
        'user' é o relacionamento que está sendo utilizado (relacionamento esse que foi definido na model 'Tweet'). */
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }
}
