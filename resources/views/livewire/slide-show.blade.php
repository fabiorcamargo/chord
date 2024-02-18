<div>
    @if($config->type == 'image')
    <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
        <div class="fixed inset-0 h-screen bg-cover bg-center"
            style="background-image: url('{{asset('storage/'.$config->GetImageBackground->path)}}');">
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: {{$config->bg_color}}">
                <div class="flex h-full items-center justify-center">
                    <div class="container">
                        <div class="text-white p-4">
                            <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
                                <x-filament::icon-button id="fullscreen-btn" icon="heroicon-c-arrow-up-right"
                                    label="New label" color="white" />
                            </div>
                            <div>
                                <h1
                                    style="font-family: {{$config->GetFont->name}}; font-weight: 400; font-size: 5rem; text-align: right;">
                                    {{ $slide['text'] }} </h1>
                                <h4
                                    style="font-family: {{$config->GetFont->name}}; font-size: 3rem; text-align: right; ">
                                    {{ $slide['end'] }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif($config->type == 'video')

    <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
        <div class="fixed inset-0 h-screen bg-cover bg-center">
            <video autoplay loop muted class="absolute inset-0 w-full h-full object-cover">
                <source src="{{asset('storage/'.$config->GetVideoBackground->path)}}" type="video/mp4">
                <!-- Adicione mais sources para suporte a diferentes formatos de vídeo -->
                Your browser does not support the video tag.
            </video>
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: {{$config->bg_color}}">
                <div class="flex h-full items-center justify-center">
                    <div class="container">
                        <div class="text-white p-4">
                            <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
                                <x-filament::icon-button id="fullscreen-btn" icon="heroicon-c-arrow-up-right"
                                    label="New label" color="white" />
                            </div>
                            <div>
                                @livewire('AnotherComponent')
                                <h1
                                    style="font-family: {{$config->GetFont->name}}; font-weight: 400; font-size: 5rem; text-align: right;">
                                    {{ $slide['text'] }} </h1>
                                <h4
                                    style="font-family: {{$config->GetFont->name}}; font-size: 3rem; text-align: right; ">
                                    {{ $slide['end'] }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

    <script>
        var fullscreenBtn = document.getElementById('fullscreen-btn');

        // Função para expandir para tela cheia
        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    console.error(`Erro ao tentar entrar em tela cheia: ${err.message}`);
                });
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        fullscreenBtn.addEventListener('click', function() {
            toggleFullScreen();
            fullscreenBtn.classList.add('hide');
        });

        fullscreenBtn.addEventListener('click', function() {
        toggleFullScreen();
        fullscreenBtn.classList.add('hidden'); // Adiciona a classe 'hidden' para ocultar o botão
    });

        // Mostra o botão novamente quando sair da tela cheia
        document.addEventListener('fullscreenchange', function() {
            if (!document.fullscreenElement) {
                fullscreenBtn.classList.remove('hide');
            }
        });
    </script>

    <script>
        Echo.channel('redis')
            .listen('SlideConfigEvent', (data) => {

            });
    </script>


</div>
