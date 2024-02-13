<div class="table-responsive">
    <table class="table" id="catDefConcepts-table">
        <thead>
            <tr>
                <th>Brid</th>
        <th>Optionval</th>
        <th>Parent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catDefConcepts as $catDefConcept)
            <tr>
                <td>{{ $catDefConcept->brid }}</td>
            <td>{{ $catDefConcept->optionval }}</td>
            <td>{{ $catDefConcept->parent }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catDefConcepts.destroy', $catDefConcept->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catDefConcepts.show', [$catDefConcept->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catDefConcepts.edit', [$catDefConcept->id]) }}" class='btn btn-default btn-xs'>
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
