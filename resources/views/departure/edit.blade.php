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
    <form method="post" action="{{url('departure/'.$departure->id)}}">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Nomor surat</label>
          <input type="text" class="form-control" name="letter_number" value="{{$departure->letter->letter_number}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="exampleInputName">Peserta (ctrl+klik untuk pilih lebih dari 1)</label>
          <p>{{implode(',',$stud)}}</p>

          <select class="form-control" multiple="multiple" id="select2" name="student_id[]">
            @foreach ($studentss as $s)
              <option value="{{$s->id}}">{{$s->name}} {{$s->class}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Perusahaan</label>
          <select class="form-control" id="basic-single" name="company_id">
            <option value="{{$departure->company_id}}" selected>{{$departure->company->company}}</option>
            @foreach ($companies as $c)
              <option value="{{$c->id}}">{{$c->company}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Tanggal berangkat</label>
          <input type="text" class="form-control" name="departure_date" id="pickyDate" value="{{$departure->departure_date}}">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
