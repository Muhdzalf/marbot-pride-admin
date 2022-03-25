<div>
    <x-data-table :data="$data" :model="$users">
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
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                {{-- <th><a wire:click.prevent="sortBy('phone_number')" role="button" href="#">
                    Nomor Telepon
                    @include('components.sort-icon', ['field' => 'phone_number'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('city')" role="button" href="#">
                    Asal kota
                    @include('components.sort-icon', ['field' => 'city'])
                </a></th>
                <th><a wire:click.prevent="sortBy('role')" role="button" href="#">
                    Role
                    @include('components.sort-icon', ['field' => 'role'])
                </a></th>
                <th><a wire:click.prevent="sortBy('donations')" role="button" href="#">
                    Total Donasi
                    @include('components.sort-icon', ['field' => 'donations'])
                </a></th>
                
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                    <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                        <td>{{ $user->id }}</td>
                        <td>
                            @if (!empty($user->profile_photo_path))
                            <img src="{{url('storage/photos/'.$user->profile_photo_path)}}" alt="{{ $user->name }}" class="h-6 w-6 mr-2 rounded-full inline-block">    
                            @else
                            <i class="mr-2 rounded-full inline-block fas fa-user" width="24px" height="24px"> </i>
                            @endif
                            {{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->phone_number }}</td> --}}
                        <td>{{ $user->city }}</td>
                        <td><span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white {{$user->role == 'admin' ? 'bg-green-400' : 'bg-yellow-300'}} rounded-md">{{ $user->role }}</span></td>
                        <td>{{ count($user->donations)}} Donasi</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="/user/edit/{{ $user->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            <a role="button" href="/user/detail/{{ $user->id }}" class="ml-3"><i class="fa fa-16px fa-info"></i></a>
                        </td>
                    </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
