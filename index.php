<?php

    require "Account.php";
    require "Owner.php";

    $owner1 = new Owner ("Guénolé", "De Montaigu", "19-02-1452", "Constantinople");
    $acc1 = new Account("Livret A", 4200.5, "EUR", $owner1);
    $acc2 = new Account("Compte épargne", 154, "DENIER", $owner1);

    // $owner1->setAccountList([$acc1, $acc2]);

    echo $owner1;
    echo "<br><br>";
    echo $acc1;
    echo "<br><br>";
    echo $acc2;
    echo "<br><br>";
    $acc1->addCredit(140.52);
    echo "<br><br>";
    $acc1->withdraw(75.02);
