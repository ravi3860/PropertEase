<!DOCTYPE html>
<html lang="en">
<?php
    define('BASE_URL', '/PropertEase');   
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PropertEase – Agent Dashboard</title>

    <!-- Tailwind CSS -->
    <link href="<?= BASE_URL ?>/public/styles.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
</head>

<body
  class="bg-gradient-to-b from-yellow-50 to-yellow-200 min-h-screen flex flex-col font-[Poppins]"
>
  <!-- Header -->
  <?php include_once __DIR__ . '/../view/include/header.php'; ?>

  <div class="flex flex-1 min-h-screen">
    <!-- Sidebar -->
    <aside
      class="w-72 bg-white border-r border-yellow-300 p-8 space-y-6 shadow-lg sticky top-0 h-screen"
    >
      <h2
        class="text-2xl font-extrabold text-yellow-700 mb-8 tracking-wide uppercase"
      >
        Agent Menu
      </h2>
      <button
        onclick="showSection('profile')"
        class="w-full py-3 rounded-xl bg-yellow-500 text-white font-semibold shadow-md hover:bg-yellow-600 transition flex items-center justify-center gap-2"
      >
        <i class="fas fa-user-circle"></i> My Profile
      </button>
      <button
        onclick="showSection('client-requests')"
        class="w-full py-3 rounded-xl bg-yellow-500 text-white font-semibold shadow-md hover:bg-yellow-600 transition flex items-center justify-center gap-2"
      >
        <i class="fas fa-users"></i> Client Requests
      </button>
      <button
        onclick="showSection('subscriptions')"
        class="w-full py-3 rounded-xl bg-yellow-500 text-white font-semibold shadow-md hover:bg-yellow-600 transition flex items-center justify-center gap-2"
      >
        <i class="fas fa-bell"></i> My Subscriptions
      </button>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 overflow-y-auto bg-white rounded-tl-3xl rounded-bl-3xl shadow-xl">
      <h1 class="text-4xl font-extrabold text-yellow-800 mb-10">
        Welcome back, Agent
        <span class="text-yellow-600">
          <?= htmlspecialchars($agent['username'] ?? '') ?>
        </span>
        !
      </h1>

      <!-- PROFILE -->
      <section id="profile">
        <div class="flex items-center gap-6 mb-12">
          <div class="w-16 h-16 bg-yellow-700 rounded-full mr-4 flex items-center justify-center text-white font-bold text-xl uppercase shadow"><?= htmlspecialchars(substr($agent['username'] ?? '', 0, 1)) ?></div>
          <h2 class="text-3xl font-bold text-yellow-700 tracking-wide">
            Profile Details
          </h2>
        </div>

        <form
          method="POST"
          action="<?= BASE_URL ?>/public/index.php?page=updateagent"
          class="space-y-8 max-w-4xl"
        >
          <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($agent['id'] ?? '') ?>"
          />

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Username -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >Username</label
              >
              <input
                name="username"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
                value="<?= htmlspecialchars($agent['username'] ?? '') ?>"
              />
            </div>

            <!-- Password -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >Password</label
              >
              <input
                type="password"
                name="password"
                placeholder="New Password"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
              />
            </div>

            <!-- Email -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >Email</label
              >
              <input
                type="email"
                name="email"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
                value="<?= htmlspecialchars($agent['email'] ?? '') ?>"
              />
            </div>

            <!-- License -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >License Number</label
              >
              <input
                type="text"
                name="license_number"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
                value="<?= htmlspecialchars($agent['license_number'] ?? '') ?>"
              />
            </div>

            <!-- Agency -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >Agency Name</label
              >
              <input
                type="text"
                name="agency_name"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
                value="<?= htmlspecialchars($agent['agency_name'] ?? '') ?>"
              />
            </div>

            <!-- Phone -->
            <div
              class="bg-yellow-50 p-6 rounded-2xl shadow-inner border border-yellow-300"
            >
              <label
                class="block text-sm font-semibold text-yellow-700 mb-2"
                >Phone Number</label
              >
              <input
                type="phone"
                name="phone"
                class="w-full px-5 py-3 border border-yellow-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium"
                value="<?= htmlspecialchars($agent['phone'] ?? '') ?>"
              />
            </div>
          </div>

          <button
            type="submit"
            name="action"
            value="update"
            class="w-full py-3 rounded-3xl bg-yellow-600 hover:bg-yellow-700 transition text-white font-extrabold text-lg shadow-lg"
          >
            Update Profile
          </button>
        </form>

        <form method="POST" action="<?= BASE_URL ?>/public/index.php?page=logout" class="mt-8 max-w-4xl">
          <button
            type="submit"
            name="action"
            value="logout"
            class="w-full py-3 rounded-3xl bg-red-500 hover:bg-red-600 transition text-white font-semibold shadow-md"
          >
            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
          </button>
        </form>

        <form
          method="POST"
          action="<?= BASE_URL ?>/public/index.php?page=delete_agent"
          onsubmit="return confirm('Delete account permanently?');"
          class="mt-4 max-w-4xl"
        >
          <button
            type="submit"
            name="action"
            value="delete"
            class="w-full py-3 rounded-3xl bg-red-600 hover:bg-red-700 transition text-white font-semibold shadow-md"
          >
            <i class="fas fa-trash-alt mr-2"></i> Delete Account
          </button>
        </form>
      </section>

      <!-- CLIENT REQUESTS -->
      <section id="client-requests" class="hidden">
        <h2 class="text-3xl font-extrabold text-yellow-700 mb-8 tracking-wide">
          Client Requests
        </h2>

        <?php if (!empty($requests)) : ?>
        <div class="overflow-x-auto rounded-lg shadow-md border border-yellow-300">
          <table class="min-w-full bg-yellow-50 rounded-lg">
            <thead class="bg-yellow-500 text-white uppercase tracking-wide">
              <tr>
                <th class="py-4 px-6 text-left font-semibold">Member</th>
                <th class="py-4 px-6 text-left font-semibold">Contact</th>
                <th class="py-4 px-6 text-left font-semibold">Message</th>
                <th class="py-4 px-6 text-center font-semibold">Status</th>
                <th class="py-4 px-6 text-center font-semibold">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($requests as $r): ?>
              <tr class="border-b border-yellow-300 hover:bg-yellow-100 transition">
                <td class="py-4 px-6 font-medium text-yellow-800">
                  <?= htmlspecialchars($r['name']) ?>
                </td>
                <td class="py-4 px-6 text-yellow-700">
                  <?= htmlspecialchars($r['contact_number']) ?>
                </td>
                <td class="py-4 px-6 text-yellow-700 max-w-xs truncate" title="<?= htmlspecialchars($r['message']) ?>">
                  <?= htmlspecialchars($r['message']) ?>
                </td>

                <td class="py-4 px-6 text-center font-semibold">
                  <?php if ($r['status'] === 'pending'): ?>
                  <span
                    class="inline-block px-3 py-1 rounded-full bg-yellow-300 text-yellow-800"
                    >Pending</span
                  >
                  <?php elseif ($r['status'] === 'accepted'): ?>
                  <span
                    class="inline-block px-3 py-1 rounded-full bg-green-300 text-green-800"
                    >Accepted</span
                  >
                  <?php else: ?>
                  <span
                    class="inline-block px-3 py-1 rounded-full bg-red-300 text-red-800"
                    >Declined</span
                  >
                  <?php endif; ?>
                </td>

                <td class="py-4 px-6 text-center space-x-2">
                  <?php if ($r['status'] === 'pending'): ?>
                  <form
                    class="inline"
                    method="POST"
                    action="index.php?page=updaterequeststatus"
                  >
                    <input type="hidden" name="request_id" value="<?= $r['id'] ?>" />
                    <input type="hidden" name="status" value="accepted" />
                    <button
                      type="submit"
                      class="bg-green-600 text-white py-1 px-4 rounded-lg hover:bg-green-700 transition text-sm font-semibold"
                    >
                      Accept
                    </button>
                  </form>

                  <form
                    class="inline"
                    method="POST"
                    action="index.php?page=updaterequeststatus"
                  >
                    <input type="hidden" name="request_id" value="<?= $r['id'] ?>" />
                    <input type="hidden" name="status" value="declined" />
                    <button
                      type="submit"
                      class="bg-red-600 text-white py-1 px-4 rounded-lg hover:bg-red-700 transition text-sm font-semibold"
                    >
                      Decline
                    </button>
                  </form>
                  <?php else: ?>
                  <span class="text-gray-500 italic">No actions available</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php else: ?>
        <p class="text-yellow-700 text-lg italic">No pending or active requests for you right now.</p>
        <?php endif; ?>
      </section>

      <!-- My Subscriptions --> 
      <section id="subscriptions" class="block">
        <h2 class="text-3xl font-extrabold text-yellow-700 mb-6 tracking-wide">
          My Subscriptions
        </h2>

        <!-- Active Subscription Info -->
        <?php if (!empty($activeSubscription)): ?>
          <div class="bg-yellow-100 p-6 rounded-lg shadow-md max-w-xl mx-auto mb-6">
            <h3 class="text-xl font-bold mb-2">Active Plan: <?= htmlspecialchars($activeSubscription['plan_name']) ?></h3>
            <p><strong>Price:</strong> $<?= htmlspecialchars($activeSubscription['price']) ?></p>
            <p><strong>Start Date:</strong> <?= htmlspecialchars($activeSubscription['start_date']) ?></p>
            <p><strong>End Date:</strong> <?= htmlspecialchars($activeSubscription['end_date']) ?></p>

            <form method="POST" action="index.php?page=cancel_subscription" class="mt-4">
              <button type="submit" name="subscription_id" value="<?= $activeSubscription['id'] ?>" 
                      class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md font-semibold">
                Cancel Subscription
              </button>
            </form>
          </div>
        <?php else: ?>
          <p class="text-yellow-600 italic">You currently have no active subscriptions.</p>
        <?php endif; ?>

        <!-- Optional: Subscription History -->
        <?php if (!empty($subscriptionHistory)): ?>
          <h3 class="text-2xl font-semibold mb-3 mt-10">Subscription History</h3>
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
                <tr class="border-b">
                  <td class="py-2 px-4"><?= htmlspecialchars($sub['plan_name']) ?></td>
                  <td class="py-2 px-4">$<?= htmlspecialchars($sub['price']) ?></td>
                  <td class="py-2 px-4"><?= htmlspecialchars($sub['start_date']) ?></td>
                  <td class="py-2 px-4"><?= htmlspecialchars($sub['end_date'] ?? 'N/A') ?></td>
                  <td class="py-2 px-4"><?= $sub['is_active'] ? '<span class="text-green-600 font-bold">Active</span>' : 'Inactive' ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </section>
    </main>
  </div>

  <!-- Footer -->
  <?php include_once __DIR__ . '/../view/include/footer.php'; ?>

  <!-- Section toggle script -->
  <script>
    function showSection(id) {
      document.querySelectorAll('main > section').forEach((sec) =>
        sec.classList.add('hidden')
      );
      const target = document.getElementById(id);
      if (target) target.classList.remove('hidden');
    }
    // default view
    showSection('profile');
  </script>
</body>
</html>
