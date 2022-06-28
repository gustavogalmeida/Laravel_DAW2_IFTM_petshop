@extends("templates.main")

@section("title", "Especie - Petshop")

@section("formulario")
    <h1>Cadastro de Especie</h1>
    <form action="/especie" method="POST" class="row">
        <div class="form-group col-10">
            <label for="especie">Especie</label>
            <input type="text" name="especie" class="form-control" value="{{ $especie->especie }}" />      
        </div>
        <div class="form-group col-2">
            @csrf
            <input type="hidden" name="id" vlaue="{{ $especie->id }}" />

            <a href="/especie" class="btn btn-primary" style="margin-top: 24px">
                <i class="bi bi-plus-square"></i>
                Novo
            </a>
            <button type="submit" class="btn btn-success" style="margin-top: 24px">
                <i class="bi bi-save"></i>
                Salvar
            </button>
        </div>
    </form>
@endsection
@section("tabela")
    <table class="table table-striped">
        <thead>
            <colgroup>
                <col width="500">
                <col width="50">
                <col width="50">
            </colgroup>
            <tr>
                <th>Especie</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especies as $especie)
            <tr>
                <td>{{ $especie->especie}}</td>
                <td>
                    <a href="/especie/{{ $especie->id }}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/especie/{{ $especie->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
                            <i class="bi bi-trash"></i>
                            Del
                        </button>
					</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection