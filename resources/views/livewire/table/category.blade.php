<div>
    <x-data-table :data="$data" :model="$categories">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    Deskripsi
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Video
                    @include('components.sort-icon', ['field' => 'videos'])
                </a></th>
                
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($categories as $category)
                    <tr x-data="window.__controller.dataTableController({{ $category->id }})">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ count ($category->videos) }} Video</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/category/edit/{{ $category->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
