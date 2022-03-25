<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Kategori') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori Video</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Data Kategori</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="category" :model="$category" />
    </div>
</x-app-layout>