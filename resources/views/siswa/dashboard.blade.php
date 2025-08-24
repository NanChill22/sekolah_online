@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
@endsection
