<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data user baru') }}
        </x-slot>

        <x-slot name="form">

            @if ($action == "updateUser")
             <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
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
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <div wire:loading wire:target="photo">Uploading...</div>

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            
            @if ($action == 'updateUser')
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $user->profile_photo_path ? url('storage/photos/'.$user->profile_photo_path) : url('storage/poster/no_pic.png') }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>
            @endif

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __($action == "createUser" ? 'Select A New Photo' : 'Change Photo') }}
            </x-jet-secondary-button>

            @if (!empty($this->user->profile_photo_path))
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
    @endif
                
            @endif
    
            {{-- Nama Lengkap --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>Nama Lengkap</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" />
                <x-jet-input-error for="user.name" class="mt-2" />
            </div>

            {{-- Email --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <small>contohmail@mail.com</small>
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" />
                <x-jet-input-error for="user.email" class="mt-2" />
            </div>

            @if ($action == "createUser")
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <small>Minimal 8 karakter</small>
                <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" />
                <x-jet-input-error for="user.password" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                <small>Minimal 8 karakter</small>
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" />
                <x-jet-input-error for="user.password_confirmation" class="mt-2" />
            </div>
            @endif

            {{-- Nomor Telepon --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="phone_number" value="{{ __('Nomor Telepon') }}" />
                <small>format penulisan dimulai dari angka 0</small>
                <x-jet-input id="phone_number" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.phone_number" />
                <x-jet-input-error for="user.phone_number" class="mt-2" />
            </div>

            {{-- Asal Kota --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="city" value="{{ __('Asal Kota') }}" />
                <small>Asal Kota Anda</small>
                <x-jet-input id="city" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.city" />
                <x-jet-input-error for="user.city" class="mt-2" />
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="birth_date" value="{{ __('Tanggal Lahir') }}" />
                <small>YYYY-MM-DD</small>
                <x-jet-input id="birth_date" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.birth_date" />
                <x-jet-input-error for="user.birth_date" class="mt-2" />
            </div>

            {{-- Role --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <small>pilih role user</small>
                <select name="" id="role" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.role">
                    <option value="admin" selected>admin</option>
                    <option value="user">user</option>
                </select>\
                <x-jet-input-error for="user.role" class="mt-2" />
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
