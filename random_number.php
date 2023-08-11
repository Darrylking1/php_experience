
<!DOCTYPE html>
<html>
<head>
    <title>Lotto Number Generator</title>
</head>
<body>
    <!-- <h1 style="text-align: center;">Lotto Number Generator</h1> -->
    <!-- <form style="text-align: center;">
        <button>Generate Lotto Numbers</button>
    </form> -->
    <?php
    function generateRandomNumbers($count) {
        $randomNumbers = array();
        for ($i = 0; $i < $count; $i++) {
            $randomNumber = rand(1, 99);
            $formattedNumber = str_pad($randomNumber, 2, '0', STR_PAD_RIGHT);
            $randomNumbers[] = $formattedNumber;
        }
        return $randomNumbers;
    }

    $generatedNumbers = generateRandomNumbers(5);
    echo '<h2 style="text-align: center;">Generated Lotto Numbers:</h2>';
    echo '<ul style="list-style: none; padding: 0; text-align: center;">';
    foreach ($generatedNumbers as $number) {
        echo '<li>' . $number . '</li>';
    }
    echo '</ul>';
    ?>
</body>
</html>
