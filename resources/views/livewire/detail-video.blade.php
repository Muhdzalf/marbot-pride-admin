{{-- Informasi Singkat User (Nama dan Deskripsi/About) --}}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
   <iframe class=" mx-auto" width="871" height="490" src=" https://www.youtube.com/embed/{{$video->video_url}}" frameborder="0"></iframe>
</div>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200 mt-8">
    <div class="flex">
        <img class="w-40 h-48 flex-none" src="{{ $video->poster_url ? url('storage/poster/'.$video->poster_url) : url('storage/poster/no_pic.png') }}">
        <div class="flex-grow ml-6 my-auto">
            <h2 class="text-black text-3xl" wire:model.defer="video.title">{{ $video->title }}</h2>
            <h6>{{$video->ustadz->name}}</h6>
            <p class="text-gray text-base text-justify">{{ $video->description }}</p>
        </div>
    </div>
</div>

<div class="p-6 mt-8 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex">
        <div class="flex-grow ml-6 my-auto">
            <div>    
                <h3>Manfaat : </h3>
                <p class="text-gray text-base text-justify">{{ $video->benefit }}</p>
            </div>
            <div class="mt-3">    
                <h3>tag : </h3>
                <p class="text-gray text-base text-justify">{{ $video->tag }}</p>
            </div>
            <div class="mt-3">    
                <h3>Tema Kajian : </h3>
                <p class="text-gray text-base text-justify">{{ $video->tema->title }}</p>
            </div>
        </div>
        <div class="flex-none w-3/12">
            <h4>Diupload Oleh :</h4>
            <p class="text-gray text-base text-justify">{{ $video->admin->name }}</p>
        </div>
    </div>
</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h3>Daftar Donatur {{ $video->title }} | {{count($video->donations)}} Donatur</h3>
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
                @foreach ( $video->donations as $donation )
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

