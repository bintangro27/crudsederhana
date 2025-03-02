<?php

require_once 'function/f_edit.php';

$id = $_GET["id"];

$edit_pegawai = query("SELECT * FROM pegawai WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST, $id) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-roboto flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a class="text-2xl font-bold text-blue-500" href="#">STARCODE</a>
            <div class="hidden md:flex space-x-4">
                <a class="text-gray-700 hover:text-blue-500" href="index.php">Home</a>
                <a class="text-gray-700 hover:text-blue-500" href="#">About</a>
                <a class="text-gray-700 hover:text-blue-500" href="#">Contact</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-700 focus:outline-none" id="menu-button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="index.php">Home</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">About</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">Contact</a>
        </div>
    </nav>

    <div class="container mx-auto p-4 flex-grow">
        <!-- Header -->
        <header class="flex flex-col justify-center items-center py-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center">Edit User</h1>
        </header>
        <!-- Edit Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md mx-auto">
            <form action="" method="post"  enctype="multipart/form-data">

            <input type="hidden" name="fotolama" value="<?= $edit_pegawai["foto"]; ?>">

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="nama">Name</label>
                    <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="nama" name="nama" required type="text" value="<?= htmlspecialchars($edit_pegawai["nama"]) ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="email">Email</label>
                    <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" required type="email" value="<?= htmlspecialchars($edit_pegawai["email"]) ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="foto">Photo URL</label>
                    <img src="img/<?= htmlspecialchars($edit_pegawai['foto']); ?>" 
     alt="Foto Pegawai" 
     class="w-32 h-40 object-cover" 
     loading="lazy">

                    <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="foto" name="foto" type="file">
                </div>
                <div class="flex justify-end">
                    <a href="index.php">
                        <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2 transition duration-200" type="button">Cancel</button>
                    </a>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200" type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 p-4 mt-6 text-white text-center">
        <p>&copy; 2023 STARCODE App. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
