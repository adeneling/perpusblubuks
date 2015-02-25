@section( 'title' )
{{ $title }}
@stop

@include('dashboard.navigations.regular')


@section( 'content' )
    @section( 'content' )
        Selamat datang di Larapus.
        <table class=" uk-table" >
            <tbody>
            <tr>
                <td class=" uk-text-muted" > Login Terakhir</td>
                <td> {{ $lastlogin }} </td>
            </tr>
            <tr>
                <td class=" uk-text-muted" > Buku dipinjam</td>
                <td>
                    @if ( $books-> count() == 0)
                        Tidak ada buku dipinjam
                    @endif
                    <ul >
                        @foreach ( $books as $book)
                        <li > {{ $book-> title }} <a href=" {{ route('books.return', ['books'=> $book->id]) }} " class=" uk-button uk-button-small " > Kembalikan</a></li >
                        @endforeach
                    </ul >
                </td>
            </tr>
        </tbody>
        </table>
    @stop
@stop