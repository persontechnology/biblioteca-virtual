@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h6 class="mb-0">Perfil</h6>
            <div class="ms-auto">
                <a href="{{ route('dashboard') }}" title="Cancelar" class="text-body">
                    <i class="ph ph-x text-danger fw-bold"></i>
                </a>
            </div>
        </div>
        
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div> --}}
    </div>
</div>
@endsection
