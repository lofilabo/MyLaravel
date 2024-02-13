<div class="table-responsive">
    <table class="table" id="lessonsadvs-table">
        <thead>
            <tr>
                <th>Summary</th>
        <th>Exfield0</th>
        <th>Exfield1</th>
        <th>Exfield2</th>
        <th>Exfield3</th>
        <th>Exfield4</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lessonsadvs as $lessonsadv)
            <tr>
                <td>{{ $lessonsadv->summary }}</td>
            <td>{{ $lessonsadv->exfield0 }}</td>
            <td>{{ $lessonsadv->exfield1 }}</td>
            <td>{{ $lessonsadv->exfield2 }}</td>
            <td>{{ $lessonsadv->exfield3 }}</td>
            <td>{{ $lessonsadv->exfield4 }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['lessonsadvs.destroy', $lessonsadv->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lessonsadvs.show', [$lessonsadv->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('lessonsadvs.edit', [$lessonsadv->id]) }}" class='btn btn-default btn-xs'>
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
