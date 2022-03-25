<div id="form-create" >
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Video Kajian') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data video baru') }}
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
    
                <x-jet-label for="poster" value="{{ __('Photo') }}" />
    
                <!-- Current Profile Photo -->
                @if ($action=="updateVideo")
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $video->poster_url ? url('storage/poster/'.$video->poster_url) : url('storage/poster/no_pic.png') }}" alt="{{ $this->video->title }}" class="block w-60 h-72 bg-cover bg-no-repeat bg-center">
                </div>
                @endif
    
                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block w-60 h-72 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                @error('poster') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="poster" class="block">Uploading...</div>
    
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.poster.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>
    
                @if (!empty($this->video->poster_url) )
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deletePoster">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif
    
                <x-jet-input-error for="poster" class="mt-2" />
            </div>
          
            {{-- Judul --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="title" value="{{ __('Judul') }}" />
                <small>Judul Video</small>
                <x-jet-input id="title" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.title" />
                <x-jet-input-error for="video.title" class="mt-2" />
            </div>
            
            {{-- Manfaat --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="benefit" value="{{ __('Manfaat') }}" />
                <small>manfaat video kajian</small>
                <textarea id="benefit" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.benefit"></textarea>
                <x-jet-input-error for="video.benefit" class="mt-2" />
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Deskripsi') }}" />
                <small>Deskripsi Video</small>
                <textarea id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.description"></textarea>
                <x-jet-input-error for="video.description" class="mt-2" />
            </div>


            {{-- Tag --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="tag" value="{{ __('Tag') }}" />
                <small>Tag Video</small>
                <select id="tag" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.tag" >
                    @if ($action == "createVideo")
                    <option selected hidden value="">-- Pilih Tag --</option> 
                @endif
                    @foreach ($this->tags as $tag )
                    <option value="{{$tag}}">{{$tag}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="video.tag" class="mt-2" />
            </div>

            {{-- Video --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="video_url" value="{{ __('Video') }}" />
                <small>Masukkan ID video Youtube(ID unik video dapat ditemukan setelah v= pada url youtube)</small>
                <input id="video_url" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.video_url" />
                <x-jet-input-error for="video.video_url" class="mt-2" />
            </div>

            {{-- Kategori --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="category_id" value="{{ __('Kategori') }}" />
                <small>Kategori Kajian</small>
                <select id="category_id" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.category_id">
                    @if ($action == "createVideo")
                        <option selected hidden value="">-- Pilih Kategori --</option> 
                    @endif
                    @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="video.category_id" class="mt-2" />
            </div>

            {{-- Tema --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="tema_id" value="{{ __('Tema') }}" />
                <small>Tema kajian</small>
                <select id="tema_id" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.tema_id">
                    @if ($action == "createVideo")
                        <option selected hidden value="">-- Pilih Tema --</option> 
                    @endif
                    @foreach ($this->temas as $tema )
                    <option value="{{$tema->id}}">{{$tema->title}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="video.tema_id" class="mt-2" />
            </div>

            {{-- Ustadz --}}
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="ustadz_id" value="{{ __('Penceramah') }}" />
                <small>Ustadz yang berada pada Video</small>
                {{-- Dropdown Link Pemilihan Ustadz --}}
                <select id="ustadz_id" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="video.ustadz_id">
                    @if ($action == "createVideo")
                    <option selected hidden value="">-- Pilih Penceramah --</option> 
                @endif
                    @foreach ($this->ustadzs as $ustadz )
                    <option value="{{$ustadz->id}}" id="ustadz_id">{{$ustadz->name}}</option>
                    @endforeach
                </select>
                
                <x-jet-input-error for="video.ustadz_id" class="mt-2" />
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
