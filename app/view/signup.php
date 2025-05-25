<?php
/**
 * Sign‑up View
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PropertEase – Sign Up</title>

  <!-- Tailwind -->
  <link href="/PROPERTEASE/public/styles.css" rel="stylesheet">
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

  <?php include_once __DIR__ . '/include/header.php'; ?>

  <main class="flex items-center justify-center py-10 grow">
    <form action="index.php?page=add-user" method="POST" class="bg-yellow-100 shadow-lg rounded-xl p-8 w-full max-w-xl space-y-6">
      <h2 class="text-3xl font-bold text-center">Create Your Account</h2>

      <!-- Flash message → appears only when $flash is set -->
      <?php if (!empty($flash)): ?>
        <div class="<?php echo $type === 'error' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800'; ?> p-3 rounded">
          <?php echo htmlspecialchars($flash); ?>
        </div>
      <?php endif; ?>

      <!-- Role selector -->
      <div class="flex gap-10 justify-center">
        <label class="font-bold text-lg cursor-pointer">
          <input type="radio" name="userRole" value="member" class="mr-2" required>
          Member
        </label>
        <label class="font-bold text-lg cursor-pointer">
          <input type="radio" name="userRole" value="agent" class="mr-2" required>
          Agent
        </label>
      </div>

      <!-- Common fields -->
      <div class="space-y-4">
        <!-- Username -->
        <div>
          <label class="block font-semibold mb-1">Username <span class="text-red-600">*</span></label>
          <input type="text" name="username" class="w-full p-3 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Enter a unique username" required>
        </div>

        <!-- Email -->
        <div>
          <label class="block font-semibold mb-1">Email Address <span class="text-red-600">*</span></label>
          <input
            type="email"
            name="email"
            class="w-full p-3 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="you@example.com"
            required
          >
        </div>

        <!-- Password with toggle -->
        <div>
          <label class="block font-semibold mb-1">Password <span class="text-red-600">*</span></label>
          <div class="relative">
            <input
              type="password"
              name="password"
              id="passwordInput"
              minlength="6"
              class="w-full p-3 pr-10 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400"
              placeholder="Choose a strong password"
              required
            >
        <div class="mt-2">
          <input type="checkbox" id="togglePassword"> 
          <label for="togglePassword" class="text-sm" style="font-family: 'Poppins', sans-serif;">Show Password</label>
        </div>

          </div>
        </div>

        <!-- Phone -->
        <div>
          <label class="block font-semibold mb-1">Phone Number</label>
          <input
            type="tel"
            name="phone"
            pattern="[0-9 +()-]{7,20}"
            class="w-full p-3 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Optional contact number"
          >
        </div>
      </div>

      <!-- Agent‑only fields -->
      <div id="agentFields" class="hidden mt-4 space-y-4">
        <div>
          <label class="block font-semibold italic mb-1">License Number <span class="text-red-600">*</span></label>
          <input
            type="text"
            name="additionalInfo[license_number]"
            class="w-full p-3 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Professional license number"
          >
        </div>
        <div>
          <label class="block font-semibold italic mb-1">Agency Name <span class="text-red-600">*</span></label>
          <input type="text" name="additionalInfo[agency_name]" class="w-full p-3 rounded-md bg-yellow-50 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Your agency’s official name">
        </div>
      </div>

      <button type="submit" class="w-full bg-black text-white font-semibold py-3 rounded-md hover:bg-gray-800 transition"> Create Account </button>
    </form>
  </main>

  <?php include_once __DIR__ . '/include/footer.php'; ?>

  <!-- JavaScript for toggling agent fields and password visibility -->
  <script>
    (() => {
      const roleRadios    = document.querySelectorAll('input[name="userRole"]');
      const memberFields  = document.getElementById('memberFields');
      const agentFields   = document.getElementById('agentFields');

    roleRadios.forEach(radio => {
     radio.addEventListener('change', () => {
      if (radio.value === 'agent') {
        document.getElementById('agentFields').classList.remove('hidden');
        document.querySelector('input[name="additionalInfo[license_number]"]').required = true;
        document.querySelector('input[name="additionalInfo[agency_name]"]').required = true;
      } else {
        document.getElementById('agentFields').classList.add('hidden');
        document.querySelector('input[name="additionalInfo[license_number]"]').required = false;
        document.querySelector('input[name="additionalInfo[agency_name]"]').required = false;
      }
    });
  });

      // Password show / hide
      const pwdInput   = document.getElementById('passwordInput');
      const toggleBtn  = document.getElementById('togglePassword');
      if (pwdInput && toggleBtn) {
        toggleBtn.addEventListener('click', () => {
          const isHidden = pwdInput.type === 'password';
          pwdInput.type  = isHidden ? 'text' : 'password';
          toggleBtn.querySelector('i').classList.toggle('fa-eye-slash', isHidden);
        });
      }
    })();
  </script>
</body>
</html>
