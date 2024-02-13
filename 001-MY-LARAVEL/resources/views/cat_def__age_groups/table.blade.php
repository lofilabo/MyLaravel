<div class="table-responsive">
    <table class="table" id="catDefAgeGroups-table">
        <thead>
            <tr>
                <th>Brid</th>
        <th>Optionval</th>
        <th>Parent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catDefAgeGroups as $catDefAgeGroup)
            <tr>
                <td>{{ $catDefAgeGroup->brid }}</td>
            <td>{{ $catDefAgeGroup->optionval }}</td>
            <td>{{ $catDefAgeGroup->parent }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catDefAgeGroups.destroy', $catDefAgeGroup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catDefAgeGroups.show', [$catDefAgeGroup->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catDefAgeGroups.edit', [$catDefAgeGroup->id]) }}" class='btn btn-default btn-xs'>
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
