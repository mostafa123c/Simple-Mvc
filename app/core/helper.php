<?php

namespace MVC\core;

class helper
{
    public static function redirect($path)
    {
        header("LOCATION: DOMAIN_NAME" . $path);
    }
}