<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <div class="media-body">
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <td>{{ $task->id }}</td>
                    </tr>
                    <tr>
                        <th>ステータス</th>
                        <td>{{ $task->status }}</td>
                    </tr>
                    <tr>
                        <th>タスク</th>
                        <td>{!! nl2br(e($task->content)) !!}</td>
                    </tr>
                </table>
                <div>
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-light']) !!}
                    @endif    
                </div>
            </div>
        </li>
    @endforeach    
</ul>
{{ $tasks->links('pagination::bootstrap-4') }}