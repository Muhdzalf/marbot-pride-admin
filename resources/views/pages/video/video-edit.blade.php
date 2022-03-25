<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Data Video') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Video</a></div>
            <div class="breadcrumb-item"><a href="{{ route('video') }}">Edit Data Video</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-video action="updateVideo" :videoId="request()->videoId" />
    </div>
</x-app-layout>
