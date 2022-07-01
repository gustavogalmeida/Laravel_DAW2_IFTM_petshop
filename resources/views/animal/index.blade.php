@extends ("templates.main")

@section ("title", "Animal - Petshop")

@section ("formulario")
    <h1>Cadastro de Animais</h1>
    <form action="/animal" method="POST" class="row">
        <div class="form-group col-2">
            <label for="nomedono">Dono</label>
            <input type="text" name="nomedono" class="form-control" value="{{ $animal->nomedono }}" required />      
        </div>
        <div class="form-group col-2">
            <label for="nomeanimal">Animal</label>
            <input type="text" name="nomeanimal" class="form-control" value="{{ $animal->nomeanimal }}" required />      
        </div>
        <div class="form-group col-2">
			<label for="especie">Espécie: </label>
			<select name="especie" class="form-control" required>
				<option></option>
				@foreach ($especies as $especie)
					@if ($especie->id == $animal->especie_id)
						<option value="{{ $especie->id }}" selected="selected">{{ $especie->especie }}</option>
					@else
						<option value="{{ $especie->id }}">{{ $especie->especie }}</option>
					@endif
				@endforeach
			</select>
		</div>
        <div class="form-group col-2">
            <label for="raca">Raça</label>
            <input type="text" name="raca" class="form-control" value="{{ $animal->raca }}" required />      
        </div>
        <div class="form-group col-2">
            <label for="datanascimento">Data de Nascimento</label>
            <input type="date" name="datanascimento" class="form-control" value="{{ $animal->datanascimento }}" required />      
        </div>
        <div class="form-group col-2">
            @csrf
            <input type="hidden" name="id" vlaue="{{ $animal->id }}" />

            <a href="/animal" class="btn btn-primary" style="margin-top: 24px">
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

@section ("tabela")
    <table class="table table-striped">
        <colgroup>
            <col width="200">
            <col width="200">
            <col width="100">
            <col width="50">
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Especie</th>
                <th>Idade</th>
                <th>Editar</th>
                <th>Salvar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animais as $animal)
                <tr>
                    <td> {{ $animal->nomeanimal}} </td>
                    <td> {{ $animal->especie}} </td>
                    <td> {{ $animal->idade }}</td>
                    <td>
                        <a href="/animal/{{ $animal->id }}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="/animal/{{ $animal->id }}" method="POST">
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