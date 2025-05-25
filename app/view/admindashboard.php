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

   <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-6 space-y-4 shadow-lg">
            <nav class="space-y-3">
                <a href="#dashboard" class="flex items-center space-x-3 w-full bg-yellow-400 text-black font-semibold py-3 px-4 rounded-lg hover:bg-yellow-500 transition duration-200 active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#profile" class="flex items-center space-x-3 w-full bg-yellow-400 text-black font-semibold py-3 px-4 rounded-lg hover:bg-yellow-500 transition duration-200" data-section="profile">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span>
                </a>
                <a href="#manage-users" class="flex items-center space-x-3 w-full bg-yellow-400 text-black font-semibold py-3 px-4 rounded-lg hover:bg-yellow-500 transition duration-200" data-section="manage-users">
                    <i class="fas fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <!-- Dashboard Section -->
            <section id="dashboard" class="section">
                <h1 class="text-3xl font-bold text-black mb-6">Welcome to the Admin Dashboard!</h1>
                <p class="text-gray-600 mb-6">Updated: Saturday, May 24, 2025, 01:01 PM +0530</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-users text-3xl text-yellow-500"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-black">Members</h3>
                                <p class="text-3xl font-bold text-black">150</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-user-tie text-3xl text-yellow-500"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-black">Agents</h3>
                                <p class="text-3xl font-bold text-black">45</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:scale-105 transition duration-300">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-user-shield text-3xl text-yellow-500"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-black">Admins</h3>
                                <p class="text-3xl font-bold text-black">5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Profile Section -->
                <section id="profile" class="section max-w-xl mx-auto">
                    <h1 class="text-3xl font-bold text-black mb-6">My Profile</h1>

                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <!-- Update Profile Form -->
                        <form action="index.php?page=updateadmin" method="post" class="space-y-6">
                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">

                            <div class="flex items-center space-x-4 mb-6">
                                <i class="fas fa-user-circle text-6xl text-yellow-500"></i>
                                <div>
                                    <h2 class="text-xl font-bold text-black"><?= htmlspecialchars($admin['username']) ?></h2>
                                    <p class="text-gray-600"><?= htmlspecialchars($admin['email']) ?></p>
                                </div>
                            </div>

                            <!-- Editable Fields -->
                            <div>
                                <label for="username" class="block font-semibold mb-1 text-gray-700">Username</label>
                                <input type="text" id="username" name="username" value="<?= htmlspecialchars($admin['username']) ?>" required
                                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-yellow-400 focus:ring-2 focus:ring-yellow-400" />
                            </div>

                            <div>
                                <label for="email" class="block font-semibold mb-1 text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($admin['email']) ?>" required
                                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-yellow-400 focus:ring-2 focus:ring-yellow-400" />
                            </div>

                            <div>
                                <label for="phone" class="block font-semibold mb-1 text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($admin['phone']) ?>" required
                                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-yellow-400 focus:ring-2 focus:ring-yellow-400" />
                            </div>

                            <!-- Update Button -->
                            <div>
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md w-full">
                                    Update Profile
                                </button>
                            </div>
                        </form>

                        <!-- Delete & Logout Buttons -->
                        <div class="mt-8 flex justify-between space-x-4">
                            <form action="index.php?page=deleteadmin" method="post" onsubmit="return confirm('Are you sure you want to delete your account?');" class="flex-1">
                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                <button type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md">
                                    Delete Account
                                </button>
                            </form>

                            <form action="index.php?page=logout" method="post" class="flex-1">
                                <button type="submit" 
                                    class="w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg shadow-md">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </section>

            <!-- Manage Users Section -->
            <section id="manage-users" class="section hidden">
                <h1 class="text-3xl font-bold text-black mb-6">Manage Users</h1>

            <!-- Agents Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <h3 class="text-lg font-semibold text-black p-6">Agents</h3>
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-4 text-gray-600">Name</th>
                            <th class="p-4 text-gray-600">Email</th>
                            <th class="p-4 text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($agents) && is_array($agents)): ?>
                            <?php foreach ($agents as $agent): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                                    <td class="p-4 text-black"><?php echo htmlspecialchars($agent['username']); ?></td>
                                    <td class="p-4 text-black"><?php echo htmlspecialchars($agent['email']); ?></td>
                                    <td class="p-4">
                                        <form method="POST" action="<?= BASE_URL ?>/public/index.php?page=deleteagent" onsubmit="return confirm('Are you sure you want to delete this agent?');">
                                            <input type="hidden" name="id" value="<?php echo $agent['id']; ?>">
                                            <button type="submit" class="bg-black text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr><td colspan="3">No agents found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Members Table -->
            <div class="bg-white rounded-2xl shadow-lg mt-6 overflow-hidden">
                <h3 class="text-lg font-semibold text-black p-6">Members</h3>
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-4 text-gray-600">Name</th>
                            <th class="p-4 text-gray-600">Email</th>
                            <th class="p-4 text-gray-600">Actions</th>
                    <tbody>
                        <?php if (isset($members) && is_array($members)): ?>
                            <?php foreach ($members as $member): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                                    <td class="p-4 text-black"><?php echo htmlspecialchars($member['username']); ?></td>
                                    <td class="p-4 text-black"><?php echo htmlspecialchars($member['email']); ?></td>
                                    <td class="p-4">
                                        <form method="POST" action="<?= BASE_URL ?>/public/index.php?page=delete_member" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                            <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                                            <button type="submit" class="bg-black text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                          <tr><td colspan="3">No members found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </section>
        </main>
    </div>


<script>
    const sidebarNav = document.querySelector('aside nav');
    const sidebarButtons = sidebarNav.querySelectorAll('a');
    const sections = document.querySelectorAll('.section');

    function toggleSection(sectionId) {
        sections.forEach(section => {
            section.classList.add('hidden');
        });

        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.classList.remove('hidden');
        }
    }


    function updateActiveButton(clickedButton) {
        sidebarButtons.forEach(button => {
            button.classList.remove('active');
        });
        clickedButton.classList.add('active');
    }

    // Add click event listeners to sidebar buttons
    sidebarButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const sectionId = this.getAttribute('data-section');
            toggleSection(sectionId);
            updateActiveButton(this);
        });
    });

    // showing the Dashboard section
    toggleSection('dashboard');
</script>
<!-- Footer -->
<?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>