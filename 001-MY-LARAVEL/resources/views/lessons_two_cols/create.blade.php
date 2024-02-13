@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Lessons</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'lessons_two_cols.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('lessons_two_cols.fields')
                </div>

            </div>



            {!! Form::close() !!}

        </div>
    </div>
@endsection
