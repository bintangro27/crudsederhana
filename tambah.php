<?php
require_once 'function/f_tambah.php';

if(isset($_POST["submit"])) {
    if(tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php'; 
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'tambah.php'; 
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Add New Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-roboto flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-500"> STARCODE</a>
            <div class="hidden md:flex space-x-4">
                <a href="index.php" class="text-gray-700 hover:text-blue-500">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">About</a>
                <a href="contact.php" class="text-gray-700 hover:text-blue-500">Contact</a>
            </div>
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
            <a href="index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Home</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">About</a>
            <a href="contact.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Contact</a>
        </div>
    </nav>
    
    <div class="container mx-auto p-6 flex-grow mt-20">
        <header class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Add New User</h1>
        </header>
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="nama">Name</label>
                    <input type="text" id="nama" name="nama" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 font-semibold" for="foto">Upload Photo</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="flex justify-end">
                    <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2 transition">Cancel</a>
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add</button>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="bg-gray-800 p-4 mt-6 text-white text-center">
        <p>© 2025 App. All rights reserved.</p>
    </footer>
    
    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
