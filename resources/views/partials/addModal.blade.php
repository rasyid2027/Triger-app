<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Tambah Data Santri</h5>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="add-form">
          @csrf

          <div class="row">
            <div class="col-6 border-right">
              <div class="form-menu-header">personal information</div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Nama Panggilan</label>
                <input type="text" class="form-control" id="panggilan" name="panggilan" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" class="form-control" id="fb" name="fb" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>No. Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-menu-header">qodr related information</div>
              <div class="form-group">
                <label>UID</label>
                <input type="text" class="form-control" id="uid" name="uid" autocomplete="off" value="">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Tgl Join</label>
                <input type="date" class="form-control" id="tgl_join" name="tgl_join">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Cabang</label>
                <select name="cabang_sekarang" id="cabang_sekarang" class="form-control">
                  {{-- 'hq','andalus','samarinda','magetan','magelang','pekalongan','qodrbee','semarang' --}}
                  <option value="" selected disabled>--pilih cabang--</option>
                  <option value="hq">HQ</option>
                  <option value="andalus">Andalus</option>
                  <option value="samarinda">Samarinda</option>
                  <option value="magetan">Magetan</option>
                  <option value="magelang">Magelang</option>
                  <option value="pekalongan">Pekalongan</option>
                  <option value="qodrbee">QodrBee</option>
                  <option value="semarang">Semarang</option>
                </select>
                <div class="invalid-feedback">error</div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status_santri" id="status_santri" class="form-control">
                  {{-- 'seed','psb','santri_belajar','alumni','dropout','ngilang','cuti','magang','tugas-belajar','pkl','santri_magang' --}}
                  <option value="" selected disabled>--pilih status--</option>
                  <option value="seed">Seed</option>
                  <option value="psb">PSB</option>
                  <option value="santri_belajar">Santri Belajar</option>
                  <option value="alumni">Alumni</option>
                  <option value="dropout">Dropout</option>
                  <option value="ngilang">Menghilang</option>
                  <option value="cuti">Cuti</option>
                  <option value="magang">Santri Magang</option>
                  <option value="tugas-belajar">Tugas Belajar</option>
                  <option value="pkl">PKL</option>
                  <option value="santri_magang">Santri Magang</option>
                </select>
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Fokus</label>
                <select name="fokus" id="fokus" class="form-control">
                  {{-- 'Frontend Developer','Backend Developer','Mobile Developer','Internet Marketing','Designer','Bingung' --}}
                  <option value="" selected disabled>--pilih fokus--</option>
                  <option value="Frontend Developer">Frontend Developer</option>
                  <option value="Backend Developer">Backend Developer</option>
                  <option value="Mobile Developer">Mobile Developer</option>
                  <option value="Internet Marketing">Internet Marketing</option>
                  <option value="Designer">Designer</option>
                  <option value="Bingung">Bingung</option>
                </select>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12">
              <div class="form-menu-header">additional information</div>
              <div class="form-group">
                <label>Nama Orang Tua</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>No. Telp Orang Tua</label>
                <input type="text" class="form-control" id="no_telp_ortu" name="no_telp_ortu" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Kota Asal</label>
                <input type="text" class="form-control" id="kota_asal" name="kota_asal" autocomplete="off">
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" style="height: 20vh"></textarea>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="tutup">Tutup</button>
        <button type="button" class="btn btn-qodr" id="simpan">Simpan</button>
      </div>
    </div>
  </div>
</div>