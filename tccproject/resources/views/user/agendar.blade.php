@extends('layouts.mainUser')
@section('title', 'A.S.R - Agendamento de Salas e Recursos')

@section('css')
<link rel="stylesheet" href="/css/styleAgendar.css">

{{-- fullcalendar--}}
<link href="/fullcalendar/main.css" rel='stylesheet' />
<script src="/fullcalendar/main.js"></script>
@endsection

@section('content')
<main>
  <div class="title">
    <h1>Selecione uma data e horário</h1>
    <div class="separatorTitle"></div>
  </div>
  <div id="calendar"></div>

</main>
@endsection


<!-- Modal Agendamento -->
<div class="modal fade" id="newScheduling" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSchedulingLabel">Realizar Agendamento</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="equipmentScheduling" class="form-label">Recurso/Dispositivo</label>
            <select class="form-select form-control" id="equipmentScheduling" aria-label="Default select example">
              <option selected="true" disabled="disabled">Selecione o recurso</option>
              <option value="Datashow #1">Datashow #1</option>
              <option value="Datashow #2">Datashow #2</option>
              <option value="Datashow #3">Datashow #3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="enviromentScheduling" class="form-label">Ambiente</label>
            <select class="form-select form-control" id="enviromentScheduling" aria-label="Default select example">
              <option selected="true" disabled="disabled">Selecione o Ambiente</option>
              <option value="Auditório">Auditório</option>
              <option value="Sala Nivonei">Sala Nivonei</option>
              <option value="Mini auditório">Mini auditório</option>
              <option value="Lab. Informática">Lab. Informática</option>
              <option value="Lab. Química">Lab. Química</option>
              <option value="Lab. Meio Ambiente">Lab. Meio Ambiente</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dateWithdrawalScheduling" class="form-label">Data de Retirada</label>
            <input type="date" class="form-control" id="dateWithdrawalScheduling" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="dateReturnScheduling" class="form-label">Data de Entrega</label>
            <input type="date" class="form-control" id="dateReturnScheduling" aria-describedby="emailHelp" required>
          </div>
          <label for="" class="form-label">Horário:</label>
          <div class="mb-3" id="containerHour">
            <div>
              <label for="timeStartScheduling" class="form-label">De</label>
              <input type="time" class="form-control" id="dateStartScheduling" aria-describedby="emailHelp" required">
            </div>
            <div>
              <label for="timeEndScheduling" class="form-label">Até</label>
              <input type="time" class="form-control" id="dateEndScheduling" aria-describedby="emailHelp" required">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline-primary" id="env">Agendar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('js')
<script src="/js/scriptAgendar.js" defer></script>
@endsection