<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Data Tema') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tema</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tema') }}">Edit Data Tema</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tema action="updateTema" :temaId="request()->temaId" />
    </div>
</x-app-layout>
