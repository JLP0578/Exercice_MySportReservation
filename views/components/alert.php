<?php
if(isset($_GET["errorType"]) && isset($_GET["errorNum"])){
    require_once PROJECT_PATH.'/includes/langages/fr/errors.php';
    $error_type = htmlspecialchars($_GET["errorType"]);
    $error_num = htmlspecialchars($_GET["errorNum"]);

    if(isset($errors[$error_type]) && isset($errors[$error_type][$error_num])) {
        $error = $errors[$error_type][$error_num];
        $error_title = $error["title"];
        $error_desc = $error["desc"];
    ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"><?php echo $error_title ?> </h4>
            <p><?php echo $error_desc ?> </p>
        </div>
    <?php
    }
}

if(isset($_SESSION['connected']) && isset($_SESSION['current_user']) && isset($_GET["validType"])) {
    require_once PROJECT_PATH.'/includes/langages/fr/valids.php';
    $valid_type = htmlspecialchars($_GET["validType"]);

    if(isset($valids[$valid_type])) {
        $valid = $valids[$valid_type];
        $valid_title = $valid["title"];
        $valid_desc = $valid["desc"];
    ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><?php echo $valid_title ?> </h4>
            <p><?php echo $valid_desc ?> </p>
        </div>
    <?php
    
    }
}