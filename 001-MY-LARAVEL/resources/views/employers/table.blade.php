<div class="table-responsive">
    <table class="table" id="employers-table">
        <thead>
            <tr>
                <th>User ID</th>
        <th>Contact Name</th>
        <th>Contact Email</th>
        <th>Contact Phone no</th>
        <th>Company</th>
        <th>Registered Address</th>
        <th>Registered Company No</th>
        <th>Billing Address</th>
        <th>VAT number</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employers as $employer)
            <tr>
                <td>{{ $employer->userid }}</td>
            <td>{{ $employer->contact_name }}</td>
            <td>{{ $employer->contact_email }}</td>
            <td>{{ $employer->contact_phone_no }}</td>
            <td>{{ $employer->company }}</td>
            <td>{{ $employer->registered_address }}</td>
            <td>{{ $employer->registered_company_no }}</td>
            <td>{{ $employer->billing_address }}</td>
            <td>{{ $employer->vat_number }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employers.show', [$employer->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employers.edit', [$employer->id]) }}" class='btn btn-default btn-xs'>
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
