{{-- Informasi Singkat Tema (Nama dan Deskripsi/About) --}}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex">
        <img class="w-40 h-48  flex-none" src="{{$tema->poster_url ? url('storage/poster-tema/'.$tema->poster_url) : url('storage/poster/no_pic.png')}}">
        <div class="flex-grow ml-6 my-auto">
            <h2 class="text-black text-3xl" wire:model.defer="tema.name">{{ $tema->title }}</h2>
            <p class="text-gray text-base text-justify">{{ $tema->description }}</p>
        </div>
        <div class="flex-none my-auto">
            <h4>Tag: </h4>
            <p class="text-gray text-base text-justify">{{ $tema->tag }}</p>
            <h4>Diupload Oleh: </h4>
            <p class="text-gray text-base text-justify">{{ $tema->admin->name }}</p>
            <h4>Diupload: </h4>
            <p class="text-gray text-base text-justify">{{ $tema->created_at->format('d M Y') }}</p>
        </div>
    </div>
</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h3>Daftar Video Tema {{ $tema->tile }} | {{count($tema->videos)}} Video </h3>
    <table class="table table-bordered table-striped text-sm text-gray-600 mt-4">
        <thead>
            <tr>
                <th><a role="button" href="#">
                    Judul
                    </a></th>
                <th><a role="button" href="#">
                    Deskripsi
                    </a></th>
                <th><a role="button" href="#">
                    Video
                    </a></th>
            </tr>
        </thead>
        <tbody>
                @foreach ( $tema->videos as $video )
                <tr>
                    <td><img class="h-28 w-24 inline-block py-4 px-4" src="{{url('storage/poster/'.$video->poster_url)}}" alt="{{$video['title']}}">
                    {{$video['title']}} </td>
                    <td>{{$video['description']}}</td>
                    <td>{{$video['video_url']}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>