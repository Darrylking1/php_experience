
<!DOCTYPE html>
<html>
<head>
    <title>Lotto Number Generator</title>
</head>
<body style="color: white; background:green;">
    <h1 style="text-align: center;">Lotto Number Generator</h1>
    <form style="text-align: center;" method="POST">
        <button>Generate Lotto Numbers</button>
    </form>
    <?php
    function generateRandomNumbers($count) {
        $randomNumbers = array();
        for ($i = 0; $i < $count; $i++) {
            $randomNumber = rand(1, 99);
            if(in_array($randomNumber, $randomNumbers)){
                continue;
            }
            $randomNumbers[] = $randomNumber;
        }
        return $randomNumbers;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $generatedNumbers = generateRandomNumbers(5);
        echo '<h2 style="text-align: center;">Generated Lotto Numbers:</h2>';
        echo '<div style="list-style: none; padding: 0; text-align: center; display: flex; justify-content: center;">';
        foreach ($generatedNumbers as $number) {
            echo '<div style="border-width:1; border-style: solid; border-radius:100%; border-color:white; padding: 8px; margin: 8px">' . $number . '</div>';
        }
        echo '</div>';
    }
    ?>

    <h2 style="text-align:center; padding:16px;">ZLA *271#</h2>
</body>
</html>
