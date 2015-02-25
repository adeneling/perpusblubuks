@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li > <a href="/" > Dashboard</a> </li>
	<li > <a href="{{ route('admin.authors.index') }}" > Penulis</a> </li>
	<li class="uk-active" > {{ $title }} </li>
@stop

@section('content')
	{{ Form::open(array('url' => route('admin.authors.store'), 'method' => 'post', 'class\
	'=>'uk-form uk-form-horizontal')) }}
@include('authors._form')
	{{ Form::close() }}
@stop