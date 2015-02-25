@extends('layouts.guest')

@section('content')
<div class="uk-text-center">
    <div class="uk-vertical-align-middle" style="width: 500px;">
        @include('layouts.partials.validation')
        {{ Form::open(array('url' => route('guest.register'), 'class' => 'uk-form uk-form-horizontal')) }}
            <div class="uk-form-row">
                {{ Form::label('first_name', 'Nama Depan', array('class' => 'uk-form-label uk-text-left')) }}
                {{ Form::textUk('first_name', 'Nama depan Anda') }}
            </div>

            <div class="uk-form-row">
                {{ Form::label('last_name', 'Nama Belakang', array('class' => 'uk-form-label uk-text-left')) }}
                {{ Form::textUk('last_name', 'Nama belakang Anda') }}
            </div>

            <div class="uk-form-row">
                {{ Form::label('email', 'Email', array('class' => 'uk-form-label uk-text-left')) }}
                {{ Form::textUk('email', 'emailmu@website.com') }}
            </div>

            <div class="uk-form-row">
                {{ Form::label('password', 'Password', array('class' => 'uk-form-label uk-text-left')) }}
                <div class="uk-form-controls">
                    {{ Form::password('password', array('placeholder'=>'*********')) }}
                </div>
            </div>

            <div class="uk-form-row">
                {{ Form::label('password_confirmation', 'Konfirmasi Password', array('class' => 'uk-form-label uk-text-left')) }}
                <div class="uk-form-controls">
                    {{ Form::password('password_confirmation', array('placeholder'=>'*********')) }}
                </div>
            </div>

            <div class="uk-form-row">
                {{ Form::captcha() }}
            </div>

            <div class="uk-form-row">
                {{ Form::submit('Daftar', array('class'=>'uk-width-1-1 uk-button uk-button-primary uk-button-large')) }}
            </div>
        {{ Form::close() }}

    </div>
</div>
@stop