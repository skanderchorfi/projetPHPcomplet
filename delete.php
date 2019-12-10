<?php
    include 'classes/employe.class.php';
    $employe = new employer;
    $employe->deleteEmployer($_GET['eid']);
    header('Location: index.php?notif=delete');