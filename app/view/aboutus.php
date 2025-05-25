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

<!-- Hero banner section -->
<br>
<section>
  <div class="flex flex-col md:flex-row items-center justify-between px-20 md:px-40 flex-grow">
    <div class="max-w-xl text-left mt-10 md:mt-0">
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Who We Are</h2>
      <h3 class="text-lg font-semibold text-gray-800 mb-2" style="font-family: 'Poppins', sans-serif;">Empowering Property Seekers with Trust and Technology</h3>
      <p class="text-gray-700 mb-6" style="font-family: 'Poppins', sans-serif;">We're a digital real estate platform connecting buyers, sellers and agents — making property transaction simple, smart and secure.</p>
    </div>

    <div class="mt-10 md:mt-0 relative w-full max-w-md">
      <img src="<?php echo BASE_URL . "/app/view/img/abut_us-removebg-preview.png" ?>" alt="homeimage" class="h-80 w-200">
    </div>
  </div>
</section>
  <br>
  <br>
<!-- Mission and Vision Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-12 px-6 text-center">
  <h2 class="text-3xl font-bold mb-12" style="font-family: 'Poppins', sans-serif;">Mission and Vision Example</h2>
  <br>
  <br>
  <!-- Mission Row -->
  <div class="flex flex-col md:flex-row items-center justify-center max-w-6xl mx-auto mb-12">
    <div class="w-full md:w-1/2">
      <img src="<?php echo BASE_URL . "/app/view/img/mission.jpg" ?>" alt="Our Mission" class="rounded-xl shadow-lg w-100 h-50">
    </div>
    <div class="w-full md:w-1/2 text-left">
      <h3 class="text-2xl font-bold mb-2"><span class="mr-2" style="font-family: 'Poppins', sans-serif;">🎯</span>Mission</h3>
      <p class="text-gray-800 text-base italic font-semibold" style="font-family: 'Poppins', sans-serif;">
        To simplify real estate experiences by connecting people with the right properties through a trusted and user-friendly platform.
      </p>
    </div>
  </div>
  <br>
  <br>
  <!-- Vision Row -->
  <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-6xl mx-auto">
    <div class="w-full md:w-1/2 text-left">
      <h3 class="text-2xl font-bold mb-2"><span class="mr-2" style="font-family: 'Poppins', sans-serif;">🌟</span>Vision</h3>
      <p class="text-gray-800 text-base italic font-semibold" style="font-family: 'Poppins', sans-serif;">
        To become the go-to real estate platform, empowering users to find their perfect property with confidence and ease.
      </p>
    </div>
    <div class="w-full md:w-1/2">
      <img src="<?php echo BASE_URL . "/app/view/img/vision.png" ?>" class="rounded-xl shadow-lg w-100 h-50">
    </div>
  </div>
</section>

<!-- Founders Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-12 px-6 text-center">
  <h2 class="text-3xl font-bold mb-12" style="font-family: 'Poppins', sans-serif;">Meet Our Founders</h2>
  <br>
  <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">
    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/Founder 1.webp" ?>" alt="Aiden Fernando" class="w-40 h-40 rounded-full object-cover shadow-md mb-2">
      <h3 class="text-lg font-bold mb-2" style="font-family: 'Poppins', sans-serif;">👨‍💼 Founder 1:</h3>
      <div class="bg-yellow-100 shadow-md p-4 rounded-lg text-left w-50">
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Name:</strong> Aiden Fernando</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Role:</strong> CEO & Co-Founder</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Bio (short):</strong> <em>Visionary leader passionate about tech-driven real estate solutions.</em></p>
      </div>
    </div>
    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/founder 2.jpg" ?>" alt="Nimal Perera" class="w-40 h-40 rounded-full object-cover shadow-md mb-2">
      <h3 class="text-lg font-bold mb-2" style="font-family: 'Poppins', sans-serif;">👨‍💼 Founder 2:</h3>
      <div class="bg-yellow-100 shadow-md p-4 rounded-lg text-left w-50">
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Name:</strong> Nimal Perera</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Role:</strong> CTO & Co-Founder</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Bio (short):</strong> <em>Tech expert building reliable and secure property platforms.</em></p>
      </div>
    </div>
    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/founder 3.jpg" ?>" alt="Shanika Jayasuriya" class="w-40 h-40 rounded-full object-cover shadow-md mb-2">
      <h3 class="text-lg font-bold mb-2" style="font-family: 'Poppins', sans-serif;">👨‍💼 Founder 3:</h3>
      <div class="bg-yellow-100 shadow-md p-4 rounded-lg text-left w-50">
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Name:</strong> Shanika Jayasuriya</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Role:</strong> COO & Co-Founder</p>
        <p style="font-family: 'Poppins', sans-serif;" class="font-semibold"><strong>Bio (short):</strong> <em>Operational strategist focused on seamless user experience and growth.</em></p>
      </div>
    </div>
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