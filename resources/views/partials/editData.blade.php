<script>
  $('#simpan-edit').on('click', function () {
    $('#edit-modal').on('hidden.bs.modal', function (e) {
      $('.is-invalid').removeClass('is-invalid')
    })
    update()
  })

  $(document).on('click', '.edit-data', function () {
    let uid = $(this).attr('id')

    $.ajax({
      url : "{{ route('data.edit') }}",
      type : "POST",
      data : {
        uid : uid,
        "_token" : "{{ csrf_token() }}"
      },
      success : function (res) {
        $('#uid-edit').val(res.data.uid)
        $('#nama-edit').val(res.data.nama)
        $('#cabang_sekarang-edit').val(res.data.cabang_sekarang)
        $('#panggilan-edit').val(res.data.panggilan)
        $('#kota_asal-edit').val(res.data.kota_asal)
        $('#no_telp-edit').val(res.data.no_telp)
        $('#nama_ortu-edit').val(res.data.nama_ortu)
        $('#no_telp_ortu-edit').val(res.data.no_telp_ortu)
        $('#alamat-edit').val(res.data.alamat)
        $('#email-edit').val(res.data.email)
        $('#tgl_join-edit').val(res.data.tgl_join)
        $('#status_santri-edit').val(res.data.status_santri)
        $('#fb-edit').val(res.data.fb)
        $('#fokus-edit').val(res.data.fokus)
      }
    })
  })

  function update() {
    $.ajax({
      url : "{{ route('data.update') }}",
      type : "POST",
      data : {
        uid : $('#uid-edit').val(),
        nama : $('#nama-edit').val(),
        cabang_sekarang : $('#cabang_sekarang-edit').val(),
        panggilan : $('#panggilan-edit').val(),
        kota_asal : $('#kota_asal-edit').val(),
        no_telp : $('#no_telp-edit').val(),
        nama_ortu : $('#nama_ortu-edit').val(),
        no_telp_ortu : $('#no_telp_ortu-edit').val(),
        alamat : $('#alamat-edit').val(),
        email : $('#email-edit').val(),
        tgl_join : $('#tgl_join-edit').val(),
        status_santri : $('#status_santri-edit').val(),
        fb : $('#fb-edit').val(),
        fokus : $('#fokus-edit').val(),
        "_token" : "{{ csrf_token() }}"
      },
      success : function (res) {
        $('#tutup-edit').click();
        swal({
          title: "Sukses!",
          text: res.msg,
          icon: "success",
          button: "kembali",
        });
        $('#edit-form')[0].reset();
        $('#santri-table').DataTable().ajax.reload();
      },
      error : function (err) {
        let err_log = err.responseJSON.errors;

        if (err.status == 422) {
          
          if (typeof(err_log.uid) !== 'undefined') {
            $('#uid-edit').addClass('is-invalid').next().html(err_log.uid[0]);
          } else {
            $('#uid-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.nama) !== 'undefined') {
            $('#nama-edit').addClass('is-invalid').next().html(err_log.nama[0]);
          } else {
            $('#nama-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.cabang_sekarang) !== 'undefined') {
            $('#cabang_sekarang-edit').addClass('is-invalid').next().html(err_log.cabang_sekarang[0]);
          } else {
            $('#cabang_sekarang-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.panggilan) !== 'undefined') {
            $('#panggilan-edit').addClass('is-invalid').next().html(err_log.panggilan[0]);
          } else {
            $('#panggilan-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.kota_asal) !== 'undefined') {
            $('#kota_asal-edit').addClass('is-invalid').next().html(err_log.kota_asal[0]);
          } else {
            $('#kota_asal-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.no_telp) !== 'undefined') {
            $('#no_telp-edit').addClass('is-invalid').next().html(err_log.no_telp[0]);
          } else {
            $('#no_telp-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.nama_ortu) !== 'undefined') {
            $('#nama_ortu-edit').addClass('is-invalid').next().html(err_log.nama_ortu[0]);
          } else {
            $('#nama_ortu-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.no_telp_ortu) !== 'undefined') {
            $('#no_telp_ortu-edit').addClass('is-invalid').next().html(err_log.no_telp_ortu[0]);
          } else {
            $('#no_telp_ortu-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.alamat) !== 'undefined') {
            $('#alamat-edit').addClass('is-invalid').next().html(err_log.alamat[0]);
          } else {
            $('#alamat-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.email) !== 'undefined') {
            $('#email-edit').addClass('is-invalid').next().html(err_log.email[0]);
          } else {
            $('#email-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.tgl_join) !== 'undefined') {
            $('#tgl_join-edit').addClass('is-invalid').next().html(err_log.tgl_join[0]);
          } else {
            $('#tgl_join-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.status_santri) !== 'undefined') {
            $('#status_santri-edit').addClass('is-invalid').next().html(err_log.status_santri[0]);
          } else {
            $('#status_santri-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.fb) !== 'undefined') {
            $('#fb-edit').addClass('is-invalid').next().html(err_log.fb[0]);
          } else {
            $('#fb-edit').removeClass('is-invalid');
          }

          if (typeof(err_log.fokus) !== 'undefined') {
            $('#fokus-edit').addClass('is-invalid').next().html(err_log.fokus[0]);
          } else {
            $('#fokus-edit').removeClass('is-invalid');
          }
        }
      }
    })
  }
</script>