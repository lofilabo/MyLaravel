<div class="table-responsive">
    <table class="table" id="testfield2s-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testfield2s as $testfield2s)
            <tr>
                <td>{{ $testfield2s->info }}</td>
            <td>{{ $testfield2s->type }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['testfield2s.destroy', $testfield2s->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testfield2s.show', [$testfield2s->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('testfield2s.edit', [$testfield2s->id]) }}" class='btn btn-default btn-xs'>
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
