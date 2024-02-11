<div>

    @if($config->type == 'image')


    <div class="fixed inset-0 h-screen bg-cover bg-center"
        style="background-image: url('{{asset('storage/'.$config->GetImageBackground->path)}}');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
            style="background-color: {{$config->bg_color}}">
            <div class="flex h-full items-center justify-center">
                <div class="container">
                    <div class="text-white p-4">
                        <div wire:poll>
                            <h1 style="font-family: {{$config->GetFont->name}}; font-size: 15px; text-align: right;"> {{ $slide['text'] }} </h1>
                            <h4 style="font-family: {{$config->GetFont->name}}; font-size: 10px; text-align: right;"> {{ $slide['end'] }} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif($config->type == 'video')
    <div class="fixed inset-0 h-screen bg-cover bg-center">

        <video autoplay loop muted class="absolute inset-0 w-full h-full object-cover">
            <source
                src="{{asset('storage/'.$config->GetVideoBackground->path)}}"
                type="video/mp4">
            <!-- Adicione mais sources para suporte a diferentes formatos de vídeo -->
            Your browser does not support the video tag.
        </video>

        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
            style="background-color: {{$config->bg_color}}">
            <div class="flex h-full items-center justify-center">
                <div class="container">
                    <div class="text-white p-4">
                        <div wire:poll>
                            <h1 style="font-size: 15px; text-align: right;"> {{ $slide['text'] }} </h1>
                            <div style="font-size: 10px; text-align: right;"> {{ $slide['end'] }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
