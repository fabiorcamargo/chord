<div>

    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        {{-- {{ $this->productInfolist }} --}}
        <div class="overflow-y-auto p-4" wire:poll='atualiza'>


            @isset($record->Lyric->slide)
            @foreach ($record->Lyric->slide as $key => $line)
            <a href="" wire:click="ShowSlide({{$key}})">
                <x-filament::badge color="{{ $key_a == $key ? 'warning' : 'gray' }}">
                    <div class="py-2">{!!$line['text']!!}</div>
                </x-filament::badge>

            </a>
            @endforeach
            @endisset
        </div>
    </div>
</div>
