<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['logout_submit']) && isset($_SESSION['connected'])) {
        session_destroy();
        redirection("index.php");
        d($_SESSION);
    }
}

if(isset($_SESSION['connected']) &&  $_SESSION['connected'] == true) {
?>
<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" class="d-flex flex-column flex-wrap justify-content-between">
        <div class="input-group input-group-sm mb-2">
            <button type="submit" name="logout_submit" class="form-control btn btn-primary">Se déconnecter</button>
        </div>
    </form>
</div>
<?php
}
?>