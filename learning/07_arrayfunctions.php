<?php
$fruits = ['apple','orange','pear','peach'];
//get Length
echo count($fruits);

//Search array
var_dump(in_array('apple',$fruits));

//Add to array 
$fruits[]= 'grape';
array_push($fruits,'blueberry','strawberry',);
array_unshift($fruits, 'mango');

//Remove from array
array_pop($fruits);

//Split into 2 chucks
$chunked_array=array_chunk($fruits,2);
print_r($chunked_array);
//print_r($fruits);

//Merge to arrays
$arr= [1,2,3];
$arr1=[4,5,6];

$arr2 = array_merge($arr,$arr1);
print_r($arr2) ; 

//array_combine
$a= ['green','red', 'yellow'];
$b= ['avacado','pineapple','pear'];
$c = array_combine($a,$b);
print_r($c);

//array flipped
//range: Takes the start and end of the numbers
echo '<br>';
$numbers= range(1,30);
print_r($numbers);
echo '<br>';
echo '<br>';
$chunked_array=array_chunk($fruits,3);
print_r($chunked_array);

//map_array
//