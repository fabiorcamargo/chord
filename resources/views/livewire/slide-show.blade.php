<div>

    @if($config->type == 'image')
    <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
        <div class="fixed inset-0 h-screen bg-cover bg-center" style="background-color:black ">
            <div class="fixed inset-0 h-screen bg-cover bg-center"
                style="background-image: url('{{asset('storage/'.$slide->image_background)}}'); {{$slide->image_show == true ? "" : "
                display: none"}} ">
                <div class=" fixed inset-0 h-screen bg-cover bg-center"
                style="background-color: {{$config->bg_color}} ">
                <div class="absolute inset-0 flex justify-center items-center">
                    <!-- Adicionando classes absolute, inset-0, flex, justify-center, e items-center -->
                    <div class="container">
                        <div class="text-white p-4">
                            <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
                                <x-filament::icon-button id="fullscreen-btn" icon="heroicon-c-arrow-up-right"
                                    label="New label" color="white" />
                            </div>
                            <div style=" {{$slide->text_show == true ? "" : " display: none"}}">
                                {{-- <h1 class="ml9">
                                    <span class="text-wrapper">
                                        <span class="letters">Coffee mornings</span>
                                    </span>
                                </h1> --}}
                                <h1 class="text-center"
                                    style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-weight: 400; font-size: {{$config->font_size}}rem;">
                                    {!! $slide->text !!}</h1> <!-- Adicionando classe text-center -->
                                <h4
                                    style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-size: 3rem; text-align: right;">
                                    {!! $slide->end !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@elseif($config->type == 'video')

<div class="fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
    <div class="fixed inset-0 h-screen bg-cover bg-center" style="background-color: black;">
        <video autoplay loop muted class="absolute inset-0 w-full h-full object-cover" style="object-fit: cover; object-position: center center; width: 100%; height: 100%;">
            <source src="{{asset('storage/'.$slide->video_background)}}" type="video/mp4">
            <!-- Adicione mais sources para suporte a diferentes formatos de vídeo -->
            Your browser does not support the video tag.
        </video>

        <div class="fixed inset-0 h-screen bg-cover bg-center" style="background-color: {{$config->bg_color}} ">
            <div class="absolute inset-0 flex justify-center items-center">
                <!-- Adicionando classes absolute, inset-0, flex, justify-center, e items-center -->
                <div class="container">
                    <div class="text-white p-4">
                        <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
                            <x-filament::icon-button id="fullscreen-btn" icon="heroicon-c-arrow-up-right"
                                label="New label" color="white" />
                        </div>
                        <div style=" {{$slide->text_show == true ? "" : " display: none"}}">
                            {{-- <h1 class="ml9">
                                <span class="text-wrapper">
                                    <span class="letters">Coffee mornings</span>
                                </span>
                            </h1> --}}
                            <h1 class="ml13 text-center"
                                style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-weight: 400; font-size: {{$config->font_size}}rem;">
                                {!! $slide->text !!}</h1> <!-- Adicionando classe text-center -->
                            <h4 style="font-family: {{App\Models\FontBank::find($config->font_type)->name}}; font-size: 3rem; text-align: right;">
                                {!!$slide->end!!}</h4>
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
