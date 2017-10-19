<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var url = "{{url('departure')}}";
    $('#delete-departure-{{$departure->id}}').click(function(){
      var id = $(this).val();
      swal({
        title: "Yakin untuk melanjutkan?",
        text: "Saat mengklik ok, data ak terhapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajaxSetup({
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });

          $.ajax({
            type: "DELETE",
            url: url + '/' + id,
            success: function (data) {
              swal(
                "Data keberangkatan berhasil dihapus!",
                {
                  icon: "success",
                }
              ).then((refresh) =>{
                if (refresh) {
                  location.reload();
                }
              });
            }, error: function(data){
              swal(data);
            }
          });
        }
      });
    });
  });
</script>
<a class="btn btn-primary" href="{{url('departure/'.$departure->id)}}" data-toggle="tooltip" title="Lihat" ><i class="fa fa-search"></i></a>
<a class="btn btn-warning" href="{{url('departure/'.$departure->id.'/edit')}}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<button class="btn btn-danger" id="delete-departure-{{$departure->id}}" value="{{$departure->id}}" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i></button>