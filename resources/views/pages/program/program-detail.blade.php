<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Detail Program') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Detail Program</a></div>
        </div>
    </x-slot>

   <div>
        <livewire:detail-program :programId="request()->programId">
    </div>

</x-app-layout>