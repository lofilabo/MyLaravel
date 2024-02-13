<div class="table-responsive">
    <table class="table" id="pwdresets-table">
        <thead>
            <tr>
                <th>Info</th>
        <th>Type</th>
        <th>Userid</th>
        <th>Email</th>
        <th>Guid</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pwdresets as $pwdreset)
            <tr>
                <td>{{ $pwdreset->info }}</td>
            <td>{{ $pwdreset->type }}</td>
            <td>{{ $pwdreset->userid }}</td>
            <td>{{ $pwdreset->email }}</td>
            <td>{{ $pwdreset->guid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pwdresets.destroy', $pwdreset->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pwdresets.show', [$pwdreset->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pwdresets.edit', [$pwdreset->id]) }}" class='btn btn-default btn-xs'>
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
