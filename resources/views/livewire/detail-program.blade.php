{{-- Informasi Singkat Program (Nama dan Deskripsi/About) --}}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex">
        <img class="h-40 w-56 flex-none" src="{{url('storage/poster-program/'.$program->poster_url)}}">
        <div class="flex-grow ml-6 my-auto">
            <h2 class="text-black text-3xl" wire:model.defer="program.title">{{ $program->name }}</h2>
            <p class="text-gray text-base text-justify">{{ $program->description }}</p>
            <div class="mt-3">
                <div class="inline-block">
                    <h4>Target Donasi : </h4>
                    <p class="text-gray text-base text-justify">{{ $program->target_donation }}</p>
                </div>
                <div class="inline-block ml-3">
                    <h4>Donatur : </h4>
                    <p class="text-gray text-base text-justify">{{ count($program->donations) }} Donatur</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h3>Daftar Donatur {{ $program->name }} | {{count($program->donations)}} Donatur </h3>
    <table class="table table-bordered table-striped text-sm text-gray-600 mt-4">
        <thead>
            <tr>
                <th><a role="button" href="#">
                    Nama Donatur
                    </a></th>
                <th><a role="button" href="#">
                    Total Donasi
                    </a></th>
                <th><a role="button" href="#">
                    Metode Pembayaran
                    </a></th>
                <th><a role="button" href="#">
                    Tanggal Donasi
                    </a></th>
            </tr>
        </thead>
        <tbody>
                @foreach ( $program->donations as $donation )
                <tr>
                    <td>{{$donation->user->name}}</td>
                    <td>{{$donation->donation}}</td>
                    <td>{{$donation->method->name}}</td>
                    <td>{{$donation->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
