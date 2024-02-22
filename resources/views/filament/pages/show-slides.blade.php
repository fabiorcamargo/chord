<x-filament-panels::page>

<x-filament::modal id="myModal" width="full" slide-over >

    @livewire('SlideShow')
    {{-- Modal content --}}
</x-filament::modal>

{{-- Do your work, then step back. --}}

    @push('scripts')
        <script>
            document.addEventListener('livewire:initialized', () => {

                //dispatch the modal...
                @this.dispatch('open-modal', {
                    id: 'myModal'
                });
            });
        </script>
    @endpush
</x-filament-panels::page>
