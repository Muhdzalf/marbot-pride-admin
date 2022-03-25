<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Program') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Program</a></div>
            <div class="breadcrumb-item"><a href="{{ route('program') }}">Edit Program</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-program action="updateProgram" :programId="request()->programId" />
    </div>
</x-app-layout>
