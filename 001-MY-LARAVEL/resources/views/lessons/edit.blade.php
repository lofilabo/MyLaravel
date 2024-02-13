@extends('layouts.app')

<?php
if(Auth::user()->hasRole('admin') || ( Auth::user()->id == $lessons->author ) ){

?>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $lessons->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($lessons, ['route' => ['lessons.update', $lessons->id], 'method' => 'patch']) !!}

            <div class="card-body">

                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

                    @include('lessons.lessonview_toppart') 
                    <div class="card-body">
                        <button type="button" class="clickxxxxx btn btn-primary" data-dismiss="modal">Click Here to add an item.</button>
                        <button type="button" class="clickyyyyy btn btn-warning" data-dismiss="modal">Dump Layout</button>
                        <button type="button" class="clickzzzzz btn btn-secondary" data-dismiss="modal">Restore from Storage</button>
                        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                        <a href="{{ route('lessons.index') }}" class="btn btn-danger">Cancel</a>

                        <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Show/Hide Lesson Details
                        </a>
                    </div>
                        @include('lessons.fields')


                    @include('lessons.lessonview') 

                    <script>
                        $('document').ready(function(){
                            restoreFromStorage();
                        });
                    </script> 

                </div>


            </div>



           {!! Form::close() !!}

        </div>
    </div>
@endsection

<?php
}
?>
