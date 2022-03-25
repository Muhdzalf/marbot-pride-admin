<div>
    <x-data-table :data="$data" :model="$videos">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Judul
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    Deskripsi
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                {{-- <th><a wire:click.prevent="sortBy('benefit')" role="button" href="#">
                    Manfaat
                    @include('components.sort-icon', ['field' => 'benefit'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tag')" role="button" href="#">
                    Tag
                    @include('components.sort-icon', ['field' => 'tag'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('ustadz_id')" role="button" href="#">
                    Ustadz
                    @include('components.sort-icon', ['field' => 'ustadz_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tema_id')" role="button" href="#">
                    Tema Kajian
                    @include('components.sort-icon', ['field' => 'tema_id'])
                </a></th>
                {{-- <th><a wire:click.prevent="sortBy('admin_id')" role="button" href="#">
                    Diupload Oleh
                    @include('components.sort-icon', ['field' => 'admin_id'])
                </a></th> --}}
                {{-- <th><a wire:click.prevent="sortBy('Video')" role="button" href="#">
                    Video_url
                    @include('components.sort-icon', ['field' => 'Video'])
                </a></th> --}}
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($videos as $video)
                    <tr x-data="window.__controller.dataTableController({{ $video->id }})">
                        <td>{{ $video->id }}</td>
                        <td class=" w-1/4">{{ $video->title }}</td>
                        <td>{{ $video->description }}</td>
                        {{-- <td>{{ $video->benefit }}</td>
                        <td>{{ $video->tag }}</td> --}}
                        <td>{{ $video->ustadz->name }}</td>
                        <td>{{ $video->tema->title}}</td>
                        {{-- <td>{{ $video->admin->name }}</td> --}}
                        {{-- <td>{{ $video->video_url}}</td> --}}
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/video/edit/{{ $video->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            <a role="button" href="/video/detail/{{ $video->id }}" class="ml-3"><i class="fa fa-16px fa-info"></i></a>

                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
