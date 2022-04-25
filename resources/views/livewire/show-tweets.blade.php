<div>
    Show Tweets

    <p>{{ $content }}</p>

    {{-- Submetendo o envio do formulário para o método create(). prevent impede a ação default daquele elemento, no caso do formulário, impede o reload da página. --}}
    <form method="POST" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        <button type="submit">Criar tweet</button>
        <br>
        {{-- Caso exista um erro em content, ele será exibido --}}
        @error('content')
            {{ $message }}
        @enderror
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{-- Capturando o nome do usuário (através do relacionamento criado na model 'Tweet') e seu respectivo tweet. --}}
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
        <hr>
    @endforeach
</div>
