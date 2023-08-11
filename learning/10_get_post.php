<?php
/*---$__GET and $_POST Superglobals --*/

/* 
 We can pass data through urls and forms using the $_GET 
 and $_post superglobals
 */
echo $_GET['name'];
 ?>

 <a href="<?php echo $_SERVER['PHP_SELF']; ?> ?name=Brad">CLICK</a>