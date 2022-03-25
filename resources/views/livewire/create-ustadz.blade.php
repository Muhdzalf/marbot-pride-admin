<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Ustadz') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data ustadz baru') }}
        </x-slot>

        <x-slot name="form">
            {{-- Photo Profile --}}
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />
    
                <x-jet-label for="photo" value="{{ __('Photo') }}" />
    
                <!-- Current Profile Photo -->
                @if ($action == 'updateUstadz')
                    
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ url('storage/ustadz-photo/'.$this->ustadz->poster_url)}}" alt="{{ $this->ustadz->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>
                @endif
    
                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                @error('photo') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="photo" class="block">Uploading...</div>
    
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>
    
               @if (!empty($this->ustadz->poster_url))
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>

            {{-- Nama Lengkap --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>Nama</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="ustadz.name" />
                <x-jet-input-error for="ustadz.name" class="mt-2" />
            </div>

            {{-- Description --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Deskripsi') }}" />
                <small>Deskripsi Singkat Ustadz</small>
                <textarea id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="ustadz.description"></textarea>
                <x-jet-input-error for="ustadz.description" class="mt-2" />
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
