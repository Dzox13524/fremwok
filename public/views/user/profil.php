<?php
// (File: public/views/profil/index.php)
// Ambil data user dari $data['user'] yang dikirim Controller
$user = $data['user']; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['judul']; ?></title> 
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="bg-slate-900 ...">
    <div class="w-full max-w-3xl ...">
        <div class="w-full md:w-2/5 ...">
            <div class="z-10 flex flex-col items-center">

                <img class="w-40 h-40 ..."
                     src="<?php echo BASEURL . '/public/uploads/foto/' . htmlspecialchars($user['foto']); ?>" 
                     alt="Foto Profil">

                <h1 class="font-serif text-4xl text-white"><?php echo htmlspecialchars($user['nama']); ?></h1>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-sm text-purple-400">ID Pendaftar: #<?php echo htmlspecialchars($user['id']); ?></span>
                    </div>
            </div>

            <div class="z-10 w-full mt-8">
                <div class="w-full bg-slate-100 rounded-md p-2">
                    <img class="h-12 w-full object-contain"
                         src="<?php echo BASEURL . '/public/uploads/ttd/' . htmlspecialchars($user['tanda_tangan']); ?>" 
                         alt="Tanda Tangan">
                </div>
            </div>
        </div>
        <div class="w-full md:w-3/5 p-8">
            <h2 class="text-lg ...">Detail Pendaftar</h2>
            <div class="space-y-5 text-sm">
                <div class="flex ...">
                    <div>
                        <p class="text-gray-400">Jurusan</p>
                        <p class="font-medium text-white"><?php echo htmlspecialchars($user['jurusan']); ?></p>
                    </div>
                </div>
                <div class="flex ...">
                    <div>
                        <p class="text-gray-400">Alamat</p>
                        <p class="font-medium text-white">
                            <?php echo htmlspecialchars($user['alamat']) . ', ' . htmlspecialchars($user['kota']) . ', ' . htmlspecialchars($user['provinsi']); ?>
                        </p>
                    </div>
                </div>
                <div class="flex ...">
                    <div>
                        <p class="text-gray-400">Tanggal Daftar</p>
                        <p class="font-medium text-white">
                            <?php echo date('d F Y, H:i', strtotime($user['tanggal_daftar'])); ?> 
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="flex ...">
                         <div>
                             <p class="text-gray-400">Umur</p>
                             <p class="font-medium text-white"><?php echo htmlspecialchars($user['umur']); ?> tahun</p>
                         </div>
                     </div>
                     <div class="flex ...">
                         <div>
                             <p class="text-gray-400">Jenis Kelamin</p>
                             <p class="font-medium text-white"><?php echo htmlspecialchars($user['jenis_kelamin']); ?></p>
                         </div>
                     </div>
                </div>
            </div>
            <div class="mt-8 text-right">
                <a href="<?php echo BASEURL; ?>/profil" class="text-purple-400 ...">
                    Kembali &rarr;
                </a>
            </div>
        </div>
    </div>
</body>
</html>