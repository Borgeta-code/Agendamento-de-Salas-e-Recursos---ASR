<!-- Modal Exclusão Ambiente -->
<div class="modal fade" id="destroyEnviroment{{ $enviroments->id }}" data-backdrop="static" data-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyEnviromentLabel">Excluir Ambiente</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="{{ route('admin.enviroments.destroy', $enviroments->id) }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nameEnviroment" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nameEnviroment" aria-describedby="emailHelp"
                            readonly value="{{ $enviroments->nomeAmbiente }}">
                    </div>
                    <div class="mb-3">
                        <label for="typeEnviroment" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="typeEnviroment" aria-describedby="typeHelp"
                            readonly value="{{ $enviroments->tipoAmbiente }}">
                    </div>
                    <div class="mb-3">
                        <label for="numberEnviroment" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="numberEnviroment" aria-describedby="numberHelp"
                            readonly value="{{ $enviroments->quantidadeAmbiente }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger l-flex" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-secondary" id="env">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>