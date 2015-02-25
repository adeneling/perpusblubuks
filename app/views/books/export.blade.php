@extends('layouts.master')

@section('title')
    {{ $title }}
@stop

@section('asset')
    @include('layouts.partials.select2')
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('admin.books.index') }}">Buku</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')
    {{ Form::open(array('url' => route('admin.books.exportpost'), 'method' => 'post', 'class'=>'uk-form uk-form-horizontal')) }}
        <div class="uk-form-row">
            {{ Form::labelUk('author_id', 'Pilih Penulis') }}
            {{ Form::select('author_id[]', []+Author::lists('name','id'), null, array(
                    'multiple',
                    'id'=>'author_id',
                    'placeholder' => "Pilih Penulis",
                    'style'=>'width:20%')) }}
        </div>

        <div class="uk-form-row">
            {{ Form::labelUk('type', 'Pilih Output') }}
            {{ Form::radio('type', 'xls', true) }} Excel
            {{ Form::radio('type', 'pdf') }} PDF
        </div>

        {{ HTML::divider() }}
        <div class="uk-form-row">
            {{ Form::submitUk('Download') }}
        </div>
    {{ Form::close() }}

    <script>
        $(document).ready(function() {
            $("#author_id").select2({placeholder: 'Pilih Penulis', allowClear: true});
        });
    </script>
@stop