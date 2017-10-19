<div class="modal fade" id="importStudent" tabindex="-1" role="dialog" aria-labelledby="importModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Import excel</h4>
      </div>
      <div class="modal-body">
        <h4>Masukan file .xls</h4>
        <form action="{{url('student/importExcel')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file" name="import_file" />
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="importCompany" tabindex="-1" role="dialog" aria-labelledby="importModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Import excel</h4>
      </div>
      <div class="modal-body">
        <h4>Masukan file .xls</h4>
        <form action="{{url('company/importExcel')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file" name="import_file" />
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
