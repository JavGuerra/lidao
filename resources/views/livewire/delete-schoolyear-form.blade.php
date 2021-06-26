<x-jet-action-section>
    <x-slot name="title">
        {{ __('Delete school year') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete the school year.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmSchoolyearDeletion" wire:loading.attr="disabled">
                {{ __('Delete school year') }}
            </x-jet-danger-button>
        </div>

        <!-- Ventana modal para confirmación de borrado -->
        <x-jet-dialog-modal wire:model="confirmingSchoolyearDeletion">
            <x-slot name="title">
                {{ __('Delete school year') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete the school year? Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.') }}
           
                <div class="mt-4" x-data="{}" x-on:confirming-delete-schoolyear.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteSchoolyear" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingSchoolyearDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteSchoolyear" wire:loading.attr="disabled">
                    {{ __('Delete school year') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
