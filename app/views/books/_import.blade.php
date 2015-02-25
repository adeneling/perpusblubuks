<div class="uk-form-row">
    {{ Form::labelUk('template', 'Gunakan template terbaru') }}
    <a class="uk-button uk-button-small uk-button-success" href="{{ route('admin.books.template') }}"><i class="uk-icon-cloud-download"></i> Download</a>
</div>

<div class="uk-form-row">
    {{ Form::labelUk('excel', 'Pilih file') }}
    <div class="form-controls">
        {{ Form::file('excel') }}
    </div>
</div>

{{ HTML::divider() }}
<div class="uk-form-row">
    {{ Form::submitUk('Import') }}
</div>