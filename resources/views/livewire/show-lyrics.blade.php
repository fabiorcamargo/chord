<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        {{-- {{ $this->productInfolist }} --}}
        <div class="overflow-y-auto p-4">
        @isset($record->Lyric->slide)
        @foreach ($record->Lyric->slide as $key => $line)
        <a href="" wire:click="ShowSlide({{$key}})">
            <ul
                class="flex justify-between gap-x-6 my-2 px-4 py-2 fi-in-repeatable-item block rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10">
                <li>
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{$line['text']}}</p>
                    </div>
                </div>
                </li>
            </ul>
        </a>
        @endforeach
        @endisset
    </div>
    </div>
</div>
