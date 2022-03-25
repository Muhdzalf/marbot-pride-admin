<div>
    <x-data-table :data="$data" :model="$ustadzs">
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
                    Tentang Ustadz
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
            @foreach ($ustadzs as $ustadz)
                    <tr x-data="window.__controller.dataTableController({{ $ustadz->id }})">
                        <td>{{ $ustadz->id }}</td>
                        <td><img class="rounded-full h-10 w-10 inline-block mr-3" src="{{ url('storage/ustadz-photo/'.$ustadz->poster_url) }}" alt="{{ $ustadz->name }}"> {{ $ustadz->name }}</td>
                        <td>{{ $ustadz->description }}</td>
                        <td>{{ count ($ustadz->videos) }} Video</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/ustadz/edit/{{ $ustadz->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            <a role="button" href="/ustadz/detail/{{ $ustadz->id }}" class="ml-3"><i class="fa fa-16px fa-info"></i></a>

                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
