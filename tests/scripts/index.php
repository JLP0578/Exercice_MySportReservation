<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="cache-control" content="no-cache">
        <title>QUnit Script Test</title>
        <!-- STYLES -->
        <link rel="stylesheet" href="../../assets/styles/reset.css">
        <link rel="stylesheet" href="../../assets/styles/test_style_edit.css">
        <link rel="stylesheet" href="../../assets/styles/test_style.css">

        <!-- QUnit (Style, Script) -->
        <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.19.4.css">
        <script src="https://code.jquery.com/qunit/qunit-2.19.4.js"></script>
    </head>
    <body>
        <h1 id="qunit-header">QUnit Script Test</h1>
        <h2 id="qunit-banner"></h2>
        <div id="qunit-testrunner-toolbar">
        </div>
        <h2 id="qunit-userAgent"></h2>
        <ol id="qunit-tests">
        </ol>
        <div id="qunit-fixture">
            <div id="container"></div>
        </div>
        
        <!-- SCRIPTS -->
        <?php
        foreach (glob("../../assets/scripts/*.js") as $filename)
        {
            echo "<script src='".$filename."'></script>";
        }
        ?>
        <!-- SCRIPTS TEST -->
        <?php
        foreach (glob("./*.test.js") as $filename)
        {
            echo "<script src='".$filename."'></script>";
        }
        ?>
    </body>
</html>