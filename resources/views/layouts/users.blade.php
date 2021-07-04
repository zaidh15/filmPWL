@extends('layouts.index')
@section('content')
@if(Auth::user()->role == 'administrator')
    <div class="jumbotron">
    <h1 class="display-3">Kelola User</h1>
    <p class="lead">Ini Halaman Kelola User</p>
    </div>
@else
@include('layouts.accessDenied')
@endif
@endsection