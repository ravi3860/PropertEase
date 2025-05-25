<!DOCTYPE html>
<html lang="en">
<?php
define('BASE_URL', '/PropertEase');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plan_name'], $_POST['price'])) {
    $plan = htmlspecialchars($_POST['plan_name']);
    $price = htmlspecialchars($_POST['price']);
} else {
    // Redirect to plans or subscriptions page if POST data missing
    header("Location: index.php?page=subscriptions");
    exit;
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PropertEase - Complete Your Payment</title>

    <!-- Tailwind CSS -->
    <link href="<?= BASE_URL ?>/public/styles.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-b from-yellow-100 to-yellow-300 min-h-screen flex flex-col">

<!-- Header -->
<?php include_once __DIR__ . '/../view/include/header.php'; ?>

    <section class="min-h-screen flex items-center justify-center bg-gradient-to-r from-yellow-100 to-yellow-200 py-12 px-4">
        <div class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-10">

            <!-- Title -->
            <h2 class="text-3xl font-bold mb-6 text-center" style="font-family: 'Poppins', sans-serif;">
                Complete Your Payment 💳
            </h2>

            <!-- Plan Summary -->
            <div class="bg-yellow-100 rounded-xl p-4 mb-8 text-center">
                <p class="text-lg font-medium text-gray-800 mb-1">Selected Plan:</p>
                <h3 class="text-xl font-bold text-black"><?= $plan ?></h3>
                <p class="text-lg font-semibold text-gray-900 mt-2">$<?= $price ?></p>
            </div>

            <!-- Payment Form -->
            <form method="POST" action="index.php?page=processpayment" class="space-y-6">
                <input type="hidden" name="plan_name" value="<?= $plan ?>" />
                <input type="hidden" name="price" value="<?= $price ?>" />

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input
                        type="text"
                        name="fullname"
                        required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Card Number</label>
                    <input
                        type="text"
                        name="cardnumber"
                        required
                        maxlength="16"
                        pattern="\d{16}"
                        placeholder="1234 5678 9012 3456"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Expiry Date</label>
                        <input
                            type="text"
                            name="expiry"
                            required
                            placeholder="MM/YY"
                            pattern="(0[1-9]|1[0-2])\/\d{2}"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">CVV</label>
                        <input
                            type="password"
                            name="cvv"
                            required
                            maxlength="4"
                            pattern="\d{3,4}"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full bg-black text-white py-3 rounded-md font-semibold hover:bg-gray-800 transition"
                >
                    Pay $<?= $price ?> Now
                </button>
            </form>
        </div>
    </section>

<!-- Footer -->
<?php include_once __DIR__ . '/../view/include/footer.php'; ?>

</body>
</html>
