@extends( 'layouts.master' )

@section( 'title' )
    {{ $title }}
@stop

@section( 'breadcrumb' )
    <li ><a href=" /" > Dashboard</a></li >
    <li class=" uk-active" > {{ $title }} </li >
@stop

@section( 'content' )
    {{ Form:: open( array( 'url' => route( 'home.updatepassword' ), 'method' => 'post' , 'class' => 'uk-form uk-form-horizontal' )) }}
        <div class=" uk-form-row" >
        {{ Form:: label ( 'oldpassword' , 'Password Lama' , array( 'class' => 'uk-form-label uk-text-left' )) }}
            <div class=" uk-form-controls" >
                {{ Form:: password( 'oldpassword' , array( 'placeholder' => '*********' )) }}
            </div>
        </div>
        <div class=" uk-form-row" >
            {{ Form:: label ( 'newpassword' , 'Password Baru' , array( 'class' => 'uk-form-label uk-text-left' )) }}
            <div class=" uk-form-controls" >
            {{ Form:: password( 'newpassword' , array( 'placeholder' => '*********' )) }}
            </div>
        </div>
        <div class=" uk-form-row" >
        {{ Form:: label ( 'newpassword_confirmation' , 'Konfirmasi Password Baru' , array('class' => 'uk-form-label uk-text-left' )) }}
            <div class=" uk-form-controls" >
            {{ Form:: password( 'newpassword_confirmation' , array( 'placeholder' => '*********' )) }}
            </div>
        </div>

        {{ HTML:: divider() }}
            <div class=" uk-form-row" >
                {{ Form:: submitUk( 'Simpan' ) }}
            </div>
    {{ Form:: close() }} 
@stop