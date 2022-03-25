<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Program') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data program baru') }}
        </x-slot>

        <x-slot name="form">
            {{-- Poster --}}
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="poster"
                            x-ref="poster"
                            x-on:change="
                                    photoName = $refs.poster.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.poster.files[0]);
                            " />
    
                <x-jet-label for="poster" value="{{ __('Photo') }}" />
    
                <!-- Current Profile Photo -->
                @if ($action=="updateProgram")
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{url('storage/poster-program/'.$program->poster_url)}}" alt="{{ $this->program->name }}" class="block w-72 h-52 bg-cover bg-no-repeat bg-center">
                </div>
                @endif
    
                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block w-72 h-52 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                @error('poster') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="poster" class="">Uploading...</div>
    
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.poster.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>
    
                @if (!empty($this->program->poster_url))
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deletePoster">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif
    
                <x-jet-input-error for="poster" class="mt-2" />
            </div>

            {{-- Nama Lengkap --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>Nama</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="program.name" />
                <x-jet-input-error for="program.name" class="mt-2" />
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Deskripsi') }}" />
                <small>Deskripsi Singkat Program</small>
                <textarea id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="program.description" class="form-input rounded-md shadow-sm"></textarea>
                <x-jet-input-error for="program.description" class="mt-2" />
            </div>

            {{-- Target Donasi --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="target_donation" value="{{ __('Target Donasi') }}" />
                <small>Target Donasi</small>
                <x-jet-input id="target_donation" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="program.target_donation" />
                <x-jet-input-error for="program.target_donation" class="mt-2" />
            </div>

            {{-- Status --}}
            @if($action == "updateProgram")
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="status" value="{{ __('Deskripsi') }}" />
                <small>Target Donasi</small>
                <select id="status" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="program.status">
                    <option value="ongoing">ongoing</option>
                    <option value="done">done</option>
                </select>
                <x-jet-input-error for="program.status" class="mt-2" />
            </div>
            @endif

            

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
