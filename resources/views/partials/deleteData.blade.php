<script>
  $(document).on('click', '.delete-data', function () {
    swal({
      title: "Yakin ingin menghapus?",
      text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        let uid = $(this).attr('id')
        $.ajax({
          url : "{{ route('data.destroy') }}",
          type : "POST",
          data : {
            uid : uid,
            "_token" : "{{ csrf_token() }}"
          },
          success : function (res) {
            swal(res.msg, {
              icon: "success",
            });
            $('#santri-table').DataTable().ajax.reload();
          }
        })
      } else {
        swal("Data anda aman");
      }
    });

  })
</script>