<?php

namespace Twitter;
require_once "../bootstrap.php";
?>


<?php
use Twitter\Model\Verification\UserVerify;
use Twitter\Views\BaseRenderer;
session_start();
UserVerify::verifyCookie();
$renderer = new BaseRenderer();
$renderer->render();








