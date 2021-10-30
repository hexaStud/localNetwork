<?php

# region lib

if (!file_exists(__DIR__ . "/href/manager.php")) {
    file_put_contents(__DIR__ . "/href/manager.php", file_get_contents("https://raw.githubusercontent.com/hexaStud/PHPLibManager/master/manager.php"));
}

include __DIR__ . "/href/manager.php";

use HexaStudio\Libary\Manager\Lib;

Lib::init(__DIR__ . "/lib");
$lib = Lib::checkLib("hexaStud/PhpBaseCollection", __DIR__ . "/lib");
if ($lib) {
    if ($lib->updateExists()) {
        $lib->update();
    }
}

# endregion


function load($path)
{
    $dirs = scandir($path);
    foreach ($dirs as $dir) {
        if ($dir === "." || $dir === "..") {
            continue;
        }

        if (is_file($path . "/" . $dir)) {
            if (mime_content_type($path . "/" . $dir) === "text/x-php") {
                include $path . "/" . $dir;
            }
        } else if (is_dir($path . "/" . $dir)) {
            load($path . "/" . $dir);
        }
    }
}

load(__DIR__ . "/lib");
load(__DIR__. "/src");