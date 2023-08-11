 <?php
 $string  = 'Hello World';
 //Get the length of a string
 echo strlen($string);

 //Find the position of the first occurence of a substring in a string
 echo strpos($string, "o");

 //Find the position of the last occurence of a substring 
  // in a string 
 echo strrpos($string, 'o');
 echo '<br>';

 //Reverse a string 
 echo strrev($string,);

 echo '<br>';
 //Convert to lowercase 
 echo strtolower($string);

 //Convert to uppercase
 echo strtoupper($string);

 //Uppercase the first character of each word
 echo ucwords($string);
 echo '<br>';
 //String replace 
 echo str_replace('World', 'Everyone', $string);
 echo '<br>';
//  Return portion of a string specfied by the offset and length
 echo substr($string, 0, 3);
 echo '<br>';
 echo substr($string, 7);

 //Starts with 
 if (str_starts_with($string, 'Hel')){
    echo '<br> YES <br>' ;
 }

 //Ends with 
 if (str_ends_with($string, "ld ")){
    echo 'YES <br>';
 }

$string2 = '<script>alert(1)</script>';
echo htmlspecialchars($string2);

printf('%s likes to %s', 'Brad', 'code');
printf('1+1=%d',1+1);
