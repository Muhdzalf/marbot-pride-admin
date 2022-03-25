{{-- Informasi Singkat User (Nama dan Deskripsi/About) --}}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex">
        <img class="h-40 w-40 rounded-full flex-none" src="{{ $user->profile_photo_path ? url('storage/photos/'.$user->profile_photo_path) : url('storage/poster/no.png') }}">
        <div class="flex-grow ml-6 my-auto">
            <h2 class="text-black text-3xl" wire:model.defer="user.name">{{ $user->name }}</h2>
            <p class="text-gray text-base text-justify">{{ $user->about}}</p>
        </div>
    </div>
</div>

<div class="p-4 sm:px-20 bg-white border-b border-gray-200 mt-6">
    <h2>Biodata {{$user->name}}</h2>
    <div class="grid grid-cols-2 gap-6 mt-2">
        <div><div class="mt-2 ml-3">
            <h3>Nama Lengkap:</h3>
            <p>{{$user->name}}</p>
        </div>
        <div class="mt-2 ml-3">
            <h3>Email:</h3>
            <p>{{$user->email}}</p>
        </div>
        <div class="mt-2 ml-3">
            <h3>Tanggal Lahir:</h3>
            <p>{{$user->birth_date}}</p>
        </div>
        <div class="mt-2 ml-3">
            <h3>Nomor Telepon: </h3>
            <p>{{$user->phone_number}}</p>
        </div></div>

        <div>
            <div class="mt-2 ml-3">
                <h3>role: </h3>
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white {{$user->role == 'admin' ? 'bg-green-400' : 'bg-yellow-300'}} rounded-md">{{ $user->role }}</span>
            </div>
            <div class="mt-2 ml-3">
                <h3>Bergabung Sejak: </h3>
                <p>{{$user->created_at->format('d M Y')}}</p>
            </div>
        </div>

    </div>
</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h2>Daftar Donasi Program {{ $user->name }} </h2>
    <table class="table table-bordered table-striped text-sm text-gray-600 mt-4">
        <thead>
            <tr>
                <th class="text-center"><a  role="button" href="#">
                    Program
                    </a></th>
                <th><a role="button" href="#">
                    Total Donasi
                    </a></th>
                <th><a role="button" href="#">
                    Metode Donasi
                    </a></th>
                <th><a role="button" href="#">
                    Status
                    </a></th>
            </tr>
        </thead>
        <tbody>
                @foreach ( $user->Donations as $donasi )
                @if (!empty($donasi->programs['name']))
                <tr>
                    <td>{{$donasi->programs['name']}}</td>
                    <td> {{$donasi->donation}} </td>
                    <td>{{$donasi->method['name']}}</td>
                    <td><span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white {{$donasi->status == 'success' ? 'bg-green-400' : 'bg-yellow-300'}} rounded-md">{{ $donasi->status }}</span></td>
                </tr>
                @endif
                @endforeach
            </tbody>
    </table>
</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h2>Daftar Donasi Video Kajian {{ $user->name }} </h2>
    <table class="table table-bordered table-striped text-sm text-gray-600 mt-4">
        <thead>
            <tr>
                <th class="text-center"><a  role="button" href="#">
                    Video
                    </a></th>
                <th><a role="button" href="#">
                    Total Donasi
                    </a></th>
                <th><a role="button" href="#">
                    Metode Donasi
                    </a></th>
                <th><a role="button" href="#">
                    Status
                    </a></th>
            </tr>
        </thead>
        <tbody>
                @foreach ( $user->Donations as $donasi )
                @if (!empty($donasi->video['title']))
                <tr>
                    <td>{{$donasi->video['title']}}</td>
                    <td> {{$donasi->donation}} </td>
                    <td>{{$donasi->method['name']}}</td>
                    <td><span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white {{$donasi->status == 'success' ? 'bg-green-400' : 'bg-yellow-300'}} rounded-md">{{ $donasi->status }}</span></td>
                </tr>
                @endif
                @endforeach
            </tbody>
    </table>
</div>