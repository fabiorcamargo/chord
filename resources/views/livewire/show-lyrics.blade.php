<div>

    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        {{-- {{ $this->productInfolist }} --}}
        <div class="overflow-y-auto p-4">
            @isset($record->Lyric->slide)
                @foreach ($record->Lyric->slide as $key => $line)
                    <button class="mt-2" wire:click="ShowSlide({{$key}})">
                        <x-filament::badge
                            color="{{  $key_a->key !== $key ? 'gray' : ($key_a->model == $record->Lyric->id ? 'warning' : 'gray') }}">



                            <div class="py-2">{!!$line['text']!!}</div>
                        </x-filament::badge>
                    </button>
                @endforeach
            @endisset
        </div>
    </div>
</div>
