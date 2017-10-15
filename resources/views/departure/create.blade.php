@extends('layouts.app')

@section('content')
  @include('layouts.message')
  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#pickyDate').datepicker({
            format: "yyyy-mm-dd"
          });
      });
    </script>
  @endpush
    <form method="post" action="{{url('departure')}}">
      {{ csrf_field() }}
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Nomor surat</label>
          <input type="text" class="form-control" name="letter_number" value="{{$surat}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="exampleInputName">Peserta (ctrl+klik untuk pilih lebih dari 1)</label>
          <select class="form-control" multiple="multiple" name="student_id[]">
            @foreach ($students as $s)
              <option value="{{$s->id}}">{{$s->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Perusahaan</label>
          <select class="form-control" name="company_id">
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
