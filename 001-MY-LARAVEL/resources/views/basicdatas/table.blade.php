<div class="table-responsive">
    <table class="table" id="basicdatas-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($basicdatas as $basicdatas)
            <tr>
                <td>{{ $basicdatas->info }}</td>
            <td>{{ $basicdatas->type }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['basicdatas.destroy', $basicdatas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('basicdatas.show', [$basicdatas->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('basicdatas.edit', [$basicdatas->id]) }}" class='btn btn-default btn-xs'>
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
