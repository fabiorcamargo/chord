<div>
    <div class="pt-4">
    <x-filament::button wire:click="SetBackground">
    Definir Plano de Fundo
    </x-filament::button>


    <x-filament::button wire:click="send_show">
    Projetar
    </x-filament::button>

    <video id="meuVideo" autoplay controls muted>
        <source src="{{asset('storage/'.$video->path)}}" type="video/mp4">
        Seu navegador não suporta vídeo HTML5.
      </video>

</div>
</div>
