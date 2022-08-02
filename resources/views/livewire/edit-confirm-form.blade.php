<x-action-section>
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
           
                @if($action == 'delete')
                <div class="mt-4" x-data="{}" x-on:confirming-delete.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="delete" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
                @endif
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
</x-action-section>
