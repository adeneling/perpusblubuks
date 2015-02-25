@extends('layouts.master')

@section('asset')
    @include('layouts.partials.datatable')
@stop

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('admin.users.index')}}">Member</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')
    <h3>Buku yang sedang dipinjam :</h3>
    <ul>
        @foreach ($user->books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>

@stop