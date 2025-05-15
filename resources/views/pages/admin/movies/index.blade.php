@extends('layouts.admin.dashboard')

@section('content')
    @if(session('success'))
        <div class="mb-4 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif
    <x-admin.movies.movies-list :movies="$movies" />
@endsection
