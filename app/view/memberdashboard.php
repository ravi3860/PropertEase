<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PropertEase'); 
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

    <!-- Main Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-yellow-200 p-6">
            <h2 class="text-2xl font-bold mb-6">Welcome back, <?= htmlspecialchars($member['username'] ?? '') ?>!</h2>
            <button onclick="showSection('profile')" class="w-full py-3 mb-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">My Profile</button>
            <button onclick="showSection('properties')" class="w-full py-3 mb-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">My Properties</button>
            <button onclick="showSection('agent')" class="w-full py-3 mb-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">Agent Request Status</button>
            <button onclick="showSection('subscription')" class="w-full py-3 mb-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">Subscription Status</button>
        </aside>

        <!-- Main Content -->
        <main class="w-4/5 p-6">
            <!-- Profile Section -->
            <section id="profile" class="section bg-blue-50 p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-blue-800 rounded-full mr-4 flex items-center justify-center text-white font-bold text-xl uppercase shadow"><?= htmlspecialchars(substr($member['username'] ?? '', 0, 1)) ?></div>
                    <h2 class="text-2xl font-bold text-blue-800"><?= htmlspecialchars($member['username'] ?? '') ?></h2>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <form action="<?= BASE_URL ?>/public/index.php?page=updatemember" method="POST" class="grid grid-cols-2 gap-4 mb-6">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($member['id'] ?? '') ?>"/>
                        <div>
                            <label class="block text-blue-700 mb-1 font-medium">Username</label>
                            <input name="username" value="<?= htmlspecialchars($member['username']) ?>" class="w-full p-3 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-blue-700 mb-1 font-medium">Password</label>
                            <input type="password" value="********" class="w-full p-3 border border-blue-200 rounded-lg shadow-sm bg-gray-100" disabled>
                            <small class="text-xs text-blue-600">Use the change-password page to update.</small>
                        </div>
                        <div>
                            <label class="block text-blue-700 mb-1 font-medium">Email</label>
                            <input name="email" type="email" value="<?= htmlspecialchars($member['email']) ?>" class="w-full p-3 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-blue-700 mb-1 font-medium">Phone number</label>
                            <input name="phone" type="text" value="<?= htmlspecialchars($member['phone']) ?>" class="w-full p-3 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div class="col-span-2 flex space-x-4 pt-4">
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-6 rounded-lg hover:from-blue-600 hover:to-blue-800 transition duration-300">Update</button>
                    </form>
                    <form action="<?= BASE_URL ?>/public/index.php?page=logoutmember" method="POST">
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-6 rounded-lg hover:from-blue-600 hover:to-blue-800 transition duration-300">SignOut</button>
                    </form>
                    <form action="<?= BASE_URL ?>/public/index.php?page=deletemember" method="POST" onsubmit="return confirm('Delete your account permanently?')">
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-6 rounded-lg hover:from-blue-600 hover:to-blue-800 transition duration-300">Delete</button>
                    </form>
                </div>
            </section>

            <!-- My Properties Section -->
            <section id="properties" class="section hidden bg-gradient-to-br from-teal-50 to-teal-100 p-8 rounded-xl shadow-lg">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-teal-400 rounded-full mr-4 flex items-center justify-center text-white font-bold text-xl uppercase shadow">
                <?= htmlspecialchars(substr($member['username'] ?? '', 0, 1)) ?>
                </div>
                <h2 class="text-3xl font-extrabold text-teal-900 tracking-wide"><?= htmlspecialchars($member['username'] ?? '') ?></h2>
            </div>

            <h3 class="text-2xl font-semibold mb-8 text-teal-800 border-b border-teal-300 pb-3">My Properties</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <?php if (isset($_SESSION['my_properties']) && count($_SESSION['my_properties']) > 0): ?>
                <?php foreach ($_SESSION['my_properties'] as $property): ?>
                    <div class="bg-white rounded-xl p-5 shadow-md hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                    <img src="<?= explode(',', $property['images'])[0] ?>" alt="Property Image" class="w-full h-40 rounded-lg object-cover mb-4 border border-teal-200" />
                    <h4 class="text-xl font-semibold text-teal-700 mb-1 truncate"><?= htmlspecialchars($property['title']) ?></h4>
                    <p class="text-sm text-teal-600 mb-2 font-medium"><?= htmlspecialchars($property['location']) ?></p>
                    <p class="text-lg font-bold text-teal-800 mb-2">LKR <?= number_format($property['price']) ?></p>
                    <p class="text-gray-600 text-sm flex-grow mb-4 line-clamp-3"><?= htmlspecialchars($property['description']) ?></p>

                    <div class="space-y-2">
                        <form method="post" action="index.php?page=browseproperties">
                        <input type="hidden" name="id" value="<?= $property['id'] ?>">
                        <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg font-semibold transition">View</button>
                        </form>
                        <form method="post" action="index.php?page=editpropertyform">
                        <input type="hidden" name="id" value="<?= $property['id'] ?>">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">Update</button>
                        </form>
                        <form method="post" action="index.php?page=deleteproperty" onsubmit="return confirm('Are you sure you want to delete this property?')">
                        <input type="hidden" name="id" value="<?= $property['id'] ?>">
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-semibold transition">Delete</button>
                        </form>
                    </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p class="text-teal-700 text-center col-span-full">You have not added any properties yet.</p>
                <?php endif; ?>
            </div>

            <div class="flex justify-center">
                <a href="index.php?page=propertform" class="inline-block bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                + Add Property
                </a>
            </div>
            </section>
            
            <!-- My Agent Requests Section -->
            <section id="agent" class="section hidden bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-purple-600 rounded-full mr-4 flex items-center justify-center text-white font-bold text-xl uppercase shadow"><?= htmlspecialchars(substr($member['username'] ?? '', 0, 1)) ?></div>
                    <h2 class="text-2xl font-bold text-purple-800"><?= htmlspecialchars($member['username'] ?? '') ?></h2>
                </div>

                <h3 class="text-xl font-semibold mb-4 text-purple-700">My Requests Status</h3>

                <!-- Request Status Table -->
                <div class="overflow-x-auto rounded-lg border border-purple-200 shadow-sm">
                    <table class="min-w-full divide-y divide-purple-200">
                        <thead class="bg-purple-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-purple-800">Agent Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-purple-800">Sent Message</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-purple-800">Status</th>
                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-purple-100">
                            <?php if (!empty($requests)): ?>
                                <?php foreach ($requests as $request): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-800 font-medium"><?= htmlspecialchars($request['agent_username']) ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($request['message']) ?></td>
                                        <td class="px-6 py-4 text-sm">
                                            <?php
                                                $status = $request['status'];
                                                $statusColor = match($status) {
                                                    'accepted' => 'bg-green-100 text-green-700',
                                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                                    'declined' => 'bg-red-100 text-red-700',
                                                    default => 'bg-gray-100 text-gray-700',
                                                };
                                            ?>
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $statusColor ?>">
                                                <?= ucfirst($status) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No agent requests found.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

           <!-- Subscription Status Section -->
            <section id="subscription" class="section bg-orange-50 p-8 rounded-xl shadow-lg max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-orange-800 mb-6"><?= htmlspecialchars($member['username'] ?? 'Member') ?>'s Subscriptions</h2>

                <!-- Active Subscription Info -->
                <?php if (!empty($activeSubscription)): ?>
                    <div class="bg-yellow-100 p-6 rounded-lg shadow-md mb-6">
                        <h3 class="text-xl font-bold mb-2">Active Plan: <?= htmlspecialchars($activeSubscription['plan_name']) ?></h3>
                        <p><strong>Price:</strong> $<?= number_format($activeSubscription['price'], 2) ?></p>
                        <p><strong>Start Date:</strong> <?= htmlspecialchars($activeSubscription['start_date']) ?></p>
                        <p><strong>End Date:</strong> <?= htmlspecialchars($activeSubscription['end_date'] ?? 'Ongoing') ?></p>

                        <form method="POST" action="index.php?page=cancel_subscription_for_member" class="mt-4">
                            <button type="submit" name="subscription_id" value="<?= (int)$activeSubscription['id'] ?>"
                                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md font-semibold"
                                onclick="return confirm('Are you sure you want to cancel this subscription?');">
                                Cancel Subscription
                            </button>
                        </form>
                    </div>
                <?php else: ?>
                    <p class="text-yellow-600 italic mb-6">You currently have no active subscriptions.</p>
                <?php endif; ?>

                <!-- Subscription History -->
                <?php if (!empty($subscriptionHistory)): ?>
                    <h3 class="text-2xl font-semibold mb-3">Subscription History</h3>
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-yellow-200 text-yellow-900">
                            <tr>
                                <th class="py-2 px-4 text-left">Plan</th>
                                <th class="py-2 px-4 text-left">Price</th>
                                <th class="py-2 px-4 text-left">Start Date</th>
                                <th class="py-2 px-4 text-left">End Date</th>
                                <th class="py-2 px-4 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subscriptionHistory as $sub): ?>
                                <tr class="border-b hover:bg-yellow-50">
                                    <td class="py-2 px-4"><?= htmlspecialchars($sub['plan_name']) ?></td>
                                    <td class="py-2 px-4">$<?= number_format($sub['price'], 2) ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($sub['start_date']) ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($sub['end_date'] ?? 'N/A') ?></td>
                                    <td class="py-2 px-4">
                                        <?= $sub['is_active'] 
                                            ? '<span class="text-green-600 font-bold">Active</span>' 
                                            : '<span class="text-gray-600">Inactive</span>' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-gray-600 italic">No subscription history available.</p>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- JavaScript for Section Toggling -->
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }
        showSection('profile');
    </script>

    <!-- Footer -->
    <?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>