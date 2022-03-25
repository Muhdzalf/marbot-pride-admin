<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Metode Donasi') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Donasi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Data Metode Donasi</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="method" :model="$method" />
    </div>
</x-app-layout>