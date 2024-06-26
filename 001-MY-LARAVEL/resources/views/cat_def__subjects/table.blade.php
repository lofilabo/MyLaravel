<div class="table-responsive">
    <table class="table" id="catDefSubjects-table">
        <thead>
            <tr>
                <th>Brid</th>
        <th>Optionval</th>
        <th>Parent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catDefSubjects as $catDefSubject)
            <tr>
                <td>{{ $catDefSubject->brid }}</td>
            <td>{{ $catDefSubject->optionval }}</td>
            <td>{{ $catDefSubject->parent }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catDefSubjects.destroy', $catDefSubject->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catDefSubjects.show', [$catDefSubject->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catDefSubjects.edit', [$catDefSubject->id]) }}" class='btn btn-default btn-xs'>
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
