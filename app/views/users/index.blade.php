@extends('layouts.master')

@section('asset')
    @include('layouts.partials.datatable')
@stop

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')

    {{ Datatable::table()
    ->addColumn('email', 'last_login', 'full_name', '')
    ->setOptions('aoColumnDefs',array(
        array(
            'sTitle' => 'Nama',
            'aTargets' => [0]),
        array(
            'sTitle' => 'Email',
            'aTargets' => [1]),
        array(
            'sTitle' => 'Login Terakhir',
            'aTargets' => [2]),
        array(
            'bSortable' => false,
            'aTargets' => [3])
        ))
    ->setOptions('bProcessing', true)
    ->setUrl(route('admin.users.index'))
    ->render('datatable.uikit') }}

@stop