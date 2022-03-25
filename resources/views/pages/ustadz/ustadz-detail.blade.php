<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Detail Ustadz') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Ustadz</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Detail Ustadz</a></div>
        </div>
    </x-slot>

   <div>
    <livewire:detail-ustadz :ustadzId="request()->ustadzId">
    </div>

</x-app-layout>