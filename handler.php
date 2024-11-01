<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <title>Welcome Page</title>
</head>

<body>
  <?php
  define("LARGE_PRICE", 6.00);
  define("EXTRA_LARGE_PRICE", 10.00);
  define("HST_RATE", 0.13);

  // Topping Prices
  $TOPPING_PRICES = array(
    1 => 1.00,
    2 => 1.75,
    3 => 2.50,
    4 => 3.35
  );
  $size = $_POST['size'];
  $toppings = (int) $_POST['toppings'];

  // Function to calculate cost
  function calculate_cost($size, $toppings)
  {
    global $TOPPING_PRICES;
    if ($size == "large") {
      $base_price = LARGE_PRICE;
    } elseif ($size == "extra large") {
      $base_price = EXTRA_LARGE_PRICE;
    } else {
      echo "Invalid size entered.<br>";
      return;
    }

    // Determine topping price
    if (array_key_exists($toppings, $TOPPING_PRICES)) {
      $topping_price = $TOPPING_PRICES[$toppings];
    } else {
      echo "Invalid number of toppings entered.<br>";
      return;
    }

    // Calculate costs
    $subtotal = $base_price + $topping_price;
    $tax = $subtotal * HST_RATE;
    $total = $subtotal + $tax;

    // Display the costs
    echo "<div class='mdl-card mdl-shadow--4dp result-card'>";
    echo "<div class='mdl-card__title'><h2 class='mdl-card__title-text'>Order Summary</h2></div>";
    echo "<div class='mdl-card__supporting-text'>";
    echo "Subtotal: $" . number_format($subtotal, 2) . "<br>";
    echo "Tax (HST 13%): $" . number_format($tax, 2) . "<br>";
    echo "Total Cost: $" . number_format($total, 2) . "<br>";
    echo "</div>";
    echo "</div>";
  }

  // Start HTML with MDL styling
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order Summary</title>
    <!-- MDL CSS -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- MDL JavaScript -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <style>
      .center-content {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
      }

      .result-card {
        margin-top: 20px;
      }
    </style>
  </head>

  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Pizza Order Summary</span>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="center-content">
          <?php calculate_cost($size, $toppings); ?>
        </div>
      </main>
    </div>
  </body>

  </html>
