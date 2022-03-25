<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Tema Kajian') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tema Kajian</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tema') }}">Data Tema Kajian</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="tema" :model="$tema" />
    </div>
</x-app-layout>