<?php

namespace HexaStudio\LocalNetwork;

use HexaStudio\Library\IO\Path;

class Extension extends Base
{
    /**
     * @var Dashboard[]
     */
    public static array $dashboard = array();
    public static array $extensions = array();

    protected function renderDashboard(Dashboard $db): void
    {
        array_push(Extension::$dashboard, $db);
    }

    public static function add(Extension $class)
    {
        array_push(Extension::$extensions, $class);
    }

    public static function loadComponents(string $path)
    {
        foreach (scandir($path) as $value) {
            $config = Path::join($path, array($value, "config.ext.php"));
            if (file_exists($config)) {
                include "$config";
            }
        }
    }
}