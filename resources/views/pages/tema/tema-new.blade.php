<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Tema Kajian') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tema Kajian</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tema') }}">Buat Tema Kajian Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tema action="createTema" />
    </div>
</x-app-layout>
