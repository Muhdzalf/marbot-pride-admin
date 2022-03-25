<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Donasi') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Donasi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('donation') }}">Data Donasi</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="donation" :model="$donation" />
    </div>
</x-app-layout>