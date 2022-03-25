<div>
    <x-data-table :data="$data" :model="$programs">
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
                    Target Donasi
                    @include('components.sort-icon', ['field' => 'donation'])
                </a></th>
                <th><a wire:click.prevent="sortBy('videos')" role="button" href="#">
                    Terkumpul
                    @include('components.sort-icon', ['field' => 'donation'])
                </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status Program
                    @include('components.sort-icon', ['field' => 'status'])
                </a></th>
                
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($programs as $program)
                    <tr x-data="window.__controller.dataTableController({{ $program->id }})">
                        <td>{{ $program->id }}</td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->description }}</td>
                        <td>{{ number_format($program->target_donation, 2,',','.') }}</td>
                        @if($program->donations == null)
                        <td>0</td>
                        @else
                        @foreach ($program->donations as $donation)
                        <td>{{ number_format($donation->donation, 2,',','.')}}</td>
                        @endforeach
                        @endif
                        <td>{{ $program->status }}</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/program/edit/{{ $program->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            <a role="button" href="/program/detail/{{ $program->id }}" class="ml-3"><i class="fa fa-16px fa-info"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
