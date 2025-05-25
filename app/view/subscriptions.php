<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PropertEase'); 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase - Admin Profile</title>
    
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
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-[70vh] flex flex-col md:flex-row items-center px-6 md:px-16 py-12">
  
  <!-- Left Image -->
  <div class="w-full md:w-1/2 flex justify-center mb-8 md:mb-0" >
    <img src="<?php echo BASE_URL . "/app/view/img/subscription-removebg-preview.png" ?>" alt="Pricing Illustration" class="w-100 md:w-80 lg:w-96 object-contain">
  </div>

  <!-- Right Text Content -->
  <div class="w-full md:w-1/2 text-center md:text-left">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">
      Choose Your Plan
    </h1>
    <p class="text-lg md:text-xl font-semibold text-gray-800 mb-6" style="font-family: 'Poppins', sans-serif;">
      Flexible options for buyers, sellers, and agents —<br class="hidden md:inline" />
      pick what suits your goals best.
    </p>
    <p class="text-gray-800 max-w-xl" style="font-family: 'Poppins', sans-serif;">
      Whether you're listing a few properties or managing multiple clients, our plans are tailored to support your needs.
      Start with our Free plan or upgrade anytime for more features and visibility.
    </p>
  </div>
</section>
  
<!-- Subscription Plans Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-16 px-4 text-center">
  <h2 class="text-3xl md:text-4xl font-bold mb-12" style="font-family: 'Poppins', sans-serif;">
    Subscription Plans For Agents 👨‍💼
  </h2>

  <!-- Plans Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
    
    <!-- Plan 1 - Free Agent -->
        <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
        <div>
            <div class="text-2xl mb-2">🥇</div>
            <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">🆓 Free Agent</h3>
            <ul class="text-left space-y-2 text-sm">
            <li style="font-family: 'Poppins', sans-serif;">• Connect with up to 10 clients.</li>
            <li style="font-family: 'Poppins', sans-serif;">• Basic features to get started as a real estate agent.</li>
            </ul>
        </div>
        <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$0</p>
        <form method="POST" action="index.php?page=paymentform" class="mt-4">
            <input type="hidden" name="plan_name" value="Free Agent">
            <input type="hidden" name="price" value="0">
            <button type="submit" class="bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
            Buy Now
            </button>
        </form>
        </div>

        <!-- Plan 2 - Starter Agent -->
        <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
        <div>
            <div class="text-2xl mb-2">🥈</div>
            <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">⭐ Starter Agent</h3>
            <ul class="text-left space-y-2 text-sm">
            <li style="font-family: 'Poppins', sans-serif;">• Connect with 30 clients</li>
            <li style="font-family: 'Poppins', sans-serif;">• Get basic insights and limited message tools.</li>
            </ul>
        </div>
        <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$19.99</p>
        <form method="POST" action="index.php?page=paymentform" class="mt-4">
            <input type="hidden" name="plan_name" value="Starter Agent">
            <input type="hidden" name="price" value="19.99">
            <button type="submit" class="bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
            Buy Now
            </button>
        </form>
        </div>

        <!-- Plan 3 - Pro Agent -->
        <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
        <div>
            <div class="text-2xl mb-2">🥉</div>
            <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">🚀 Pro Agent</h3>
            <ul class="text-left space-y-2 text-sm">
            <li style="font-family: 'Poppins', sans-serif;">• Connect with up to 60 clients</li>
            <li style="font-family: 'Poppins', sans-serif;">• Get full access to analytics and appear in featured agents.</li>
            </ul>
        </div>
        <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$39.99</p>
        <form method="POST" action="index.php?page=paymentform" class="mt-4">
            <input type="hidden" name="plan_name" value="Pro Agent">
            <input type="hidden" name="price" value="39.99">
            <button type="submit" class="bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
            Buy Now
            </button>
        </form>
        </div>

        <!-- Plan 4 - Elite Agent -->
        <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
        <div>
            <div class="text-2xl mb-2">🏅</div>
            <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">👑 Elite Agent</h3>
            <ul class="text-left space-y-2 text-sm">
            <li style="font-family: 'Poppins', sans-serif;">• Unlimited client access</li>
            <li style="font-family: 'Poppins', sans-serif;">• Premium insights, priority in search results and top visibility.</li>
            </ul>
        </div>
        <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$59.99</p>
        <form method="POST" action="index.php?page=paymentform" class="mt-4">
            <input type="hidden" name="plan_name" value="Elite Agent">
            <input type="hidden" name="price" value="59.99">
            <button type="submit" class="bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
            Buy Now
            </button>
        </form>
        </div>

  </div>
</section>

<!-- Subscription Plans for Sellers Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-16 px-4 text-center">
  <h2 class="text-3xl md:text-4xl font-bold mb-12" style="font-family: 'Poppins', sans-serif;">
    Subscription Plans For Sellers 💼
  </h2>

  <!-- Plans Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
    
    <!-- Plan 1 - Free Seller -->
    <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
      <div>
        <div class="text-2xl mb-2">🥇</div>
        <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">🆓 Free Seller</h3>
        <ul class="text-left space-y-2 text-sm">
          <li style="font-family: 'Poppins', sans-serif;">• List up to 10 properties with standard visibility and tools.</li>
        </ul>
      </div>
      <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$0</p>
      <button class="mt-4 bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
          Buy Now
        </button>
    </div>

    <!-- Plan 2 - Starter Seller -->
    <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
      <div>
        <div class="text-2xl mb-2">🥈</div>
        <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">⭐ Starter Seller</h3>
        <ul class="text-left space-y-2 text-sm">
          <li style="font-family: 'Poppins', sans-serif;">• List up to 25 properties, gain more exposure and limited promotional tools.</li>
        </ul>
      </div>
      <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$14.99</p>
      <button class="mt-4 bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
          Buy Now
        </button>
    </div>

    <!-- Plan 3 - Pro Seller -->
    <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
      <div>
        <div class="text-2xl mb-2">🥉</div>
        <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">🚀 Pro Seller</h3>
        <ul class="text-left space-y-2 text-sm">
          <li style="font-family: 'Poppins', sans-serif;">• List up to 50 properties with improved visibility and insights.</li>
        </ul>
      </div>
      <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$29.99</p>
      <button class="mt-4 bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
          Buy Now
        </button>
    </div>

    <!-- Plan 4 - Elite Seller -->
    <div class="bg-yellow-100 rounded-xl shadow-lg p-6 flex flex-col justify-between">
      <div>
        <div class="text-2xl mb-2">🏅</div>
        <h3 class="text-xl font-bold mb-4" style="font-family: 'Poppins', sans-serif;">👑 Elite Seller</h3>
        <ul class="text-left space-y-2 text-sm">
          <li style="font-family: 'Poppins', sans-serif;">• Unlimited listings, feature properties on homepage, and access premium tools.</li>
        </ul>
      </div>
      <p class="text-2xl font-bold mt-6" style="font-family: 'Poppins', sans-serif;">$49.99</p>
      <button class="mt-4 bg-black text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-800 transition">
          Buy Now
        </button>
    </div>

  </div>
</section>

 <!-- Footer -->
<?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>