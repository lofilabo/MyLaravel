<div class="table-responsive">
    <table class="table" id="zzzCHECKpractices-table">
        <thead>
            <tr>
                <th>Info</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzzCHECKpractices as $zzzCHECKpractice)
            <tr>
                <td>{{ $zzzCHECKpractice->info }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzzCHECKpractices.destroy', $zzzCHECKpractice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzzCHECKpractices.show', [$zzzCHECKpractice->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzzCHECKpractices.edit', [$zzzCHECKpractice->id]) }}" class='btn btn-default btn-xs'>
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
