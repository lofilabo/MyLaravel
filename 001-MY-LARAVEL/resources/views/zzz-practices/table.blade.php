<div class="table-responsive">
    <table class="table" id="zzzPractices-table">
        <thead>
            <tr>
                <th>Info</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($zzzPractices as $zzzPractice)
            <tr>
                <td>{{ $zzzPractice->info }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['zzzPractices.destroy', $zzzPractice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('zzzPractices.show', [$zzzPractice->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('zzzPractices.edit', [$zzzPractice->id]) }}" class='btn btn-default btn-xs'>
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
