<div>

    <div class="p-4">
        <div style="width:300px; height:200px; background-color:black ">
            <div class="bg-cover bg-center"
                style="width:300px; height:200px; background-image: url('{{asset('storage/'.$slide->image_background)}}'); {{$slide->image_show == true ? "" : "
                display: none"}}">
                <div class="h-full w-full overflow-hidden bg-fixed" style="background-color: {{$config->bg_color}}">
                    <div class="mx-auto max-w-md">
                        <div class="flex h-full items-center justify-center">
                            <div class="container">
                                <div class="text-white p-4">
                                    <div style=" {{$slide->text_show == true ? "" : " display: none"}}">
                                        <h1
                                            style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-size: 15px; text-align: right;">
                                            {!! $slide->text !!} </h1>
                                        <h4
                                            style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-size: 10px; text-align: right;">
                                            {!! $slide->end !!} </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="inline-flex space-x-2 pt-2">
            <button class="p-2 border border-gray-600 rounded" wire:click="back" title="Anterior">
                <x-heroicon-o-chevron-left class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="swichimage" title="Próximo">
                <x-gmdi-image-not-supported-o class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="swichtext" title="Próximo">
                <x-gmdi-font-download-off-o class="h-5 w-5" />
            </button>
            <button class="p-2 border border-gray-600 rounded" wire:click="next" title="Próximo">
                <x-heroicon-o-chevron-right class="h-5 w-5" />
            </button>
        </div>

        <div class="w-full">
            <div id="font-size" class="inline-flex space-x-2 pt-2">
                @for ($i = 3; $i <= 8; $i++)
                <button class="p-2 border h-12 border-gray-600 rounded" wire:model="FontSize" wire:click="font_size({{ $i }})" title="Anterior">
                    <x-gmdi-font-download-o class="w-{{$i}}" />
                </button>
                @endfor
            </div>
        </div>
    </div>


</div>
