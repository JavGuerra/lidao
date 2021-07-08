<x-jet-action-section>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="description">
        {{ $desc }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ $text }}
        </div>

        <div class="mt-5">
            @if($action == 'delete')
            <x-jet-danger-button wire:click="confirm" wire:loading.attr="disabled">
                {{ $title }}       
            </x-jet-danger-button>           
            @else
            <x-jet-button wire:click="confirm" wire:loading.attr="disabled">
                {{ $title }}
            </x-jet-button>
            @endif
        </div>

        <!-- Ventana modal para confirmación -->
        <x-jet-dialog-modal wire:model="confirming">
            <x-slot name="title">
                {{ $title }}
            </x-slot>

            <x-slot name="content">
                {{ $confirmTxt }}
           
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirming')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="{{ $action }}" wire:loading.attr="disabled">
                    {{ $title }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>