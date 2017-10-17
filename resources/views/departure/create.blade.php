@extends('layouts.app')

@section('content')
  @include('layouts.message')
  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#pickyDate').datepicker({
            format: "yyyy-mm-dd"
          });
        $('#select2').select2({
          theme: "bootstrap"
        });
        $('#basic-single').select2({
          theme: "bootstrap"
        });
      });
    </script>
  @endpush
    <form method="post" action="{{url('departure')}}">
      {{ csrf_field() }}
      <input type="hidden" name="letter_id" value="1">
      <input type="hidden" name="status" value="1">
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Nomor surat</label>
          <input type="text" class="form-control" name="letter_number" value="{{$surat}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label>Peserta</label>
          <p>
            <select class="form-control" id="select2" multiple="multiple" name="student_id[]">
              @foreach ($students as $s)
                <option value="{{$s->id}}">{{$s->name}} {{$s->class}}</option>
              @endforeach
            </select>
          </p>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Perusahaan</label>
          <select class="form-control" id="basic-single" name="company_id">
            @foreach ($companies as $c)
              <option value="{{$c->id}}">{{$c->company}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Tanggal berangkat</label>
          <input type="text" class="form-control" name="departure_date" id="pickyDate" placeholder="Tahun/Bulan/Tanggal">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
