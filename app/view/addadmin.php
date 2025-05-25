<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PropertEase');   // adjust if your base path is different

    // Fetch session messages, assume session already started globally
    $error = $_SESSION['error'] ?? null;
    $success = $_SESSION['success'] ?? null;
    unset($_SESSION['error'], $_SESSION['success']);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PropertEase – Add New Admin</title>
    <!-- Tailwind CSS -->
    <link href="<?= BASE_URL ?>/public/styles.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>

<body class="bg-gradient-to-b from-yellow-50 to-yellow-200 min-h-screen flex flex-col font-[Poppins]">

    <!-- Header -->
    <?php include_once __DIR__ . '/../view/include/header.php'; ?>

    <!-- Main Content Wrapper -->
    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">

            <h1 class="text-3xl font-extrabold mb-8 text-center text-indigo-700">Add New Admin</h1>

            <?php if ($error): ?>
                <div class="mb-6 p-3 bg-red-100 text-red-700 rounded border border-red-300 shadow-sm">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="mb-6 p-3 bg-green-100 text-green-700 rounded border border-green-300 shadow-sm">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form action="index.php?page=addadmin_submit" method="POST" class="space-y-6">
                <div>
                    <label for="username" class="block mb-2 font-semibold text-gray-700">Username</label>
                    <input type="text" name="username" id="username" required
                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <div>
                    <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <div>
                    <label for="phone" class="block mb-2 font-semibold text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" required
                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <div>
                    <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-md hover:bg-indigo-700 transition duration-200">
                    Add Admin
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="index.php?page=admindashboard" class="text-indigo-600 hover:underline font-medium">
                    &larr; Back to Dashboard
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>
