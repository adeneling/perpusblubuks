@extends( 'layouts.master' )

@section( 'asset' )
	@include( 'layouts.partials.datatable' )
@stop

@section( 'title' )
	{{ $title }}
@stop

@section( 'content' )
	@include( 'books._borrowdatatable' )
@stop