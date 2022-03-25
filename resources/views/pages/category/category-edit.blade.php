<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Category') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Category</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Edit Category</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-category action="updateCategory" :categoryId="request()->categoryId" />
    </div>
</x-app-layout>
