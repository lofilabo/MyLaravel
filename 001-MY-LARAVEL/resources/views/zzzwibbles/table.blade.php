<div class="table-responsive">
    <table class="table" id="zzzwibbles-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Note</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzzwibbles as $zzzwibble)
            <tr>
                <td>{{ $zzzwibble->info }}</td>
            <td>{{ $zzzwibble->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzzwibbles.destroy', $zzzwibble->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzzwibbles.show', [$zzzwibble->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzzwibbles.edit', [$zzzwibble->id]) }}" class='btn btn-default btn-xs'>
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
