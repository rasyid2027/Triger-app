<script>
  $(document).ready(function () {
    fillTable();
  })

  function fillTable() {
    $('#santri-table').DataTable({
      serverside : true,
      responsive : true,
      ajax : {
        url : "{{ route('data') }}"
      },
      columns : [
        // {
        //   "data " : null, "sortable" : false,
        //   render : function (data, type, row, meta) {
        //     return meta.row + meta.settings._iDisplayStart + 1
        //   }
        // },
        {data: 'aksi', name: 'aksi'},
        {data: 'uid', name: 'uid'},
        {data: 'nama', name: 'nama'},
        {data: 'foto', name: 'foto'},
        {data: 'cabang_sekarang', name: 'cabang_sekarang'},
        {data: 'panggilan', name: 'panggilan'},
        {data: 'kota_asal', name: 'kota_asal'},
        {data: 'no_telp', name: 'no_telp'},
        {data: 'nama_ortu', name: 'nama_ortu'},
        {data: 'no_telp_ortu', name: 'no_telp_ortu'},
        {data: 'alamat', name: 'alamat'},
        {data: 'email', name: 'email'},
        {data: 'tgl_join', name: 'tgl_join'},
        {data: 'status_santri', name: 'status_santri'},
        {data: 'fb', name: 'fb'},
        {data: 'fokus', name: 'fokus'},
        {data: 'last_update', name: 'last_update'},
      ],
      "order": [[ 12, "desc" ]]
    })
  }
</script>