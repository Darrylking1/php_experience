<?php 
/* For Loop Syntax 
for (initialize; condition; increment) {
    code to be executed 
}

for ($x=0; $x<= 10; $x++) {
    echo 'Number' . $x . '<br>';
}

$y= 15;
while( $y<= 20){
    echo 'Number'. $y . '<br>';
    $y++;
}
do while
 */
$posts= ['First Post', 'Second Post', 'Third Post'];
//For each loop
foreach($posts as $items) {
    echo $items. '<br>';
}

foreach($posts as $index => $items) {
    echo $index . $items;
}
  
