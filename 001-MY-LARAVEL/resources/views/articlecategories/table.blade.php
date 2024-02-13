<div class="table-responsive">
    <table class="table" id="articlecategories-table">
        <thead>
            <tr>
                <th>Brid</th>
        <th>Optionval</th>
        <th>Parent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articlecategories as $articlecategories)
            <tr>
                <td>{{ $articlecategories->brid }}</td>
            <td>{{ $articlecategories->optionval }}</td>
            <td>{{ $articlecategories->parent }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['articlecategories.destroy', $articlecategories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articlecategories.show', [$articlecategories->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('articlecategories.edit', [$articlecategories->id]) }}" class='btn btn-default btn-xs'>
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
