<?php

namespace HexaStudio\LocalNetwork\Extension;

use HexaStudio\Library\IO\Path;
use HexaStudio\Library\Net\HTMLSingleElement;
use HexaStudio\Library\Net\HTMLTextNode;
use HexaStudio\LocalNetwork\Extension;
use HexaStudio\LocalNetwork\Dashboard;
use HexaStudio\Library\Net\HTMLElement;

class Watcher extends Extension
{
    public function __construct()
    {
        $this->renderDashboard(new WatcherDashboard());
    }
}

class WatcherDashboard extends Dashboard
{
    public function __construct()
    {
        $this->addStylesheet($this->convertPath("style/Watcher.css", __DIR__));
    }

    function render(): HTMLElement
    {
        $root = new HTMLElement("div");
        $root->setAttribute("class", "Watcher");

        $h3 = new HTMLElement("h3");
        $h3->appendChild(new HTMLTextNode("Watcher"));
        $h3->setAttribute("class", "margin-0");
        $root->appendChild($h3);

        return $root;
    }
}

Extension::add(new Watcher());