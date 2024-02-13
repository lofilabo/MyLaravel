<div class="table-responsive">
    <table class="table" id="zzznibbles-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Note</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzznibbles as $zzznibble)
            <tr>
                <td>{{ $zzznibble->info }}</td>
            <td>{{ $zzznibble->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzznibbles.destroy', $zzznibble->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzznibbles.show', [$zzznibble->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzznibbles.edit', [$zzznibble->id]) }}" class='btn btn-default btn-xs'>
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
