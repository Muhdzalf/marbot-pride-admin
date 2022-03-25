<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Metode') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Metode Donasi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('method') }}">Edit Metode Donasi</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-method action="createMethod"/>
    </div>
</x-app-layout>