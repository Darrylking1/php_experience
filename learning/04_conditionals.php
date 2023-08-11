<?php
//=== Identical to
//!== not identical to 
/*if Statement Syntax
 if (condition) {
    //code to be executed if condition is true
 }
*/
$age = 18;
if ($age>= 20){
    echo 'Grow up';
}else {
    echo 'You are still a baby'; 
}

$posts= ['First Post'];
 if (!empty($posts)) {
    echo $posts[0];
 }else{
    echo 'No Posts';
 }

 echo !empty($posts) ? $posts[0] : 'No Posts';
 $firstPost = !empty($posts) ? $posts[0] : 'No Posts';

 echo $firstPost;

