@extends('layouts.master')

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('admin.books.index') }}">Buku</a></li>
    <li><a href="{{ route('admin.books.create') }}">Tambah Buku</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')
    <a href="{{ route('admin.books.index')}}" class="uk-button uk-button-success">
        <i class="uk-icon-check"></i> Selesai
    </a>
    <table class="uk-table uk-table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->amount }}</td>
                    <td>
                    {{ Form::open(array('url' => route('admin.books.destroy', ['books'=>$book->id]), 'id'=>'form-'.$book->id, 'method'=>'delete', 'class'=>'uk-display-inline review-delete')) }}
                        {{ Form::submit('delete', array('class' => 'uk-button uk-button-small uk-button-danger')) }}
                    {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.books.index')}}" class="uk-button uk-button-success">
        <i class="uk-icon-check"></i> Selesai
    </a>
@stop

@section('pagejs')
    <script>
    $(function() {
        $('form.review-delete').on('click', function() {
            // disable behaviour default dari tombol submit
            event.preventDefault();
            // hapus data buku dengan ajax
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                dataType: 'json',
                data: {
                    _method : 'DELETE',
                    _token : $( this ).children( 'input[name=_token]' ).val()
                }
            }).done(function(data) {
                // cari baris yang dihapus
                baris = $('#form-'+data.id).closest('tr');
                // hilangkan baris (fadeout kemudian remove)
                baris.fadeOut(300, function() {$(this).remove()});
            });
        })
    });
    </script>
@stop