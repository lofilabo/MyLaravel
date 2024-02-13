<div class="table-responsive">
    <table class="table" id="catDefTopics-table">
        <thead>
            <tr>
                <th>Brid</th>
        <th>Optionval</th>
        <th>Parent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catDefTopics as $catDefTopic)
            <tr>
                <td>{{ $catDefTopic->brid }}</td>
            <td>{{ $catDefTopic->optionval }}</td>
            <td>{{ $catDefTopic->parent }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catDefTopics.destroy', $catDefTopic->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catDefTopics.show', [$catDefTopic->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catDefTopics.edit', [$catDefTopic->id]) }}" class='btn btn-default btn-xs'>
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
