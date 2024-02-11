<div>

    <div wire:poll="atualiza" class="p-4">
    <iframe src="/admin/small-show-slides" width="300" height="200"></iframe>

    <div class="grid grid-flow-col auto-cols-max">
        <x-filament::icon-button icon="heroicon-o-chevron-left" wire:click="openNewUserModal" label="New label"
            tooltip="Anterior" />
        <x-filament::icon-button icon="heroicon-o-chevron-right" wire:click="openNewUserModal" label="New label"
            tooltip="Próximo" />
    </div>
</div>


</div>
