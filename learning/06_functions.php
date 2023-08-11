<?php 
 function registerUser() {
    echo 'User registered';
     global $y;
     echo $y;

 }
 $y = 10; 

 registerUser();

 function registerPerson($Person) {
    echo $Person. 'registered';
 }
 registerPerson('John');

 function sum($n1,$n2){
    return $n1+$n2;
 }
 $number=sum(4,5);
 echo $number;
//Anonymous functions
 $subtract = function($n1, $n2){
    return $n1-$n2;
 };
 echo $subtract(10,5);
//Arrow functions
 $multiply = fn($n1, $n2) => $n1*$n2;
 echo $multiply(9,9);



