<!-- Info Field -->
<div class="col-sm-12">
    {!! Form::label('info', 'Info:') !!}
    <p>{{ $status->info }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $status->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $status->updated_at }}</p>
</div>

