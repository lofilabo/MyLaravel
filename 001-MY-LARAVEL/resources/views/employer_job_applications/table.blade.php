<div class="table-responsive">
    <table class="table" id="employerJobApplications-table">
        <thead>
            <tr>
                <th>Progress</th>
        <th>T1</th>
        <th>T2</th>
        <th>T3</th>
        <th>T4</th>
        <th>T5</th>
        <th>T6</th>
        <th>T7</th>
        <th>T8</th>
        <th>T9</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employerJobApplications as $employerJobApplication)
            <tr>
                <td>{{ $employerJobApplication->progress }}</td>
            <td>{{ $employerJobApplication->t1 }}</td>
            <td>{{ $employerJobApplication->t2 }}</td>
            <td>{{ $employerJobApplication->t3 }}</td>
            <td>{{ $employerJobApplication->t4 }}</td>
            <td>{{ $employerJobApplication->t5 }}</td>
            <td>{{ $employerJobApplication->t6 }}</td>
            <td>{{ $employerJobApplication->t7 }}</td>
            <td>{{ $employerJobApplication->t8 }}</td>
            <td>{{ $employerJobApplication->t9 }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employerJobApplications.destroy', $employerJobApplication->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employerJobApplications.show', [$employerJobApplication->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employerJobApplications.edit', [$employerJobApplication->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
