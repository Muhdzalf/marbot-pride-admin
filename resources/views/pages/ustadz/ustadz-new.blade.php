<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Tambah Data Ustadz Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tema</a></div>
            <div class="breadcrumb-item"><a href="{{ route('ustadz') }}">Tambah Data Ustadz</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-ustadz action="createUstadz" />
    </div>
</x-app-layout>
