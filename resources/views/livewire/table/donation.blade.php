<div>
    <x-data-table :data="$data" :model="$donations">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama Donatur
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Video
                    @include('components.sort-icon', ['field' => 'videos'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Program
                    @include('components.sort-icon', ['field' => 'videos'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Jumlah Donasi
                    @include('components.sort-icon', ['field' => 'videos'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Metode Donasi
                    @include('components.sort-icon', ['field' => 'videos'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    Status Donasi
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($donations as $donation)
                    <tr x-data="window.__controller.dataTableController({{ $donation->id }})">
                        <td>{{ $donation->id }}</td>
                        <td>{{ $donation->user['name'] }}</td>

                        @if (!empty($donation->video['title']))
                        <td>{{ $donation->video['title'] }}</td>
                        @else
                        <td> - </td>
                        @endif

                        @if (!empty($donation->programs['name']))
                        <td>{{ $donation->programs['name'] }}</td>
                        @else
                        <td> - </td>
                        @endif

                        <td>{{ $donation->donation }}</td>
                        <td>{{ $donation->method['name'] }}</td>
                        <td><span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white rounded-full {{ $donation->status == 'success' ? 'bg-green-400' : 'bg-red-600'}}">{{ $donation->status }}</span></td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/donation/edit/{{ $donation->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
