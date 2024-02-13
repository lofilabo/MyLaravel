<!-- Bruid Field -->
<div class="form-group col-sm-3">
    {!! Form::label('bruid', 'Bruid:') !!}
    {!! Form::text('bruid', null, ['class' => 'form-control']) !!}
</div>



<!-- Title Field -->
<div class="form-group col-sm-9">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::text('summary', null, ['class' => 'form-control']) !!}
</div>


<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Tasks:') !!}
    {!! Form::textarea('tasks', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Columns:') !!}
    {!! Form::textarea('columns', null, ['class' => 'form-control']) !!}
</div>


<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Column Order:') !!}
    {!! Form::textarea('columnOrder', null, ['class' => 'form-control']) !!}
</div>










<?php
/*
If this *is* a create-type template, we have to fake up a $lessonsadv 
object of "" values to give the select boxes something to bite.
*/
if(isset($isCreate)){
    $lessonsadv = (object)"";
    $lessonsadv->extref1 = "";
    $lessonsadv->extref2 = "";
    $lessonsadv->extref3 = "";
    $lessonsadv->extref4 = "";
    $lessonsadv->extref5 = "";
}
?>

<?php
/*
y'know what?  It's too much trouble.  Let's not even those these
things just yet, if we're just Creating.
*/
if(!isset($isCreate)){
?>  
            {!! Form::hidden('author', $lessonsadv->author) !!}
            <div class="form-group col-sm-3">
                {!! Form::label('extref1', 'Age Group :') !!}
                {!! Form::select('extref1[]', $ls_agegroup , isset($lessonsadv->extref1) ? explode(",",$lessonsadv->extref1) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref2', 'Subject :') !!}
                {!! Form::select('extref2[]', $ls_subject , isset($lessonsadv->extref2) ? explode(",",$lessonsadv->extref2) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref3', 'Topic :') !!}
                {!! Form::select('extref3[]', $ls_topic , isset($lessonsadv->extref3) ? explode(",",$lessonsadv->extref3) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref4', 'Concept :') !!}
                {!! Form::select('extref4[]', $ls_concept , isset($lessonsadv->extref4) ? explode(",",$lessonsadv->extref4) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>

            <div class="form-group col-sm-12">
                
                {!! Form::checkbox('extref5', '1' , $lessonsadv->extref5) !!}
                {!! Form::label('extref5', 'Using Building Blocks?') !!}
            </div>

<?php
}
?>



{{--
<!-- Exfield0 Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exfield0', 'Exfield0:') !!}
    {!! Form::text('exfield0', null, ['class' => 'form-control']) !!}
</div>

<!-- Exfield1 Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exfield1', 'Exfield1:') !!}
    {!! Form::text('exfield1', null, ['class' => 'form-control']) !!}
</div>

<!-- Exfield2 Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exfield2', 'Exfield2:') !!}
    {!! Form::text('exfield2', null, ['class' => 'form-control']) !!}
</div>

<!-- Exfield3 Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exfield3', 'Exfield3:') !!}
    {!! Form::text('exfield3', null, ['class' => 'form-control']) !!}
</div>

<!-- Exfield4 Field -->
<div class="form-group col-sm-4">
    {!! Form::label('exfield4', 'Exfield4:') !!}
    {!! Form::text('exfield4', null, ['class' => 'form-control']) !!}
</div>
--}}