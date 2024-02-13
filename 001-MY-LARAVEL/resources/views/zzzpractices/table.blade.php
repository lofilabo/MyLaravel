<div class="table-responsive">
    <table class="table" id="zzzpractices-table">
        <thead>
            <tr>
                <th>Info</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzzpractices as $zzzpractice)
            <tr>
                <td>{{ $zzzpractice->info }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzzpractices.destroy', $zzzpractice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzzpractices.show', [$zzzpractice->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzzpractices.edit', [$zzzpractice->id]) }}" class='btn btn-default btn-xs'>
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
