@extends('layouts.guest')

@section('content')
<div class="uk-text-center">
    <div class="uk-vertical-align-middle" style="width: 500px;">
        @include('layouts.partials.validation')

        <h3>Masukkan password baru Anda :</h3>
        {{ Form::open(array('url' => route('guest.storenewpassword'), 'method'=>'post', 'class' => 'uk-form uk-form-horizontal')) }}

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
                {{ Form::hidden('email', $email) }}
                {{ Form::hidden('resetCode', $resetCode) }}
            </div>


            <div class="uk-form-row">
                {{ Form::submit('Reset', array('class'=>'uk-width-1-1 uk-button uk-button-primary uk-button-large')) }}
            </div>
        {{ Form::close() }}

    </div>
</div>
@stop