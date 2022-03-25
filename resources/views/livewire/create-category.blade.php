<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Kategori') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data category baru') }}
        </x-slot>

        <x-slot name="form">
            {{-- Nama Lengkap --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>Nama</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="category.name" />
                <x-jet-input-error for="category.name" class="mt-2" />
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Deskripsi') }}" />
                <small>Deskripsi Singkat Kategori</small>
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="category.description" />
                <x-jet-input-error for="category.description" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
