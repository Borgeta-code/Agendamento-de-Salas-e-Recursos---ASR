<link rel="stylesheet" href="/css/styleCoordenacao.css">

<!-- Modal Exclusão Professor -->
<div class="modal fade" id="destroyTeacher{{ $teacher->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyteacherLabel">Excluir Ambiente</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="mb-3 p-3 alert-danger">
                        <i class="bi bi-exclamation-triangle"></i> Deseja realmente excluir esse registro?
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" aria-describedby="nameHelp" readonly
                            value="{{ $teacher->nome }}">
                    </div>
                    <div class="mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" aria-describedby="middlenameHelp"
                            readonly value="{{ $teacher->sobrenome }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" readonly
                            value="{{ $teacher->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="disciplina" class="form-label">Disciplina</label>
                        <input type="text" class="form-control" name="disciplina" aria-describedby="emailHelp"
                            readonly value="{{ $teacher->disciplina }}">
                    </div>
                    <div class="mb-3">
                        <label for="acesso" class="form-label">Acesso</label>
                        <input type="text" class="form-control" name="acesso" aria-describedby="emailHelp" readonly value="@if ($teacher->acesso == 0) Liberado @else Bloqueado @endif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnDanger" class="btn btn-danger l-flex" data-dismiss="modal" style="background-color: #dc3545;">Cancelar</button>
                    <button type="submit" class="btn btn-outline-secondary" id="env">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>
