<div class="table-responsive">
    <table class="table" id="tareas-table">
        <thead>
            <tr>
                <th>Id Item</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->id_item }}</td>
            <td>{{ $tarea->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tareas.destroy', $tarea->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tareas.show', [$tarea->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tareas.edit', [$tarea->id]) }}" class='btn btn-default btn-xs'>
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
