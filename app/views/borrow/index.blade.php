@extends('layouts.master')

@section('asset')
    @include('layouts.partials.datatable')
@stop

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="/">Dashboard</a></li>
    <li class="uk-active">{{ $title }}</li>
@stop

@section('content')

    <?php
    $datatable = Datatable::table()
        ->addColumn('id', 'book', 'user', 'borrowed_at', 'returned_at')
        ->setOptions('aoColumnDefs',array(
             array(
                'bVisible' => false,
                'aTargets' => [0]),
            array(
                'sTitle' => 'Buku',
                'aTargets' => [1]),
            array(
                'sTitle' => 'Peminjam',
                'aTargets' => [2]),
            array(
                'sTitle' => 'Tanggal Pinjam',
                'aTargets' => [3]),
            array(
                'sTitle' => 'Tanggal Kembali',
                'aTargets' => [4]),
            ))
        ->setOptions('bProcessing', true)
        ->setUrl(route('admin.borrow'));
        ?>

        {{ $datatable->render() }}

    <script>
        $(function() {
            $('\
              <div id="filter_status" class="dataTables_length uk-margin-left" style="display: inline-block;">\
                <label>Status \
                    <select size="1" name="filter_status" aria-controls="filter_status">\
                        <option value="all" selected="selected">Semua</option>\
                        <option value="returned">Sudah Dikembalikan</option>\
                        <option value="not-returned">Belum Dikembalikan</option>\
                    </select>\
                </label>\
              </div>\
            ').insertAfter('.dataTables_length');

            $('select[name="filter_status"]').change(function() {
                var $oTable = $('#{{ $datatable->getId() }}').dataTable();
                switch (this.value) {
                    case 'all' :
                        $oTable.fnFilter('');
                        break;
                    case 'returned' :
                        $oTable.fnFilter('data-returned="true"');
                        break;
                    case 'not-returned' :
                        $oTable.fnFilter('data-returned="false"');
                        break;
                }
            });
        });
    </script>
@stop
