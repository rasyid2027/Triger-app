@extends('layouts.main')

@section('content')
<div class="main-wrapper">
  <!-- navbar -->
  @include('partials.navbar')

  <!-- sidebar -->
  @include('partials.sidebar')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Santri Data</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row mb-3">
                  <button type="button" class="btn btn-icon icon-left btn-qodr" id="tambah-data" data-bs-toggle="modal" data-bs-target="#add-modal">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                  </button>
                </div>
                <div class="row">
                  <div class="table-responsive">
                    <table class="table table-striped" id="santri-table">
                      <thead>
                        <tr>
                          {{-- <th class="text-center">
                            No
                          </th> --}}
                          <th>Aksi</th>
                          <th>UID</th>
                          <th>Nama</th>
                          <th>Foto</th>
                          <th>Cabang</th>
                          <th>Panggilan</th>
                          <th>Kota_Asal</th>
                          <th>No.Telp</th>
                          <th>Nama_Ortu</th>
                          <th>No.Telp Ortu</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>Tanggal_Join</th>
                          <th>Status</th>
                          <th>Fb</th>
                          <th>Fokus</th>
                          <th>Last_Update</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
  @include('partials.addModal')

  @include('partials.editModal')

  @include('partials.footer')
</div>
@endsection
@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Get data with datatable -->
@include('partials.getData')

<!-- Store Data -->
@include('partials.storeData')

<!-- Edit Data -->
@include('partials.editData')

<!-- Delete Data -->
@include('partials.deleteData')
@endpush
