\<?php

   $pages = array(
      'html5' => 'http://validator.w3.org/check?uri=http%3A%2F%2Fcode.svenz.lv%2F;group=1',
      'validate' => 'http://validator.w3.org/check?uri=http%3A%2F%2Fcode.svenz.lv%2F;group=1',
      'ring0' => 'http://zingmars.com/misc/ComplexPath.exe'  
 );

header('Location:'. $pages[$page]);
