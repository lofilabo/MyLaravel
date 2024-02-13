<div class="table-responsive">
    <table class="table" id="articles-table">
        <thead>
            <tr>
        <th>Title</th>        
        <th>Summary</th>
        <?php
        /*
        <th>Body</th>
        <th>Exfield1</th>
        <th>Exfield2</th>
        <th>Exfield3</th>
        <th>Exfield4</th>
         <th>Posteddatetext</th>
        */
        ?>
        <th>Posted Date</th>
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $articles)
            <tr>
            <td>{{ $articles->title }}</td>    
            <td>{{ $articles->summary }}</td>
            <?php
            /*
            <td>{{ $articles->body }}</td>
            <td>{{ $articles->exfield1 }}</td>
            <td>{{ $articles->exfield2 }}</td>
            <td>{{ $articles->exfield3 }}</td>
            <td>{{ $articles->exfield4 }}</td>
            <td>{{ $articles->posteddatetext }}</td>
            */
            ?>
            <td>{{ $articles->updated_at }}</td>
            
                <td width="120">
                    {!! Form::open(['route' => ['articles.destroy', $articles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articles.show', [$articles->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('articles.edit', [$articles->id]) }}" class='btn btn-default btn-xs'>
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
