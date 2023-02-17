<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Calculate Average Stock Price</title>
    <style>
	body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f7f7f7;
    }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="number"] {
        padding: 5px;
        font-size: 16px;
      }
      button[type="submit"] {
        padding: 5px 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      button[type="submit"]:hover {
        background-color: #3e8e41;
      }
      .result {
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
  <div class="insertcart-stock-price">
    <h1>Calculate Average Stock Price</h1>
    <form method="post">
  <table>
  <tr>
  <th></th>
  <th>Enter Quantity</th>
  <th></th>
  <th>Enter Price</th>
  </tr>
    <?php for($i = 1; $i <= 10; $i++) { ?>
      <tr>
        <td>
          <label for="quantity-<?php echo $i; ?>">
            <?php echo $i; ?>:
          </label>
        </td>
        <td>
          <input id="quantity-<?php echo $i; ?>" type="number" name="quantity[]" min="1">
        </td>
        <td>
          <label for="price-<?php echo $i; ?>">
           <?php echo $i; ?>:
          </label>
        </td>
        <td>
          <input id="price-<?php echo $i; ?>" type="number" name="price[]" min="0.01" step="0.01">
        </td>
      </tr>
    <?php } ?>
  </table>
  <button type="submit">Calculate</button>
</form>
    <?php
      if(isset($_POST['quantity']) && isset($_POST['price'])) {
        $quantity_array = $_POST['quantity'];
        $price_array = $_POST['price'];
        $total_value = 0;
        $total_quantity = 0;
        for($i = 0; $i < count($quantity_array); $i++) {
          $quantity = intval($quantity_array[$i]);
          $price = floatval($price_array[$i]);
          $total_value += $quantity * $price;
          $total_quantity += $quantity;
        }
        $average_price = $total_value / $total_quantity;
        echo "<div class='result-quantity'>The average price of the stock is " . number_format($total_quantity, 2) . "</div>";
        echo "<div class='result'>The average price of the stock is " . number_format($average_price, 2) . "</div>";
      }
    ?>
	</div>
  </body>
</html>
