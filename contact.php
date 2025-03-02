<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-roboto flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a class="text-2xl font-bold text-blue-500" href="index.php">STARCODE</a>
            <div class="hidden md:flex space-x-6">
                <a class="text-gray-700 hover:text-blue-500" href="index.php">Home</a>
                <a class="text-gray-700 hover:text-blue-500" href="#">About</a>
                <a class="text-gray-700 hover:text-blue-500" href="#">Contact</a>
            </div>
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="index.php">Home</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">About</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">Contact</a>
        </div>
    </nav>
    
    <div class="container mx-auto p-6 flex-grow">
        <!-- Header -->
        <header class="text-center py-6">
            <h1 class="text-3xl font-bold text-gray-800">Contact Us</h1>
            <p class="text-gray-600">Have any questions? We'd love to hear from you.</p>
        </header>
        
        <!-- Contact Form -->
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg mx-auto">
            <form id="contact-form" action="#" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="name">Name</label>
                    <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        id="name" name="name" type="text" required placeholder="Your Full Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
                    <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        id="email" name="email" type="email" required placeholder="Your Email Address">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="message">Message</label>
                    <textarea class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        id="message" name="message" rows="5" required placeholder="Write your message here..."></textarea>
                </div>
                <div class="flex justify-end">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-200" 
                        type="submit">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-800 p-4 mt-6 text-white text-center">
        <p>&copy; 2025 STARCODE App. All rights reserved.</p>
    </footer>
    
    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
