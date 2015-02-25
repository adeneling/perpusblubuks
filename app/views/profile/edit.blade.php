@extends('layouts.master')

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('member.profile') }}">Profil</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')
    {{ Form::open(array('url' => route('member.profile.update'), 'method' => 'post', 'class'=>'uk-form uk-form-horizontal')) }}
        <div class="uk-form-row">
            {{ Form::label('first_name', 'Nama Depan', array('class' => 'uk-form-label uk-text-left')) }}
            <div class="uk-form-controls">
                {{ Form::text('first_name', $user->first_name, array('placeholder'=>'Nama depan Anda')) }}
            </div>
        </div>

        <div class="uk-form-row">
            {{ Form::label('last_name', 'Nama Belakang', array('class' => 'uk-form-label uk-text-left')) }}
            <div class="uk-form-controls">
                {{ Form::text('last_name', $user->last_name, array('placeholder'=>'Nama belakang Anda')) }}
            </div>
        </div>

        <div class="uk-form-row">
            {{ Form::label('email', 'Email', array('class' => 'uk-form-label uk-text-left')) }}
            <div class="uk-form-controls">
                {{ Form::text('email', $user->email, array('placeholder'=>'emailmu@website.com')) }}
            </div>
        </div>
        {{ HTML::divider() }}
        <div class="uk-form-row">
            {{ Form::submitUk('Simpan') }}
        </div>
    {{ Form::close() }}
@stop