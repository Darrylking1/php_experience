<?php
/*
$x= [1,2,3,4,5];
$chunk_array=array_chunk($x,1);
print_r($chunk_array);
*/

function getTransactionSumsByDayOfWeek($transactions) {
    $daysOfWeek = array(
        "sunday" => 0 ,
        "monday" => 1,
        "tuesday" => 2,
        "wednesday" => 3,
        "thursday" => 4,
        "friday" => 5,
        "saturday" => 6,
    );

    $dayOfWeekSums = array(
        "sunday" => 0,
        "monday" => 0,
        "tuesday" => 0,
        "wednesday" => 0,
        "thursday" => 0,
        "friday" => 0,
        "saturday" => 0,
    );

    foreach ($transactions as $index => $transactionsCount) {
        $dayOfWeek = date('l', strtotime("June " . ($index + 1) . ", 2023")); // Assuming the year is 2023
        
        $dayOfWeek = strtolower($dayOfWeek);
        $dayOfWeekSums[$dayOfWeek] += $transactionsCount;
    }

    return $dayOfWeekSums;
}

// Example usage:
$transactions = [834, 1012, 83, 121, 343, 57, 83, 902, 45, 232, 12, 575, 883, 231, 41, 100, 1000, 343, 1211, 35, 788, 996, 323, 12, 57, 721, 89, 234, 778, 144];
$result = getTransactionSumsByDayOfWeek($transactions);
print_r($result);