@section( 'title' )
    {{ $title }}
@stop

@include('dashboard.navigations.admin')


@section( 'breadcrumb' )
    <li > {{ $title }} </li >
@stop

@section( 'content' )
    Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.
@stop