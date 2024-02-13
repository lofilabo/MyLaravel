    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<!-- Bruid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bruid', 'Bruid:') !!}
    {!! Form::text('bruid', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->


<div class="form-group col-sm-12">

    <div class="form-group">
        <textarea class="form-control" name="summernote" id="summernote">{!! $articles['body'] ?? '' !!}</textarea>
    </div>

</div>

<!-- Summary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::text('summary', null, ['class' => 'form-control']) !!}
</div>
@role('editor|admin')
<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat', 'Category:') !!}
    {!! Form::select('cat', $optionslist , isset($articles->cat) ? $articles->cat : null, ['class' => 'form-control custom-select']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('exfield1', 'Author:') !!}
    {!! Form::select('exfield1', $authorslist , isset($articles->exfield1) ? $articles->exfield1 : null, ['class' => 'form-control custom-select']) !!}
    
</div>
@endrole

<!--
<div class="form-group col-sm-6">
    {!! Form::label('exfield1', 'Exfield1:') !!}
    {!! Form::text('exfield1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('exfield2', 'Exfield2:') !!}
    {!! Form::text('exfield2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('exfield3', 'Exfield3:') !!}
    {!! Form::text('exfield3', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('exfield4', 'Exfield4:') !!}
    {!! Form::text('exfield4', null, ['class' => 'form-control']) !!}
</div>
-->
<div class="form-group col-sm-6">
    {!! Form::label('posteddate', 'Posteddate:') !!}
    {!! Form::text('posteddate', null, ['class' => 'form-control']) !!}
</div>





<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>