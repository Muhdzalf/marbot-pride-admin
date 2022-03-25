<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Detail Video') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Video</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Detail Video</a></div>
        </div>
    </x-slot>

   <div>
    <livewire:detail-video :videoId="request()->videoId">
    </div>

</x-app-layout>