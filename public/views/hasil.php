<?php
$file = 'data.json';
$dataRegistrasi = [];

if (isset($_GET['action']) && $_GET['action'] == 'reset') {
    if (file_exists($file)) {
        unlink($file);
    }
    header('Location: hasil.php');
    exit();
}

if (file_exists($file)) {
    $dataRegistrasi = json_decode(file_get_contents($file), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css" /> 
    <style>
        body { background-color: #212529; color: white; }
        .card { background-color: #343a40; border: 1px solid #495057;}
        .modal-content { background-color: #343a40; color: white; border: 1px solid #6c757d;}
        .table { --bs-table-bg: #343a40; --bs-table-striped-bg: #3e444a; --bs-table-hover-bg: #495057; --bs-table-border-color: #495057; color: white;}
        .dt-buttons .btn { color: white !important; }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-2" style="background: linear-gradient(90deg, #e808ff, #6f00ff); -webkit-background-clip: text; background-clip: text; color: transparent; font-weight: 700;">
                Data Registrasi Mahasiswa
            </h2>
            <p class="text-center text-muted">Data diambil dari server. Klik <i class="fa-solid fa-eye"></i> untuk melihat detail.</p>

            <table id="hasilTabel" class="table table-dark table-striped table-hover table-sm" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Jurusan</th>
                        <th>Kota</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="mt-4 d-flex justify-content-between">
                <a href="index.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Kembali ke Form</a>
                <a href="hasil.php?action=reset" id="resetData" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus semua data registrasi di server?')">
                    <i class="fa-solid fa-trash"></i> Reset Data Server
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel">Detail Registrasi</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-7">
                <h4><i class="fa-solid fa-user-check me-2" style="color: #e808ff"></i><span id="detailNama"></span></h4>
                <hr />
                <dl class="row">
                  <dt class="col-sm-4">Umur</dt><dd class="col-sm-8" id="detailUmur"></dd>
                  <dt class="col-sm-4">Gender</dt><dd class="col-sm-8" id="detailGender"></dd>
                  <dt class="col-sm-4">Jurusan</dt><dd class="col-sm-8" id="detailJurusan"></dd>
                  <dt class="col-sm-4">Alamat</dt><dd class="col-sm-8" id="detailAlamat"></dd>
                  <dt class="col-sm-4">File Foto</dt><dd class="col-sm-8" id="detailFile"></dd>
                  <dt class="col-sm-4">Waktu Submit</dt><dd class="col-sm-8" id="detailWaktu"></dd>
                </dl>
              </div>
              <div class="col-md-5 text-center">
                <h6><i class="fa-solid fa-camera-retro me-2" style="color: #e808ff"></i>Foto Profil:</h6>
                <img id="detailFoto" src="" alt="Foto Profil" class="img-fluid rounded mb-3" style="max-height: 150px;">
                <h6><i class="fa-solid fa-signature me-2" style="color: #6f00ff"></i>Tanda Tangan:</h6>
                <div class="border rounded p-2" style="background-color: white">
                  <img id="detailSignature" src="" alt="Tanda Tangan" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function () {
        const dataRegistrasi = <?php echo json_encode($dataRegistrasi); ?>;
        const detailModal = new bootstrap.Modal(document.getElementById("detailModal"));

        const table = new DataTable("#hasilTabel", {
            data: dataRegistrasi,
            columns: [
                {
                    title: "No.",
                    render: (data, type, row, meta) => meta.row + 1,
                },
                { data: "nama", title: "Nama Lengkap" },
                { data: "jurusan", title: "Jurusan" },
                { data: "kota", title: "Kota" },
                {
                    title: "Aksi",
                    data: null,
                    render: (data, type, row, meta) => `<button class="btn btn-sm btn-outline-light detail-btn" data-index="${meta.row}" title="Lihat Detail"><i class="fa-solid fa-eye"></i></button>`,
                    orderable: false,
                    className: "text-center",
                },
            ],
            layout: {
                topStart: { buttons: ["copy", "csv", "excel", "pdf", "print"] },
            },
            destroy: true,
        });

        $("#hasilTabel tbody").on("click", ".detail-btn", function () {
            const index = $(this).data("index");
            const data = dataRegistrasi[index];

            $("#detailNama").text(data.nama);
            $("#detailUmur").text(`${data.umur} tahun`);
            $("#detailGender").text(data.jenisKelamin);
            $("#detailJurusan").text(data.jurusan);
            $("#detailAlamat").text(`${data.alamat}, ${data.kota}, ${data.provinsi}`);
            $("#detailFile").html(`<a href="${data.fotoPath}" target="_blank">${data.fotoName} <i class="fa-solid fa-external-link-alt fa-xs"></i></a>`);
            $("#detailFoto").attr("src", data.fotoPath);
            $("#detailSignature").attr("src", data.signature);

            const waktuLokal = new Date(data.timestamp).toLocaleString("id-ID", {
                dateStyle: "long",
                timeStyle: "short",
            });
            $("#detailWaktu").text(waktuLokal + " WIB");

            detailModal.show();
        });

    });
    </script>
</body>
</html>