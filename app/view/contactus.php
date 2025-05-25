<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PROPERTEASE');
?>
<head>
  <meta charset="UTF-8">
  <title>PropertEase - Sign Up</title>
  <link href="<?php echo BASE_URL . '/public/styles.css'; ?>" rel="stylesheet">
  <link href="<?php echo BASE_URL . '/tailwind.css'; ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

<!-- Header -->
<?php include_once __DIR__ . '/include/header.php'; ?>

<!-- Hero banner section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-14 px-6">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-10">

    <div class="md:w-1/2 flex justify-center">
      <img src="<?php echo BASE_URL . "/app/view/img/phone-volume-solid.svg"; ?>" alt="Contact Icon"
           class="w-64 h-64 md:w-80 md:h-80 object-contain drop-shadow-md">
    </div>

    <div class="md:w-1/2 text-center md:text-left">
      <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">
        Get In Touch With Us
      </h1>
      <p class="text-lg md:text-xl font-semibold text-gray-800 mb-4" style="font-family: 'Poppins', sans-serif;">
        We are here to help you with all real estate needs - reach out anytime.
      </p>
    </div>
  </div>
</section>

<!-- Contact Us Section -->
<div class="contact-section">
  <h1 class="section-title flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
    Get in Touch With Us ☎️
  </h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 text-left">
    <div>
      <label class="form-label" style="font-family: 'Poppins', sans-serif;">Full Name</label>
      <input type="text" placeholder="Enter here" class="form-input" />
    </div>
    <div>
      <label class="form-label" style="font-family: 'Poppins', sans-serif;">Email Address</label>
      <input type="email" placeholder="Enter here" class="form-input" />
    </div>
    <div>
      <label class="form-label" style="font-family: 'Poppins', sans-serif;">Phone Number</label>
      <input type="tel" placeholder="Enter here" class="form-input" />
    </div>
    <div>
      <label class="form-label" style="font-family: 'Poppins', sans-serif;">Subject</label>
      <input type="text" placeholder="Enter here" class="form-input" />
    </div>
  </div>

  <div class="mb-6 text-left">
    <label class="form-label" style="font-family: 'Poppins', sans-serif;">Message</label>
    <textarea placeholder="Enter here" class="form-textarea"></textarea>
  </div>

  <div class="mb-6">
    <button class="btn-submit" style="font-family: 'Poppins', sans-serif;">
      Submit Now
    </button>
  </div>

  <!-- Contact Info -->
  <div class="faq-card shadow-inner">
    <p class="text-md font-semibold mb-2 text-gray-800 flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
      Contact Details 📍
    </p>
    <ul class="text-sm text-gray-700 text-left leading-relaxed">
      <li style="font-family: 'Poppins', sans-serif;">• <strong>Email:</strong> info@PropertyEase.com</li>
      <li style="font-family: 'Poppins', sans-serif;">• <strong>Phone:</strong> +94 77 123 4567</li>
      <li style="font-family: 'Poppins', sans-serif;">• <strong>Address:</strong> 123 Main Street, Colombo, Sri Lanka</li>
      <li style="font-family: 'Poppins', sans-serif;">• <strong>Business Hours:</strong> Mon - Fri, 9 AM - 6 PM</li>
    </ul>
  </div>
</div>

<!-- Feedback & Rating Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 px-4 py-12">
  <div class="max-w-xl mx-auto bg-yellow-50 p-6 rounded-xl shadow-lg">
    <h2 class="text-center text-lg font-semibold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">
      Tell us what you loved—or<br />how we can do better.
    </h2>

    <textarea
      placeholder="Enter here"
      class="form-textarea bg-yellow-100 h-28 shadow-md border-yellow-200 placeholder-gray-500 text-sm"
    ></textarea>

    <div class="mb-4">
      <p class="text-base font-semibold mb-2 text-gray-800" style="font-family: 'Poppins', sans-serif;">
        Rate Us Now
      </p>
      <div class="flex gap-2">
        <span class="star">★</span>
        <span class="star">★</span>
        <span class="star">★</span>
        <span class="star">★</span>
        <span class="star">★</span>
      </div>
    </div>

    <div class="text-left">
      <button class="faq-submit">
        Send Now
      </button>
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


<?php include_once __DIR__ . '/include/footer.php'; ?>

</body>
</html>