<?php
include "loader.php";

use HexaStudio\LocalNetwork\Extension;
use HexaStudio\LocalNetwork\Dashboard;
use HexaStudio\Library\IO\Path;

Extension::loadComponents(Path::join(__DIR__, array("ext")));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LocalNetwork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/classes.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <?php
    $css = array();
    $js = array();

    foreach (Dashboard::$css as $src) {
        if (!in_array($src, $css)) {
            array_push($css, $src);
        }
    }

    foreach (Dashboard::$js as $src) {
        if (!in_array($src, $js)) {
            array_push($js, $src);
        }
    }

    foreach ($css as $item) {
        echo /** @lang HTML */
        "<link rel=\"stylesheet\" href=\"$item\">";
    }

    foreach ($js as $item) {
        echo /** @lang HTML */
        "<script src='$item'></script>";
    }
    ?>
</head>
<body>
<div class="row container-1">
    <div class="col">
        <h1 class="margin-0">Local-Network</h1>
    </div>
</div>
<div class="row container-1">
    <div class="col">
        <div class="row container-2">
            <div class="col margin-s">
                <h2 class="margin-0">Dashboard</h2>
            </div>
        </div>
        <div class="row container-2">
            <div class="col">
                <div class="row">
                    <?php
                    foreach (Extension::$dashboard as $dashboard) {
                        echo <<<EOF
                                <div class="col margin-s container-0 component-box">
                                    {$dashboard->render()->parse()}
                                </div>
                            EOF;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row container-1">
    <div class="col">
        <div class="row container-2">
            <div class="col margin-s">
                <h2 class="margin-0">Components</h2>
            </div>
        </div>
        <div class="row container-2">
            <div class="col margin-s">
                <div class="table-responsive margin-0 padding-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Component 1</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary btn-sm" type="button">open</button>
                                    <button class="btn btn-primary btn-sm" type="button" disabled="disabled">edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" type="button">remove</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Component 2</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary btn-sm" type="button">open</button>
                                    <button class="btn btn-primary btn-sm" type="button">edit</button>
                                    <button class="btn btn-danger btn-sm" type="button">remove</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row container-2">
            <div class="col margin-s">
                <div class="btn-group" role="group">
                    <button class="btn btn-primary" type="button">install</button>
                    <button class="btn btn-danger" type="button">Remove all</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>