<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Program Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Program</a></div>
            <div class="breadcrumb-item"><a href="{{ route('program') }}">Buat Program Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-program action="createProgram" />
    </div>
</x-app-layout>
