<?php

namespace HexaStudio\LocalNetwork;

use HexaStudio\Library\IO\Path;

class Base
{
    protected function convertPath(string $p, string $dir): string
    {
        $dir = basename($dir);
        return Path::join("ext", array($dir, $p));
    }
}