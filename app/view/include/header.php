<!-- Header -->
<header class="bg-yellow-200 shadow-md">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

    <!-- Logo -->
    <a href="/PropertEase/public/index.php?page=home" class="flex items-center gap-3">
      <img src="/PropertEase/app/view/img/Logo.png" alt="Logo" class="h-16 w-16 rounded-full border-2 border-yellow-400 shadow-md">
      <span class="text-2xl font-bold text-gray-900 tracking-tight" style="font-family: 'Poppins', sans-serif;">
        PropertEase
      </span>
    </a>

    <!-- Navigation -->
    <nav class="hidden md:flex space-x-6 items-center">
      <a href="/PropertEase/public/index.php?page=home" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Home</a>
      <a href="/PropertEase/public/index.php?page=aboutus" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">About Us</a>
      <a href="/PropertEase/public/index.php?page=browseproperties" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Browse</a>
      <a href="/PropertEase/public/index.php?page=findanagent" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Find Agent</a>
      <a href="/PropertEase/public/index.php?page=subscriptions" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Plans</a>
      <a href="/PropertEase/public/index.php?page=homeloans" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Loans</a>
      <a href="/PropertEase/public/index.php?page=contactus" class="text-lg font-semibold text-gray-700 hover:text-yellow-600 transition" style="font-family: 'Poppins', sans-serif;">Contact</a>
    </nav>

    <!-- Login/User Icon -->
    <div class="ml-4">
      <?php if (isset($_SESSION['role'])): ?>
    <?php
        $role = $_SESSION['role'];
        $dashboardLink = '';
        if ($role === 'admin') {
            $dashboardLink = 'index.php?page=admindashboard';
        } elseif ($role === 'agent') {
            $dashboardLink = 'index.php?page=agentdashboard';
        } elseif ($role === 'member') {
            $dashboardLink = 'index.php?page=memberdashboard';
        }
    ?>
    <a href="<?= $dashboardLink ?>">
       <i class="fas fa-user text-2xl"></i>
    </a>
    <?php else: ?>
        <!-- If user not logged in, maybe link to login -->
        <a href="index.php?page=login">
            <i class="fas fa-user text-2xl"></i>
        </a>
    <?php endif; ?>
    </div>

  </div>
</header>