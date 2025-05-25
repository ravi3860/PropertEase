<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PropertEase'); // Adjust if your base path is different
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase - Agent Profile</title>
    
    <!-- Tailwind CSS -->
    <link href="<?= BASE_URL ?>/public/styles.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

<!-- Header -->
<?php include_once __DIR__ . '/../view/include/header.php'; ?>

<section class="relative bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-[70vh] flex items-center justify-center text-center px-6 overflow-hidden">
  <div class="max-w-4xl mx-auto relative z-10">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4" style="font-family: 'Poppins', sans-serif;">Explore Your Perfect Property</h1>
    <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4" style="font-family: 'Poppins', sans-serif;">
      Discover listings that match your lifestyle and needs
    </h2>
    <p class="text-gray-800 max-w-3xl mx-auto text-lg" style="font-family: 'Poppins', sans-serif;">
      From cozy apartments to spacious villas, explore a wide range of property types tailored just for you.
      Find your next home with ease.
    </p>
  </div>

  <img src="<?php echo BASE_URL . "/app/view/img/buil1.png"?>" alt="City Sketch" class="right-10 mt-10 md:mt-0 relative w-full max-w-md">
  <img src="<?php echo BASE_URL . "/app/view/img/villa-removebg-preview.png"?>" alt="House Sketch" class="left-10 mt-10 md:mt-0 w-full max-w-md">
</section>

<!-- Properties for you Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-12 px-6 text-center">
  <h2 class="text-3xl font-bold mb-10" style="font-family: 'Poppins', sans-serif;">Properties For You</h2>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto p-4">
    <?php if (!empty($properties)) : ?>
        <?php foreach ($properties as $property) : ?>
            <div class="bg-yellow-100 rounded-xl shadow-md overflow-hidden">
                <div class="p-4">
                    <h3 class="font-bold text-lg"><?php echo htmlspecialchars($property['title']); ?></h3>
                    <p class="text-sm text-gray-700 mb-2">
                        <i class="fas fa-map-marker-alt text-black"></i>
                        <?php echo htmlspecialchars($property['location']); ?>
                    </p>
                    <p class="text-xl font-bold mb-2">LKR <?php echo number_format($property['price']); ?></p>
                    <p class="text-sm text-gray-600 mb-4"><?php echo htmlspecialchars($property['description']); ?></p>
                    <a href="#" class="inline-block bg-black text-white px-6 py-2 rounded-md font-semibold hover:bg-gray-800 transition">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-center text-gray-500">No properties found.</p>
    <?php endif; ?>
</div>
</section>

<!-- FAQ Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-12 px-6 text-center">
  <h2 class="text-3xl font-bold mb-10" style="font-family: 'Poppins', sans-serif;">Frequently Asked Questions</h2>

  <div class="max-w-3xl mx-auto text-left space-y-4 mb-10">
    <div class="bg-yellow-100 p-4 rounded-lg shadow">
      <h3 class="font-semibold text-lg" style="font-family: 'Poppins', sans-serif;">1. How do I create an account?</h3>
      <p class="text-sm text-gray-700 mt-1" style="font-family: 'Poppins', sans-serif;">Click on the Sign Up button, choose your role, and fill out the registration form to get started.</p>
    </div>

    <div class="bg-yellow-100 p-4 rounded-lg shadow">
      <h3 class="font-semibold text-lg" style="font-family: 'Poppins', sans-serif;">2. Can I list my property for free?</h3>
      <p class="text-sm text-gray-700 mt-1" style="font-family: 'Poppins', sans-serif;">Yes, we offer a free listing tier for basic property visibility. Premium features are optional.</p>
    </div>
     
    <div class="bg-yellow-100 p-4 rounded-lg shadow">
      <h3 class="font-semibold text-lg" style="font-family: 'Poppins', sans-serif;">3. How do I contact an agent?</h3>
      <p class="text-sm text-gray-700 mt-1" style="font-family: 'Poppins', sans-serif;">Use the “Find an Agent” menu option to browse and message agents directly from their profile.</p>
    </div>
    
    <div class="bg-yellow-100 p-4 rounded-lg shadow">
      <h3 class="font-semibold text-lg" style="font-family: 'Poppins', sans-serif;">4. What are the available subscription plans?</h3>
      <p class="text-sm text-gray-700 mt-1" style="font-family: 'Poppins', sans-serif;">We offer monthly and annual subscription plans with benefits like priority listings, analytics, and support.</p>
    </div>
  </div>
  
  <div class="max-w-xl mx-auto">
    <h3 class="text-lg font-semibold mb-2" style="font-family: 'Poppins', sans-serif;">Type your question here</h3>
    <form action="#" method="post" class="flex flex-col md:flex-row gap-3 items-center">
      <input type="text" name="user_question" placeholder="Enter your question..." class="w-full p-3 rounded-md border border-gray-300 shadow-inner bg-yellow-50" required>
      <button type="submit" class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">Submit</button>
    </form>
  </div>
</section>

<!-- Footer -->
    <?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>