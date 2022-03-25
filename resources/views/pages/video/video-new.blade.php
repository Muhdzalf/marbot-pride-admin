<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Video Kajian') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Video</a></div>
            <div class="breadcrumb-item"><a href="{{ route('video') }}">Buat Video Kajian</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-video action="createVideo" />
    </div>
</x-app-layout>
