<?php

    require "Account.php";
    require "Owner.php";

    echo "<style>
        .debit {
            font-weight: bold;
            color: red;
        }
        .credit {
            font-weight: bold;
            color: green;
        }
        .solde {
            font-weight: bold;
            color: #d9aa00;
            text-shadow: 0 0 black;
        }
    </style>";

    $owner1 = new Owner ("Guénolé", "De Montaigu", "19-02-1452", "Constantinople");
    $acc1 = new Account("Livret A", 4200.5, "EUR", $owner1);
    $acc2 = new Account("Compte épargne", 154, "DENIER", $owner1);


    echo "************ Infos bancaires *************";
    echo $owner1;
    echo "<br><br>";
    echo $acc1;
    echo "<br><br>";
    echo $acc2;
    echo "<br><br><br><br>";

    echo "************ Actions bancaires *************";
    echo "<br><br>";
    $acc1->addCredit(140.52, "simple");
    echo "<br><br>";
    $acc1->withdraw(75.02, "simple");
    echo "<br><br>";
    $acc1->moneyTransfer(140.52, $acc2);
