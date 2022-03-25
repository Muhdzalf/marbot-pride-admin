{{-- Informasi Singkat User (Nama dan Deskripsi/About) --}}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex">
        <img class="h-40 w-40 rounded-full flex-none" src="{{url('storage/ustadz-photo/'.$ustadz->poster_url)}}">
        <div class="flex-grow ml-6 my-auto">
            <h2 class="text-black text-3xl" wire:model.defer="ustadz.name">{{ $ustadz->name }}</h2>
            <p class="text-gray text-base text-justify">{{ $ustadz->description }}</p>
        </div>

    </div>

    {{--  --}}

</div>

<div class="mt-6 p-4 sm:px-20 bg-white border-b border-gray-200">
    <h3>Daftar Video Kajian {{ $ustadz->name }} | {{count($ustadz->videos)}} Video </h3>
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
                @foreach ( $ustadz->videos as $video )
                <tr>
                    <td><img class="h-28 w-24 inline-block py-4 px-4" src="{{url('storage/poster/'.$video['poster_url'])}}" alt="{{$video['title']}}">
                    {{$video['title']}} </td>
                    <td>{{$video['description']}}</td>
                    <td>{{$video['video_url']}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>