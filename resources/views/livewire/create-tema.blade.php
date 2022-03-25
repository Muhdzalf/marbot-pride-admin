<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Tema Kajian') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data Tema baru') }}
        </x-slot>

        <x-slot name="form">
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
                @error('poster') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="poster">Uploading...</div>
    
                <x-jet-label for="poster" value="{{ __('Poster') }}" />
    
                <!-- Current Profile Photo -->
                @if ($action=="updateTema")
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ url('storage/poster-tema/'.$this->tema->poster_url)}}" alt="{{ $this->tema->title }}" class="block w-60 h-72 bg-cover bg-no-repeat bg-center">
                </div>
                @endif
    
                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block w-60 h-72 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
    
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.poster.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>
    
                @if (!empty($this->tema->poster_url))
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deletePoster">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif
    
                <x-jet-input-error for="poster" class="mt-2" />
            </div>
            
            {{-- Nama Lengkap --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="title" value="{{ __('Judul') }}" />
                <small>Judul Tema Kajian</small>
                <x-jet-input id="title" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tema.title" />
                <x-jet-input-error for="tema.title" class="mt-2" />
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Deskripsi') }}" />
                <small>Deskripsi Tema Kajian</small>
                <textarea id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tema.description" ></textarea>
                <x-jet-input-error for="tema.description" class="mt-2" />
            </div>

            {{-- Tag --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="tag" value="{{ __('Tag') }}" />
                <small>Tag Tema Kajian</small>
                <select id="tag" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tema.tag" >
                    <option selected hidden disabled value="">-- Silahkan Pilih Tema --</option>
                    @if ($action == "createTema")
                        <option selected hidden value="">-- Pilih Tema --</option> 
                    @endif
                    @foreach ($tags as $tag )
                        <option value="{{$tag}}">{{$tag}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="tema.tag" class="mt-2" />
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
