<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $content = 'Apenas um teste';

    // Propriedade para validações dos campos.
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function create()
    {
        // Antes de executar o código abaixo, as regras de validações são chamadas 1º. O Laravel já subentende que as regras de validação foram definidas na propriedade $rules;
        $this->validate();

        // Inserindo os dados no banco de dados, através da model.
        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        // Após o envio do tweet, o campo do formulário é limpo.
        $this->content = '';
    }


    public function render()
    {
        /* Capturando os tweets e seus respectivos donos. with('user') faz com que seja realizada apenas duas consultas, uma para trazer todos os tweets e outra para trazer os usuários donos dos tweets. 
        'user' é o relacionamento que está sendo utilizado (relacionamento esse que foi definido na model 'Tweet'). */
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }
}
