@extends('layouts.guest')

@section('content')
<div class="uk-text-center">
    <div class="uk-vertical-align-middle" style="width: 500px;">
        <h2 class="uk-text-left">Masukkan email Anda</h2>
        @include('layouts.partials.validation')

        {{ Form::open(array('url' => route('guest.sendresetcode'), 'method'=>'post', 'class' => 'uk-form uk-form-horizontal')) }}

            <div class="uk-form-row">
                {{ Form::label('email', 'Email', array('class' => 'uk-form-label uk-text-left')) }}
                {{ Form::textUk('email', 'emailmu@website.com') }}
            </div>

            <div class="uk-form-row">
                {{ Form::captcha() }}
            </div>

            <div class="uk-form-row">
                {{ Form::submit('Reset', array('class'=>'uk-width-1-1 uk-button uk-button-primary uk-button-large')) }}
            </div>
        {{ Form::close() }}

    </div>
</div>
@stop