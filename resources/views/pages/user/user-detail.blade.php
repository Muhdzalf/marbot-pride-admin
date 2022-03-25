<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Detail User') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Detail User</a></div>
        </div>
    </x-slot>

   <div>
        <livewire:detail-user :userId="request()->userId">
    </div>

</x-app-layout>