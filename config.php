<?php

if(file_exists(dirname(__FILE__).'/maConfigPerso.php'))
{
    require (dirname(__FILE__).'/maConfigPerso.php');
} else {
    require (dirname(__FILE__) . '/maConfigPerso.php');
}