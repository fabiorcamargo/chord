<div>


    @if($slide->bg_type == 'image')
    <div class="p-4">
        <div id="teste">
            <div style="width:300px; height:200px; background-color:black ">
                <div class="bg-cover bg-center"
                    style="width:300px; height:200px; background-image: url('{{asset('storage/'.$slide->image_background)}}'); {{$slide->image_show == true ? "" : "
                    display: none"}}">
                    <div class="h-full w-full overflow-hidden bg-fixed"
                        style="background-color: {{$config->content['bg_color']}}">
                        <div class="flex justify-center items-center h-full">
                            <div class="text-white p-4">

                                <div style="{{$slide->text_show == true ? "" : " display: none"}}">
                                    {{-- <h1 class="ml9">
                                        <span class="text-wrapper">
                                            <span class="letters">Coffee mornings</span>
                                        </span>
                                    </h1> --}}
                                    <h1 class="text-center"
                                        style="font-family: {{$slide->font_type}}; font-weight: 400; font-size: {{$FontSize*3}}px;">
                                        {!! $slide->text !!}</h1> <!-- Adicionando classe text-center -->
                                    <h4
                                        style="font-family: {{$slide->font_type}}; font-size: {{$FontSize*2}}px; text-align: right;">
                                        {!! $slide->end !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($slide->bg_type == 'video')

        <div style="width:300px; height:200px; background-color:black; position: relative;">
            <!-- Vídeo de fundo -->
            <video autoplay loop muted class="bg-cover bg-center absolute top-0 left-0 w-full h-full"
                style="{{$slide->image_show == true ? "" : " display: none"}}">
                <source src="{{asset('storage/'.$slide->video_background)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Texto sobre o vídeo -->
            <div class="h-full w-full overflow-hidden bg-fixed absolute top-0 left-0"
                style="background-color: {{$config->content['bg_color']}}">
                <div class="flex justify-center items-center h-full">
                    <div class="text-white p-4">

                        <div style="{{$slide->text_show == true ? "" : " display: none"}}">
                            <h1 class="text-center"
                                style="font-family: {{$slide->font_type}}; font-weight: 400; font-size: {{$FontSize*3}}px;">
                                {!! $slide->text !!}</h1>
                            <!-- Adicionando classe text-center -->
                            <h4
                                style="font-family: {{$slide->font_type}}; font-size: {{$FontSize*2}}px; text-align: right;">
                                {!! $slide->end !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @endif



        <div class="inline-flex flex-grow space-x-2 pt-2 justify-end"> <!-- Adicionado flex-grow para ocupar todo o espaço disponível -->
            <button class="p-2 border border-gray-600 rounded" wire:click="back" wire:keyup.left="next" title="Anterior">
                <x-heroicon-o-chevron-left class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="swichimage" title="Ocultar Fundo">
                <x-gmdi-image-not-supported-o class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="swichtext" title="Ocultar Texto">
                <x-gmdi-font-download-off-o class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="next" title="Próximo">
                <x-heroicon-o-chevron-right class="h-5 w-5" />
            </button>
            <div class="px-2"> <!-- Mantido o px-2 para espaçamento -->
                <button class="p-2 border border-gray-600 rounded" wire:click="recharge" title="Recarregar">
                    <x-heroicon-s-arrow-path class="h-5 w-5" />
                </button>
            </div>
        </div>


        <div class="w-full">
            <div id="font-size" class="inline-flex space-x-2 pt-2">
                @for ($i = 3; $i <= 8; $i++) <button class="p-2" wire:model="FontSize" wire:click="font_size({{ $i }})"
                    title="Anterior">
                    <x-gmdi-font-download-o class="w-{{$i}}" />
                    </button>
                    @endfor
            </div>
        </div>


    </div>

</div>
