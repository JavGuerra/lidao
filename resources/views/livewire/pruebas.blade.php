<div>

    <div class="mt-5">
        <x-jet-button wire:click="confirmar" wire:loading.attr="disabled">
            {{ $boton }}
        </x-jet-button>
    </div>

    <!-- Ventana modal -->
    <x-jet-dialog-modal wire:model="confirmando">
        <x-slot name="title">
            {{ $titulo }}
        </x-slot>

        <x-slot name="content">
            {{ $texto }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmando')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="{{$hace}}" wire:loading.attr="disabled">
                Aceptar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>