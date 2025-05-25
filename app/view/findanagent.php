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


<!-- Find an Agent Hero Section – Fixed Alignment -->
<section class="bg-gradient-to-b from-yellow-100 to-yellow-300 flex items-center min-h-[70vh] py-10 px-6">

  <div class="w-150 mb-8">
    <img src="<?php echo BASE_URL . "/app/view/img/hand_shake-removebg-preview.png" ; ?>" alt="Agents Shaking Hands" class="w-200 h-100 object-cover">
  </div>

  <div class="md:w-1/2 text-center md:text-left">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Find the Right Agent for You</h1>
    <p class="text-lg md:text-xl text-gray-800 mb-6" style="font-family: 'Poppins', sans-serif;">Connect with trusted professionals to guide your property journey</p>
    <p class="text-gray-800 max-w-xl mx-auto md:mx-0 mb-8" style="font-family: 'Poppins', sans-serif;">Browse experienced real estate agents ready to assist with buying, selling, or renting. Choose the one that fits your goals and location best.</p>
    <br>
  </div>
</section>

<!-- Search the Agent Section -->
<section class="py-16 px-6 text-center bg-gradient-to-b from-yellow-100 to-yellow-300">
  <h2 class="text-4xl font-extrabold text-gray-900 mb-10 font-[Poppins]">
      Find Your Trusted Agent Here
  </h2>

  <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto">
    <?php foreach ($agents as $agent): ?>
      <div class="flex flex-col items-center text-center">
        <!-- Avatar (placeholder) -->
        <div class="w-16 h-16 bg-yellow-800 rounded-full mr-4 flex items-center justify-center text-white font-bold text-xl uppercase shadow"><?= htmlspecialchars(substr($agent['username'] ?? '', 0, 1)) ?></div>

        <!-- Username -->
        <h4 class="font-bold text-lg font-[Poppins]">
            <?= htmlspecialchars($agent['username']) ?>
        </h4>

        <!-- Info Card -->
        <div class="bg-yellow-100 rounded-xl p-4 shadow mt-2 text-left text-sm w-full space-y-1">
            <p><span class="font-semibold">Email:</span>
               <?= htmlspecialchars($agent['email']) ?></p>
            <p><span class="font-semibold">Phone:</span>
               <?= htmlspecialchars($agent['phone']) ?></p>
            <p><span class="font-semibold">License:</span>
               <?= htmlspecialchars($agent['license_number']) ?></p>
            <p><span class="font-semibold">Agency:</span>
               <?= htmlspecialchars($agent['agency_name']) ?></p>

          <form action="<?= BASE_URL ?>/public/index.php?page=contactagent" method="POST">
            <input type="hidden" name="agent_id" value="<?= $agent['id'] ?>">
            <button class="mt-3 bg-black text-white text-sm font-semibold px-4 py-2 rounded hover:bg-gray-800 transition">
               Contact Agent
            </button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- Footer -->
<?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>