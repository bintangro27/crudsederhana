<?php require_once 'function/koneksi.php';



//pagination
//konfigurasi
$jumlahdataperhalaman = 5;
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// $jumlahdata = mysqli_num_rows($result);
$jumlahdata = count(query("SELECT * FROM pegawai"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman); 
// if(isset($_GET["halaman"])) {
// $halamanaktif = $_GET["halaman"];
// } else {
//     $halamanaktif = 1;
// }
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1; //lebih modular
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

$pegawai = query("SELECT * FROM pegawai  ORDER BY id ASC LIMIT $awaldata, $jumlahdataperhalaman"); 

$nomorID = $awaldata + 1; // Menentukan nomor ID dimulai dari offset + 1



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>CRUD App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-roboto flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-blue-600">STARCODE</a>
        <div class="hidden md:flex space-x-6">
            <a href="index.php" class="text-gray-700 hover:text-blue-500">Home</a>
            <a href="#" class="text-gray-700 hover:text-blue-500">About</a>
            <a href="contact.php" class="text-gray-700 hover:text-blue-500">Contact</a>
        </div>
        <button id="menu-button" class="md:hidden text-gray-700 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
    <div class="hidden md:hidden bg-white border-t px-4 py-2" id="mobile-menu">
        <a href="index.php" class="block py-2 text-gray-700 hover:bg-gray-100">Home</a>
        <a href="#" class="block py-2 text-gray-700 hover:bg-gray-100">About</a>
        <a href="contact" class="block py-2 text-gray-700 hover:bg-gray-100">Contact</a>
    </div>
</nav>

<div class="container mx-auto p-6 flex-grow mt-20">
    <!-- Header -->
    <header class="flex flex-col sm:flex-row justify-between items-center py-4">
        <h1 class="text-3xl font-bold text-gray-800"></h1>
    </header>

  <!-- Add New User & Search Bar sejajar -->
<div class="flex justify-between items-center mb-4">
    <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
        <i class="fas fa-plus"></i> Add New User
    </a>
    <input type="text" id="search" placeholder="Search..." class="px-4 py-2 border rounded-lg shadow w-full sm:w-1/3 focus:ring focus:ring-blue-300">
</div>


    <!-- Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-sm">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Photo</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm bg-white" id="table-body">
                <?php $i = 1;?> 
                <?php foreach($pegawai as $row) : ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3"><?= $nomorID++; ?></td>
                    <td class="px-6 py-3">
                        <img src="img/<?= $row["foto"]; ?>" alt="Profile" class="w-12 h-12 rounded-full border">
                    </td>
                    <td class="px-6 py-3"><?= $row["nama"]; ?></td>
                    <td class="px-6 py-3"><?= $row["email"]; ?></td>
                    <td class="px-6 py-3">
                        <div class="flex space-x-2">
                            <a href="edit.php?id=<?= $row["id"]; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs shadow hover:bg-yellow-600 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs shadow hover:bg-red-600 transition">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm">
        <?php if($halamanaktif > 1) : ?>
            <a href="?halaman=<?= $halamanaktif -1; ?>" class="px-4 py-2 border rounded-l-md text-gray-600 hover:bg-gray-200"><i class="fas fa-chevron-left"></i></a>
        <?php endif; ?>

        <?php for($i= 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if($i == $halamanaktif) : ?>
            <a href="?halaman=<?= $i; ?>"  class="px-4 py-2 border text-gray-700 hover:bg-gray-200"><?= $i; ?></a>
            <?php else : ?>
            <a href="?halaman=<?= $i; ?>" class="px-4 py-2 border text-gray-700 hover:bg-gray-200"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($halamanaktif < $jumlahhalaman) : ?>
            <a href="?halaman=<?= $halamanaktif + 1 ; ?>" class="px-4 py-2 border rounded-r-md text-gray-600 hover:bg-gray-200"><i class="fas fa-chevron-right"></i></a>
        <?php endif; ?>

        </nav>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center p-4 mt-6">
    <p>© 2025 STARCODE App. All rights reserved.</p>
</footer>

<script>
    // Search Feature
    document.getElementById('search').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#table-body tr');
        rows.forEach(row => {
            const name = row.cells[2].textContent.toLowerCase();
            const email = row.cells[3].textContent.toLowerCase();
            row.style.display = (name.includes(searchValue) || email.includes(searchValue)) ? '' : 'none';
        });
    });

    // Responsive Menu Toggle
    document.getElementById('menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
