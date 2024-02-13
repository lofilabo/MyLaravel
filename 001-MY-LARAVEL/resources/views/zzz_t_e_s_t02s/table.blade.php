<div class="table-responsive">
    <table class="table" id="zzzTEST02s-table">
        <thead>
            <tr>
                <th>Info</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzzTEST02s as $zzzTEST02)
            <tr>
                <td>{{ $zzzTEST02->info }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzzTEST02s.destroy', $zzzTEST02->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzzTEST02s.show', [$zzzTEST02->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzzTEST02s.edit', [$zzzTEST02->id]) }}" class='btn btn-default btn-xs'>
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
