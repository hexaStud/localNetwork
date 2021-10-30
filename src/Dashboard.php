<?php

namespace HexaStudio\LocalNetwork;

use HexaStudio\Library\Net\HTMLElement;

abstract class Dashboard extends Base
{
    public static array $css = array();
    public static array $js = array();

    protected function addStylesheet(string $src): void
    {
        if (!in_array($src, Dashboard::$css)) {
            array_push(Dashboard::$css, $src);
        }
    }

    protected function addJSFile(string $src): void
    {
        if (!in_array($src, Dashboard::$js)) {
            array_push(Dashboard::$js, $src);
        }
    }

    abstract function render(): HTMLElement;
}
