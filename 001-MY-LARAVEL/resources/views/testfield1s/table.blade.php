<div class="table-responsive">
    <table class="table" id="testfield1s-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testfield1s as $testfield1s)
            <tr>
                <td>{{ $testfield1s->info }}</td>
            <td>{{ $testfield1s->type }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['testfield1s.destroy', $testfield1s->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testfield1s.show', [$testfield1s->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('testfield1s.edit', [$testfield1s->id]) }}" class='btn btn-default btn-xs'>
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
