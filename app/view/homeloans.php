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

<!-- Homeloans Hero Section -->
<section class="relative bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-[70vh] flex items-center justify-center text-center px-6 overflow-hidden">
  <div class="max-w-4xl mx-auto relative z-10">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4" style="font-family: 'Poppins', sans-serif;">Explore Your Perfect Property</h1>
    <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4" style="font-family: 'Poppins', sans-serif;">
      Discover listings that match your lifestyle and needs
    </h2>
    <p class="text-gray-800 max-w-3xl mx-auto text-lg" style="font-family: 'Poppins', sans-serif;">
      From cozy apartments to spacious villas, explore a wide range of property types tailored just for you.
      Find your next home with ease.
      <br>
      <br>
    </p>
  </div>

  <img src="<?php echo BASE_URL . "/app/view/img/images-removebg-preview.png"?>" alt="City Sketch" class="right-10 mt-10 md:mt-0 relative w-full max-w-md">
  <img src="<?php echo BASE_URL . "/app/view/img/download-removebg-preview.png"?>" alt="House Sketch" class="left-10 mt-10 md:mt-0 w-full max-w-md">
</section>

<!-- Calculate Homeloan Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 flex items-center justify-center min-h-screen">
  <div class="bg-yellow-50 p-8 rounded-2xl shadow-xl w-full max-w-xl">
    <h1 class="text-3xl font-extrabold text-center mb-6 text-gray-900">
      Calculate Your Loan Now
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
      <div>
        <label class="block text-sm font-semibold text-gray-800 mb-1" style="font-family: 'Poppins', sans-serif;">Property Price</label>
        <input type="number" placeholder="Enter amount"
          class="w-full p-3 rounded-lg bg-yellow-100 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-800 mb-1" style="font-family: 'Poppins', sans-serif;">Down Payment</label>
        <input type="number" placeholder="Enter amount"
          class="w-full p-3 rounded-lg bg-yellow-100 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-800 mb-1" style="font-family: 'Poppins', sans-serif;">Loan Term (Years)</label>
        <input type="number" placeholder="Enter years"
          class="w-full p-3 rounded-lg bg-yellow-100 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-800 mb-1" style="font-family: 'Poppins', sans-serif;">Interest Rate (%)</label>
        <input type="number" placeholder="Enter rate"
          class="w-full p-3 rounded-lg bg-yellow-100 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>
    </div>

    <div class="text-center mb-6">
      <button
        class="bg-black text-white text-sm font-semibold px-6 py-3 rounded-lg hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">
        Calculate Now
      </button>
    </div>

    <div>
      <label class="block text-sm font-semibold text-gray-800 mb-1" style="font-family: 'Poppins', sans-serif;">Monthly Payment</label>
      <input type="text" placeholder="Output"
        class="w-full p-3 rounded-lg bg-yellow-100 border border-yellow-300 text-center font-semibold text-gray-700" readonly />
    </div>
  </div>
</section>

<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 flex items-center justify-center min-h-screen">
  <div class="bg-yellow-50 p-8 rounded-2xl shadow-xl w-full max-w-2xl text-center">
    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-gray-900 mb-6" style="font-family: 'Poppins', sans-serif;">Trusted Lending Partners</h1>

    <!-- Description -->
    <div class="bg-yellow-100 p-4 rounded-lg shadow-sm mb-6">
      <p class="text-sm text-gray-700" style="font-family: 'Poppins', sans-serif;">
        • We've partnered with top financial institutions to offer you the best loan options available.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-center mb-6">
      <img src="<?php echo BASE_URL . "/app/view/img/boc.png"?>" alt="Bank of Ceylon" class="h-40 mx-auto" />
      <img src="<?php echo BASE_URL . "/app/view/img/commercial bank.png"?>" alt="Commercial Bank" class="h-30 mx-auto" />
      <img src="<?php echo BASE_URL . "/app/view/img/hnb.jpg"?>" alt="HNB" class="h-20 mx-auto" />
    </div>

    <!-- Buttons -->
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <button class="bg-black text-white font-semibold px-6 py-2 rounded-lg hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">
        Apply Now
      </button>
      <button class="bg-black text-white font-semibold px-6 py-2 rounded-lg hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">
        Contact Us
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