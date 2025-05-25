<!DOCTYPE html>
<html lang="en">
<head>
  <link href="styles.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PropertEase - Login</title>
  
  <!-- Styles -->
  <link href="/public/styles.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

    <!-- Header -->
       <?php include_once __DIR__ . '/include/header.php'; ?>

  <!-- Login Card -->
  <main class="flex-grow flex items-center justify-center py-10">
    <div class="bg-yellow-100 shadow-lg rounded-xl p-8 w-full max-w-md text-center">
      <h2 class="text-3xl font-bold mb-6" style="font-family: 'Poppins', sans-serif;">LOGIN</h2>

      <form method="POST" action="index.php?page=login_submit" class="space-y-4">
        <div>
          <label class="block text-left font-semibold mb-1" style="font-family: 'Poppins', sans-serif;">Username</label>
          <input type="text" name="username" placeholder="Enter here" class="w-full p-3 rounded-md shadow-inner bg-yellow-50 border border-gray-200" required />
        </div>

        <div>
          <label class="block text-left font-semibold mb-1" style="font-family: 'Poppins', sans-serif;">Password</label>
          <input type="password" name="password" placeholder="Enter here" class="w-full p-3 rounded-md shadow-inner bg-yellow-50 border border-gray-200" required />
        </div>

        <div class="flex justify-center gap-4 mb-4" style="font-family: 'Poppins', sans-serif;">
          <label><input type="radio" name="role" value="member" required /> Member</label>
          <label><input type="radio" name="role" value="agent" /> Agent</label>
          <label><input type="radio" name="role" value="admin" /> Admin</label>
        </div>

        <button type="submit" class="w-full bg-black text-white font-semibold py-2 rounded-md hover:bg-gray-800 transition" style="font-family: 'Poppins', sans-serif;">
          Login Now
        </button>
      </form>

      <p class="mt-6 text-xl font-extrabold" style="font-family: 'Poppins', sans-serif;">Or Login With</p>

      <div class="flex justify-center mt-2 gap-4 text-3xl">
        <i class="cursor-pointer fab fa-facebook"></i>
        <i class="cursor-pointer fab fa-google"></i>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include_once __DIR__ . '/include/footer.php'; ?>
  
</body>
</html>