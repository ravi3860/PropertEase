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

<!-- Hero banner section -->
<br>
<section>
  <div class="flex flex-col md:flex-row items-center justify-between px-20 md:px-40 flex-grow">
    <div class="max-w-xl text-left mt-10 md:mt-0">
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Find Your Perfect Home with Ease</h2>
      <h3 class="text-lg font-semibold text-gray-800 mb-2" style="font-family: 'Poppins', sans-serif;">Connecting Buyers, Sellers & Agents Seamlessly</h3>
      <p class="text-gray-700 mb-6" style="font-family: 'Poppins', sans-serif;">Explore trusted listings, connect with verified agents, and manage your real estate journey — all in one place.</p>
      <a href="http://localhost/PropertEase/public/index.php?page=signup" class="inline-block bg-black text-white font-semibold px-6 py-2 rounded-md hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">Sign Up</a>
    </div>

    <div class="mt-10 md:mt-0 relative w-full max-w-md">
      <img src="<?php echo BASE_URL . "/app/view/img/hmimage.png" ?>" alt="homeimage" class="h-100 w-160">
    </div>
  </div>
</section>

<!-- Top Rated Properties -->
<section class="bg-gradient-to-b from-yellow-50 via-yellow-100 to-yellow-200 py-14">
  <div class="max-w-7xl mx-auto px-6">
    
    <h2 class="text-4xl font-extrabold text-center mb-10 font-[Poppins] tracking-tight" style="font-family: 'Poppins', sans-serif;">
      <span class="text-yellow-600">🏆&nbsp;Top Rated&nbsp;</span>Properties
    </h2>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      
      <?php if (!empty($_SESSION['top_rated_properties'])): ?>
        <?php foreach ($_SESSION['top_rated_properties'] as $property): ?>
          
          <!-- card -->
          <div
            class="group bg-white rounded-3xl shadow-lg ring-1 ring-yellow-100 overflow-hidden
                   transform transition hover:-translate-y-1 hover:shadow-2xl">

            <!-- image with dim + price badge -->
            <div class="relative">
              <img src="<?= explode(',', $property['images'])[0] ?>"
                   alt="<?= htmlspecialchars($property['title']); ?>"
                   class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
              
              <!-- price badge -->
              <span
                class="absolute bottom-3 right-3 bg-yellow-500 text-white text-sm font-semibold
                       px-3 py-1 rounded-full shadow-md" style="font-family: 'Poppins', sans-serif;">
                LKR <?= number_format($property['price']); ?>
              </span>
            </div>

            <!-- summary -->
            <div class="p-6 space-y-2">
              <h3 class="text-xl font-semibold truncate font-[Poppins]">
                <?= htmlspecialchars($property['title']); ?>
              </h3>

              <p class="text-sm text-gray-600 flex items-center gap-1 truncate">
                <i class="fas fa-map-marker-alt text-yellow-600"></i>
                <?= htmlspecialchars($property['location']); ?>
              </p>

              <!-- brief description limited to 2 lines -->
              <p class="text-gray-500 text-sm line-clamp-2">
                <?= htmlspecialchars($property['description']); ?>
              </p>

              <!-- CTA -->
              <a href="propertydetails.php?id=<?= $property['id']; ?>"
                 class="inline-flex items-center gap-2 mt-3 text-yellow-700 font-semibold
                        hover:text-yellow-900 transition" style="font-family: 'Poppins', sans-serif;">
                View Details
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>      
        <?php endforeach; ?>
      <?php else: ?>
        <p class="col-span-full text-center text-gray-600">
          No properties available right now.
        </p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Reviews Section -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 py-12 px-6 text-center relative">
  <h2 class="text-3xl font-bold mb-10" style="font-family: 'Poppins', sans-serif;">Reviews Example</h2>

  <!-- Review Cards -->
  <div class="grid gap-8 md:grid-cols-3 max-w-7xl mx-auto">

    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/re2.jpg" ?>" alt="James W." class="w-30 h-30 rounded-full object-cover mb-4 border-4 border-white shadow-md">
      <h3 class="font-bold text-lg" style="font-family: 'Poppins', sans-serif;"><i class="fas fa-user text-blue-500 mr-1"></i> James W.</h3>
      <p class="italic font-semibold mt-2 text-gray-800" style="font-family: 'Poppins', sans-serif;">
        “Smooth experience from start to finish. Found my dream home in days!”
      </p>
    </div>

    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/rev3.jpg" ?>"alt="Daniel K." class="w-30 h-30 rounded-full object-cover mb-4 border-4 border-white shadow-md">
      <h3 class="font-bold text-lg" style="font-family: 'Poppins', sans-serif;"><i class="fas fa-user text-blue-500 mr-1"></i> Daniel K.</h3>
      <p class="italic font-semibold mt-2 text-gray-800" style="font-family: 'Poppins', sans-serif;">
        “Great interface and helpful support. The listings were accurate and up to date.”
      </p>
    </div>

    <div class="flex flex-col items-center">
      <img src="<?php echo BASE_URL . "/app/view/img/rev1.jpg" ?>" alt="Arjun M." class="w-30 h-30 rounded-full object-cover mb-4 border-4 border-white shadow-md">
      <h3 class="font-bold text-lg" style="font-family: 'Poppins', sans-serif;"><i class="fas fa-user text-blue-500 mr-1"></i> Arjun M.</h3>
      <p class="italic font-semibold mt-2 text-gray-800" style="font-family: 'Poppins', sans-serif;">
        “Love how simple and fast everything was. Highly recommend this platform!”
      </p>
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