<div>

    <video autoplay loop muted class="">
        <source

            src="{{asset('storage/'.$video->path)}}"
            type="video/mp4">
        <!-- Adicione mais sources para suporte a diferentes formatos de vídeo -->
        Your browser does not support the video tag.
    </video>

    <div class="pt-4">
    <x-filament::button wire:click="SetBackground">
    Definir Plano de Fundo
    </x-filament::button>

    
    <x-filament::button wire:click="send_show">
    Definir Plano de Fundo
    </x-filament::button>

</div>
</div>
