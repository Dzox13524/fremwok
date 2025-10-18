<?php
// (File: public/views/hasil.php)
// HAPUS SEMUA BLOK PHP YANG MEMBACA JSON DI SINI
// Data sekarang didapat dari Controller
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $data['judul']; ?></title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/style.css" /> 
    <style>
        body { background-color: #212529; color: white; }
        .card { background-color: #343a40; border: 1px solid #495057;}
        /* ... (style lain sudah benar) ... */
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-2" style="...">
                Data Registrasi Mahasiswa
            </h2>
            <p class="text-center text-muted">Data diambil dari database. Klik <i class="fa-solid fa-eye"></i> untuk melihat detail.</p>

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
                <a href="<?php echo BASEURL; ?>/pendaftar" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Kembali ke Form</a>
                
                <a href="<?php echo BASEURL; ?>" class="btn btn-outline-primary">
                    <i class="fa-solid fa-home"></i> Ke Home
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" ...>
      </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
    $(document).ready(function () {
        // ========================================================
        // PERBAIKI CARA MENDAPATKAN DATA
        // Ambil data dari variabel $data['pendaftar'] yang dikirim Controller
        // ========================================================
        const dataRegistrasi = <?php echo json_encode($data['pendaftar']); ?>;
        const detailModal = new bootstrap.Modal(document.getElementById("detailModal"));

        const table = new DataTable("#hasilTabel", {
            data: dataRegistrasi,
            columns: [
                // ... (kolom No., Nama, Jurusan, Kota sudah benar) ...
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
            $("#detailGender").text(data.jenis_kelamin); // Nama kolom dari DB
            $("#detailJurusan").text(data.jurusan);
            $("#detailAlamat").text(`${data.alamat}, ${data.kota}, ${data.provinsi}`);
            
            // PERBAIKI PATH FOTO & TTD
            // Path ini sesuai dengan yg disimpan Controller
            const fotoPath = "<?php echo BASEURL; ?>/public/uploads/foto/" + data.foto;
            const ttdPath = "<?php echo BASEURL; ?>/public/uploads/ttd/" + data.tanda_tangan;

            $("#detailFile").html(`<a href="${fotoPath}" target="_blank">${data.foto} <i class="fa-solid fa-external-link-alt fa-xs"></i></a>`);
            $("#detailFoto").attr("src", fotoPath);
            $("#detailSignature").attr("src", ttdPath);

            // Ubah 'timestamp' menjadi 'tanggal_daftar' (sesuai DB)
            const waktuLokal = new Date(data.tanggal_daftar).toLocaleString("id-ID", {
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