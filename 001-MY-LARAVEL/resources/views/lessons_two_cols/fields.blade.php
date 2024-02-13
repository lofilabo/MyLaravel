<div 
<?php
/*
What's this?
IF the invoking controller does NOT have the 
'create' prop set, we assume it NOT a create
menu, and we DO make this a hideable class....
Which in practice means only adding the class 'collapse'.

So, no Create property:
    <div class="collapse" id="collapseExample">
If there IS a Create properry, we show the tables, make the
form not-hideable, like this:
     <div id="collapseExample">
*/
if(!isset($isCreate)){
?>
class="collapse show"
<?php
}
?>
 id="collapseExample">
    <div class="card card-body">
        <!-- Bruid Field -->
        <div class="row">
            <div class="form-group col-sm-4">
                {!! Form::label('bruid', 'Your Reference:') !!}
                {!! Form::text('bruid', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Title Field -->
            <div class="form-group col-sm-8">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Body Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>
              
            <!-- Summary Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('summary', 'Summary:') !!}
                {!! Form::textarea('summary', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>



<?php
/*
If this *is* a create-type template, we have to fake up a $lessons 
object of "" values to give the select boxes something to bite.
*/
if(isset($isCreate)){
    $lessons = (object)"";
    $lessons->extref1 = "";
    $lessons->extref2 = "";
    $lessons->extref3 = "";
    $lessons->extref4 = "";
    $lessons->extref5 = "";
}
?>

<?php
/*
y'know what?  It's too much trouble.  Let's not even those these
things just yet, if we're just Creating.
*/
if(!isset($isCreate)){
?>  
            {!! Form::hidden('author', $lessons->author) !!}
            <div class="form-group col-sm-3">
                {!! Form::label('extref1', 'Age Group :') !!}
                {!! Form::select('extref1[]', $ls_agegroup , isset($lessons->extref1) ? explode(",",$lessons->extref1) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref2', 'Subject :') !!}
                {!! Form::select('extref2[]', $ls_subject , isset($lessons->extref2) ? explode(",",$lessons->extref2) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref3', 'Topic :') !!}
                {!! Form::select('extref3[]', $ls_topic , isset($lessons->extref3) ? explode(",",$lessons->extref3) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::label('extref4', 'Concept :') !!}
                {!! Form::select('extref4[]', $ls_concept , isset($lessons->extref4) ? explode(",",$lessons->extref4) : null, ['multiple'=>'multiple','class' => 'form-control custom-select']) !!}
            </div>

            <div class="form-group col-sm-12">
                
                {!! Form::checkbox('extref5', '1' , $lessons->extref5) !!}
                {!! Form::label('extref5', 'Using Building Blocks?') !!}
            </div>

<?php
}
?>
        </div>
    </div>

    <div class="card-footer">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('lessonsTwoCols.index') }}" class="btn btn-default">Cancel</a>
    </div>

</div>

<div style="display: none;">

            <div class="form-group col-sm-12">
                {!! Form::label('exfield1', 'exfield1:') !!}
                {!! Form::textarea('exfield1', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>

            <!-- Exfield2 Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('exfield2', 'exfield2:') !!}
                {!! Form::textarea('exfield2', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>


    <!-- Posteddate Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('posteddate', 'Posteddate:') !!}
        {!! Form::text('posteddate', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Posteddatetext Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('posteddatetext', 'Posteddatetext:') !!}
        {!! Form::text('posteddatetext', null, ['class' => 'form-control']) !!}
    </div>
</div>