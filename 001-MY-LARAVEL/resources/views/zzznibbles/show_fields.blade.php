<!-- Info Field -->
<div class="col-sm-12">
    {!! Form::label('info', 'Info:') !!}
    <p>{{ $zzznibble->info }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $zzznibble->note }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $zzznibble->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $zzznibble->updated_at }}</p>
</div>

