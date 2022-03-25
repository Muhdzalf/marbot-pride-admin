<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Category Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Category</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Buat Category Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-category action="createCategory"/>
    </div>
</x-app-layout>
