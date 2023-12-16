<?php

function calculateElectricityBill($units) {
    $totalBill = 0;

    if ($units <= 50) {
        $totalBill = $units * 3.50;
    } elseif ($units <= 150) {
        $totalBill = (50 * 3.50) + (($units - 50) * 4.00);
    } elseif ($units <= 250) {
        $totalBill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
    } else {
        $totalBill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
    }

    return $totalBill;
}

if (isset($_POST['calculate'])) {
    $unitsConsumed = $_POST['units'];
    $billAmount = calculateElectricityBill($unitsConsumed);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .calculate-btn {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .result {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
    </style> -->
    <title>Electricity Bill Calculator</title>
</head>

<body>

    <div class="calculator">
        <h2>Electricity Bill Calculator</h2>

        <form method="post" action="">
            <div class="input-group">
                <label for="units">Enter the number of units:</label>
                <input type="number" name="units" id="units" placeholder="Enter units" required>
            </div>

            <button type="submit" name="calculate" class="calculate-btn">Calculate Bill</button>
        </form>

        <?php if (isset($billAmount)): ?>
        <div class="result">
            Electricity Bill for
            <?php echo $unitsConsumed; ?> units: Rs.
            <?php echo number_format($billAmount, 2); ?>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>