<div>
    <x-data-table :data="$data" :model="$methods">
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
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($methods as $method)
                    <tr x-data="window.__controller.dataTableController({{ $method->id }})">
                        <td>{{ $method->id }}</td>
                        <td>{{ $method->name }}</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/method/edit/{{ $method->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
