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
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col font-[Poppins]">

<!-- Header -->
<?php include_once __DIR__ . '/../view/include/header.php'; ?>

<!-- Main Content Container -->
<main class="flex-grow flex items-center justify-center px-4 py-12">
  <div class="bg-white shadow-xl rounded-2xl p-8 max-w-xl w-full">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Contact Agent</h2>

    <form action="index.php?page=sendagentrequest" method="POST" class="space-y-4">

      <!-- Hidden Agent ID -->
      <input type="hidden" name="agent_id" value="<?php echo $agentId; ?>">

      <!-- Member Name -->
      <div>
        <label class="block mb-1 text-gray-700 font-medium">Your Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($member['username']); ?>" 
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>

      <!-- Contact Number -->
      <div>
        <label class="block mb-1 text-gray-700 font-medium">Contact Number</label>
        <input type="text" name="contact_number" value="<?php echo htmlspecialchars($member['phone']); ?>" 
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>

      <!-- Message -->
      <div>
        <label class="block mb-1 text-gray-700 font-medium">Reason for Contacting</label>
        <textarea name="message" rows="4"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-200"> Send Request </button>
      </div>

    </form>
  </div>
</main>

<!-- Footer -->
<?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>