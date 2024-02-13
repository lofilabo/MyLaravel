<div class="table-responsive">
    <table class="table" id="employerjobs-table">
        <thead>
            <tr>
                <th>Jobdescription</th>
        <th>Pitch</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employerjobs as $employerjobs)
            <tr>
                <td>{{ $employerjobs->jobdescription }}</td>
            <td>{{ $employerjobs->pitch }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employerjobs.destroy', $employerjobs->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employerjobs.show', [$employerjobs->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employerjobs.edit', [$employerjobs->id]) }}" class='btn btn-default btn-xs'>
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
