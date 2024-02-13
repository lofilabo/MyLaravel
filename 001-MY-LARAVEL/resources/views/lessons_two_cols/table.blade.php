<div class="table-responsive">
    <table class="table" id="lessons-table">
        <thead>
            <tr>
                <th>Ref.</th>
        <th>Title</th>
        <th>Last Updated</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($lessons as $lessons)

            <?php
                $show = 0;
                if(Auth::user()->hasRole('admin') || ( Auth::user()->id == $lessons->author ) ){
                    $show = 1;
                }
            ?>
            <tr>
                <td>{{ $lessons->bruid }}</td>
                <td>{{ $lessons->title }}</td>
              <td>{{ $lessons->updated_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['lessonsTwoCols.destroy', $lessons->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lessonsTwoCols.show', [$lessons->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <?php
                        if($show==1){
                        ?>
                            <a href="{{ route('lessonsTwoCols.edit', [$lessons->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <?php
                        }
                        ?>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
