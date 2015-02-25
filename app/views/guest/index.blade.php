@section( 'asset' )
	@include( 'layouts.partials.datatable' )
@stop

@section( 'content' )
	<h1 class=" uk-heading-large" > {{ $title }} </h1 >
	@include( 'books._borrowdatatable' )
@stop