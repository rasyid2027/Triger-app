<script>
  $('#simpan').on('click', function () {
    $('#add-modal').on('hidden.bs.modal', function (e) {
      $('.is-invalid').removeClass('is-invalid')
    })
    store()
  })

  function store() {
    $.ajax({
      url : "{{ route('data.store') }}",
      type : "POST",
      data : {
        uid : $('#uid').val(),
        nama : $('#nama').val(),
        cabang_sekarang : $('#cabang_sekarang').val(),
        panggilan : $('#panggilan').val(),
        kota_asal : $('#kota_asal').val(),
        no_telp : $('#no_telp').val(),
        nama_ortu : $('#nama_ortu').val(),
        no_telp_ortu : $('#no_telp_ortu').val(),
        alamat : $('#alamat').val(),
        email : $('#email').val(),
        tgl_join : $('#tgl_join').val(),
        status_santri : $('#status_santri').val(),
        fb : $('#fb').val(),
        fokus : $('#fokus').val(),
        "_token" : "{{ csrf_token() }}"
      },
      success : function (res) {
        $('#tutup').click();
        swal({
          title: "Sukses!",
          text: res.msg,
          icon: "success",
          button: "kembali",
        });
        $('#add-form')[0].reset();
        $('#santri-table').DataTable().ajax.reload();
      },
      error : function (err) {
        let err_log = err.responseJSON.errors;

        if (err.status == 422) {
          
          if (typeof(err_log.uid) !== 'undefined') {
            $('#uid').addClass('is-invalid').next().html(err_log.uid[0]);
          } else {
            $('#uid').removeClass('is-invalid');
          }

          if (typeof(err_log.nama) !== 'undefined') {
            $('#nama').addClass('is-invalid').next().html(err_log.nama[0]);
          } else {
            $('#nama').removeClass('is-invalid');
          }

          if (typeof(err_log.cabang_sekarang) !== 'undefined') {
            $('#cabang_sekarang').addClass('is-invalid').next().html(err_log.cabang_sekarang[0]);
          } else {
            $('#cabang_sekarang').removeClass('is-invalid');
          }

          if (typeof(err_log.panggilan) !== 'undefined') {
            $('#panggilan').addClass('is-invalid').next().html(err_log.panggilan[0]);
          } else {
            $('#panggilan').removeClass('is-invalid');
          }

          if (typeof(err_log.kota_asal) !== 'undefined') {
            $('#kota_asal').addClass('is-invalid').next().html(err_log.kota_asal[0]);
          } else {
            $('#kota_asal').removeClass('is-invalid');
          }

          if (typeof(err_log.no_telp) !== 'undefined') {
            $('#no_telp').addClass('is-invalid').next().html(err_log.no_telp[0]);
          } else {
            $('#no_telp').removeClass('is-invalid');
          }

          if (typeof(err_log.nama_ortu) !== 'undefined') {
            $('#nama_ortu').addClass('is-invalid').next().html(err_log.nama_ortu[0]);
          } else {
            $('#nama_ortu').removeClass('is-invalid');
          }

          if (typeof(err_log.no_telp_ortu) !== 'undefined') {
            $('#no_telp_ortu').addClass('is-invalid').next().html(err_log.no_telp_ortu[0]);
          } else {
            $('#no_telp_ortu').removeClass('is-invalid');
          }

          if (typeof(err_log.alamat) !== 'undefined') {
            $('#alamat').addClass('is-invalid').next().html(err_log.alamat[0]);
          } else {
            $('#alamat').removeClass('is-invalid');
          }

          if (typeof(err_log.email) !== 'undefined') {
            $('#email').addClass('is-invalid').next().html(err_log.email[0]);
          } else {
            $('#email').removeClass('is-invalid');
          }

          if (typeof(err_log.tgl_join) !== 'undefined') {
            $('#tgl_join').addClass('is-invalid').next().html(err_log.tgl_join[0]);
          } else {
            $('#tgl_join').removeClass('is-invalid');
          }

          if (typeof(err_log.status_santri) !== 'undefined') {
            $('#status_santri').addClass('is-invalid').next().html(err_log.status_santri[0]);
          } else {
            $('#status_santri').removeClass('is-invalid');
          }

          if (typeof(err_log.fb) !== 'undefined') {
            $('#fb').addClass('is-invalid').next().html(err_log.fb[0]);
          } else {
            $('#fb').removeClass('is-invalid');
          }

          if (typeof(err_log.fokus) !== 'undefined') {
            $('#fokus').addClass('is-invalid').next().html(err_log.fokus[0]);
          } else {
            $('#fokus').removeClass('is-invalid');
          }
        }
      }
    })
  }
</script>