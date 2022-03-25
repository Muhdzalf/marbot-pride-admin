<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex-wrap ">
    <h2>MARBOT PRIDE SUMMARY</h2>
    <div class="grid grid-cols-3 gap-6 mt-3">
        <div class="bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="">Admin</h3>
                <strong class="text-2xl text-right text-black ">{{$admin}}</strong>
                <a href="{{route('user')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
        <div class="bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="" >User</h3>
                <strong class="text-2xl text-right text-black ">{{$user}}</strong>
                <a href="{{route('user')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
        <div class=" bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="">Penceramah</h3>
                <strong class="text-2xl text-right text-black">{{$ustadz}}</strong>
                <a href="{{route('ustadz')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
        <div class="bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="">Program</h3>
                <strong class="text-2xl text-right text-black">{{$program}}</strong>
                <a href="{{route('program')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
        <div class="bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="">Video</h3>
                <strong class="text-2xl text-right text-black">{{$video}}</strong>
                <a href="{{route('video')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
        <div class=" bg-blue-100 rounded-md p-3">
            <div class="flex flex-col space-y-4 my-auto">
                <h3 class="">Donasi Terkumpul</h3>
                <strong class="text-2xl text-right text-black">RP {{number_format($donation,2,',','.')}}</strong>
                <a href="{{route('donation')}}" class=" text-center text-gray-600 hover:no-underlie ">Informasi lebih lanjut <i class="fas fa-arrow-right text-gray-600"></i></a>
            </div>
        </div>
    </div>
</div>
