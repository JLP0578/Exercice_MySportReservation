<?php

// SELECT ALL ACCOUNT_ACTIVITIES
$elements = new Account_activities(Connexion::getInstance('lecteur'));
Connexion::close('lecteur');

?> 
<div class="d-flex flex-row flex-wrap justify-content-evenly m-3">
    <?php 
    foreach ($elements->selectAllByAccountType($AccountTypeId) as $key => $value) { 
    ?>
    <div class="card card-hover m-2" style="width: 18rem;height: 10rem;">
        <div class="card-body text-center d-flex flex-column flex-wrap justify-content-between align-items-center">
            <h5 class="card-title"><?php echo $value['activity_name']; ?></h5>
            <p class="card-text"><?php echo $value['description']; ?></p>
            <a href="#" class="btn btn-primary stretched-link" style="width: 5rem;">Voir</a>
        </div>
    </div>
    <?php 
    }
    ?>
</div>



