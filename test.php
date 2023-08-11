<?php

    $uuid = uniqid('12',true).microtime(true);
    $uuid = str_replace('.', '', $uuid);
    echo $uuid; 
