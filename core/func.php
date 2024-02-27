<?php

function abort($code = 404)
{
    http_response_code($code);
    require ERRORS  . "/{$code}.tpl.php";
    die;
}