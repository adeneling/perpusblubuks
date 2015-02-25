@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
	@include('layouts.partials.select2')
@stop

@section('breadcrumb')
	<li > <a href="/" > Dashboard</a> </li>
	<li > <a href="{{ route('admin.books.index') }}" > Buku</a> </li>
	<li class="uk-active" > {{ $title }} </li>
@stop

@section('content')
	{{ Form:: model ( $book, array( 'url' => route( 'admin.books.update' , [ 'books' => $book-> id]), 'files' => 'true' , 'method' => 'put' , 'class' => 'uk-form uk-form-horizontal' )) }}
	@include( 'books._form' )
	{{ Form:: close() }}
@stop