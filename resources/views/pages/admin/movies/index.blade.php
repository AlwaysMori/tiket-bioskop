@extends('layouts.admin.dashboard')

@section('content')
    <x-admin.movies.movies-list :movies="$movies" />
@endsection
