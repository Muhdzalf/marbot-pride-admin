<div>
    <x-data-table :data="$data" :model="$temas">
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
                <th><a wire:click.prevent="sortBy('tag')" role="button" href="#">
                    Tag
                    @include('components.sort-icon', ['field' => 'tag'])
                </a></th>
                <th><a wire:click.prevent="sortBy('admin_id')" role="button" href="#">
                    Dibuat Oleh
                    @include('components.sort-icon', ['field' => 'admin_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('Video')" role="button" href="#">
                    Video
                    @include('components.sort-icon', ['field' => 'Video'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($temas as $tema)
                    <tr x-data="window.__controller.dataTableController({{ $tema->id }})">
                        <td>{{ $tema->id }}</td>
                        <td>{{ $tema->title }}</td>
                        <td>{{ $tema->description }}</td>
                        <td>{{ $tema->tag }}</td>
                        <td>{{ $tema->admin['name'] }}</td>
                        <td>{{ count($tema->videos)}} Video</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/tema/edit/{{ $tema->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            <a role="button" href="/tema/detail/{{ $tema->id }}" class="ml-3"><i class="fa fa-16px fa-info"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
