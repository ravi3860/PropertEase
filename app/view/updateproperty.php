<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PROPERTEASE');
?>
<head>
  <meta charset="UTF-8">
  <title>PropertEase - Sign Up</title>
  <link href="<?php echo BASE_URL . '/public/styles.css'; ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

<!-- Header -->
<?php include_once __DIR__ . '/include/header.php'; ?>

<!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-8">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-teal-800 mb-6 text-center">Update Property</h2>
            <form action="<?= BASE_URL ?>/public/index.php?page=updateproperty" method="POST" class="space-y-6">
                 <input type="hidden" name="id" value="<?= htmlspecialchars($property['id']) ?>">
                <div>
                    <label for="title" class="block text-teal-700 font-medium mb-2">Property Title</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($property['title'] ?? '') ?>" required class="w-full p-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 hover:border-teal-300 transition duration-200" placeholder="Enter property title">
                </div>
                <div>
                    <label for="location" class="block text-teal-700 font-medium mb-2">Location</label>
                    <input type="text" id="location" name="location" value="<?= htmlspecialchars($property['location'] ?? '') ?>" required class="w-full p-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 hover:border-teal-300 transition duration-200" placeholder="Enter location">
                </div>
                <div>
                    <label for="price" class="block text-teal-700 font-medium mb-2">Price (LKR)</label>
                    <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($property['price'] ?? '') ?>" required class="w-full p-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 hover:border-teal-300 transition duration-200" placeholder="Enter price">
                </div>
                <div>
                    <label for="description" class="block text-teal-700 font-medium mb-2">Description</label>
                    <textarea id="description" name="description" class="w-full p-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 hover:border-teal-300 transition duration-200 h-24 resize-none" placeholder="Enter property description"><?= htmlspecialchars($property['description'] ?? '') ?></textarea>
                </div>
                <div>
                    <label for="images" class="block text-teal-700 font-medium mb-2">Images (URLs separated by commas)</label>
                    <input type="text" id="images" name="images" value="<?= htmlspecialchars($property['images'] ?? '') ?>" class="w-full p-3 border border-teal-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-400 hover:border-teal-300 transition duration-200" placeholder="Enter image URLs (e.g., url1, url2)">
                </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($property['id'] ?? '') ?>">
                <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-teal-700 text-white py-3 rounded-lg hover:from-teal-600 hover:to-teal-800 transition duration-300">Submit Property</button>
            </form>
        </div>
    </main>

<!-- Footer -->
<?php include_once __DIR__ . '/include/footer.php'; ?>

</body>
</html>