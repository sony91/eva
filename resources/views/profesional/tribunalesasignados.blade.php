<table class="table">
    <thead>
    <th>Codigo Docente</th>
    <th>Nombres</th>
    <th>Operaciones</th>
    </thead>

    @foreach($tribunales as $tribunal)
        <tbody>
        <td>
            <span class="text-primary">{{$tribunal->code_number}}</span>
        </td>
        <td>
            {{$tribunal->name}} - {{$tribunal->surname}}
        </td>
        <td>
            <a href="/tribunales/delete/{{$tribunal->id}}" class="btn btn-link" title="Eliminar?">
                <span class="fa fa-lg fa-trash text-danger"></span>
            </a>
        </td>
        </tbody>
    @endforeach
</table>