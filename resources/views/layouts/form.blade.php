<script type="text/javascript">
  $(document).ready(function(){
    $('#delete-departure').click(function(){
      var id = $(this).val();
      swal(id);
    });
  });
</script>
<button class="btn btn-danger" id="delete-departure" value="{{$departure->id}}"><i class="fa fa-trash-o"></i></button>
