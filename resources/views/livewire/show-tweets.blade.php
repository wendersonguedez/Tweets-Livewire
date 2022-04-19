<div>
    Show Tweets

    <p>{{ $message }}</p>

    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    @foreach ($tweets as $tweet)
        {{-- Capturando o nome do usuário (através do relacionamento criado na model 'Tweet') e seu respectivo tweet. --}}
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
        <hr>
    @endforeach
</div>
