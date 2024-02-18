<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        {{-- {{ $this->productInfolist }} --}}
        <div class="overflow-y-auto p-4" style="height: 250px">
        @foreach ($record->Lyric->slide as $key => $line)
            <ul
                class="flex justify-between gap-x-6 my-2 p-4 fi-in-repeatable-item block rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10">
                <li>
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{$line['text']}}</p>
                    </div>
                </div>
                <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                    <x-filament::modal icon="heroicon-o-information-circle" alignment="center">
                        <x-slot name="trigger">
                            <x-filament::button>
                                Open modal {{$key}}
                            </x-filament::button>
                        </x-slot>
                        <div icon="heroicon-o-exclamation-triangle" icon-color="danger">
                            <x-slot name="heading">
                                Apresentar
                            </x-slot>

                            <x-slot name="description">
                                Você tem certeza que gostaria de fazer isso?
                            </x-slot>
                            <div
                                class="fi-modal-footer-actions gap-3 flex flex-col-reverse sm:grid sm:grid-cols-[repeat(auto-fit,minmax(0,1fr))]">

                                <x-filament::button color="gray" size="xl" x-on:click="close()">
                                    Cancelar
                                </x-filament::button>

                                <x-filament::button x-on:click="close()" wire:click="ShowSlide( '{{  $key }}' )" size="xl">
                                    Confirmar
                                </x-filament::button>
                            </div>
                            {{-- Modal content --}}
                        </div>
                        {{-- Modal content --}}
                    </x-filament::modal>
                </div>
            </li>
            </ul>
        @endforeach
    </div>
    </div>
</div>
