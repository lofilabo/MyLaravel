@include('lessons.lessonview_toppart') 
<div class='card-footer'>
<button type="button" class="clickzzzzz btn btn-danger" data-dismiss="modal">Restore from Storage</button>
</div>

@include('lessons.lessonview') 

<div style="display: none;">
 <textarea name='exfield1' id='exfield1' > {{ $lessons->exfield1 }} </textarea>
 <textarea name='exfield2' id='exfield2' > {{ $lessons->exfield2 }} </textarea>
</div>

<script>
    $('document').ready(function(){
        restoreFromStorage();
    });
</script> 




{{--

<!-- Bruid Field -->
<div class="col-sm-12">
    {!! Form::label('bruid', 'Your Reference:') !!}
    <p>{{ $lessons->bruid }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $lessons->title }}</p>
</div>

<!-- Body Field -->
<div class="col-sm-12">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $lessons->body }}</p>
</div>

<!-- Summary Field -->
<div class="col-sm-12">
    {!! Form::label('summary', 'Summary:') !!}
    <p>{{ $lessons->summary }}</p>
</div>

<!-- Exfield1 Field -->
<div class="col-sm-12">
    {!! Form::label('exfield1', 'Exfield1:') !!}
    <p>{{ $lessons->exfield1 }}</p>
</div>

<!-- Exfield2 Field -->
<div class="col-sm-12">
    {!! Form::label('exfield2', 'Exfield2:') !!}
    <p>{{ $lessons->exfield2 }}</p>
</div>

<!-- Exfield3 Field -->
<div class="col-sm-12">
    {!! Form::label('exfield3', 'Exfield3:') !!}
    <p>{{ $lessons->exfield3 }}</p>
</div>

<!-- Exfield4 Field -->
<div class="col-sm-12">
    {!! Form::label('exfield4', 'Exfield4:') !!}
    <p>{{ $lessons->exfield4 }}</p>
</div>

<!-- Extref1 Field -->
<div class="col-sm-12">
    {!! Form::label('extref1', 'Extref1:') !!}
    <p>{{ $lessons->extref1 }}</p>
</div>

<!-- Extref2 Field -->
<div class="col-sm-12">
    {!! Form::label('extref2', 'Extref2:') !!}
    <p>{{ $lessons->extref2 }}</p>
</div>

<!-- Extref3 Field -->
<div class="col-sm-12">
    {!! Form::label('extref3', 'Extref3:') !!}
    <p>{{ $lessons->extref3 }}</p>
</div>

<!-- Extref4 Field -->
<div class="col-sm-12">
    {!! Form::label('extref4', 'Extref4:') !!}
    <p>{{ $lessons->extref4 }}</p>
</div>

<!-- Extref5 Field -->
<div class="col-sm-12">
    {!! Form::label('extref5', 'Extref5:') !!}
    <p>{{ $lessons->extref5 }}</p>
</div>

<!-- Posteddate Field -->
<div class="col-sm-12">
    {!! Form::label('posteddate', 'Posteddate:') !!}
    <p>{{ $lessons->posteddate }}</p>
</div>

<!-- Posteddatetext Field -->
<div class="col-sm-12">
    {!! Form::label('posteddatetext', 'Posteddatetext:') !!}
    <p>{{ $lessons->posteddatetext }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $lessons->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $lessons->updated_at }}</p>
</div>


--}}


