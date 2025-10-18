<?php
// (File: public/views/register.php)
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($data['judul']) ? $data['judul'] : 'Formulir Pendaftaran'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/public/css/register.css" /> 
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="<?php echo BASEURL; ?>/public/js/register.js"></script> 
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <form
            id="registrationForm"
            action="<?php echo BASEURL; ?>/pendaftar/registeraksi" 
            method="post" 
            enctype="multipart/form-data"
          >
            <h2 class="mb-4 form-title">Register</h2>

            <div class="mb-3">
              <label for="namaLengkap" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="namaLengkap" name="nama" placeholder="Masukkan nama Anda" required />
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Buat password Anda" required />
              </div>
            <div class="mb-3">
              <label for="umur" class="form-label">Umur</label>
              <input type="number" class="form-control" id="umur" name="umur" placeholder="Contoh: 20" required/>
            </div>
            <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select class="form-select" id="jurusan" name="jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="DKV">Desain Komunikasi Visual</option>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select class="form-select" id="provinsi" name="provinsi" required>
                  <option value="">-- Pilih Provinsi --</option>
                  <option value="Jawa Timur">Jawa Timur</option>
                  <option value="Jawa Tengah">Jawa Tengah</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="kota" class="form-label">Kota</label>
                <select class="form-select" id="kota" name="kota" disabled required>
                  <option value="">-- Pilih provinsi dulu --</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat Anda"></textarea>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Upload Foto</label>
              <input class="form-control" type="file" id="foto" name="foto" required accept="image/*" />
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="pria" value="Pria" required/>
                <label class="form-check-label" for="pria">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="wanita" value="Wanita"/>
                <label class="form-check-label" for="wanita">Wanita</label>
              </div>
            </div>
            <div class="mb-3 text-center">
              <label class="form-label">Tanda Tangan Digital</label>
              <canvas id="myCanvas" width="400" height="150" class="border rounded"></canvas>
              <button type="button" id="clearCanvas" class="btn btn-secondary btn-sm mt-2">
                Hapus Tanda Tangan
              </button>
            </div>
             <input type="hidden" name="signature" id="signature">

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="persetujuan" name="persetujuan" value="setuju" required />
              <label class="form-check-label" for="persetujuan">Saya setuju dengan syarat dan ketentuan</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">
              Daftar Sekarang
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>