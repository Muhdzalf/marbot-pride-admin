<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Video Kajian') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Video</a></div>
            <div class="breadcrumb-item"><a href="{{ route('video') }}">Data Video Kajian</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="video" :model="$video" />
    </div>
</x-app-layout>
