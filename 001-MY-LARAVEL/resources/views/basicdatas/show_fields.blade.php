<!-- Info Field -->
<div class="col-sm-12">
    {!! Form::label('info', 'Info:') !!}
    <p>{{ $basicdatas->info }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $basicdatas->type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $basicdatas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $basicdatas->updated_at }}</p>
</div>

