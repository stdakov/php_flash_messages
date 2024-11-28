<?php

require 'vendor/autoload.php';

session_start();

use Dakov\FM;

$flashKey = "test2";
FM::set($flashKey, "testmessage");
if (FM::exist($flashKey)) {
    echo FM::flash($flashKey);
}



