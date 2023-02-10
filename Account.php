<?php

    class Account {

        // Propriétés
        private string $_label;
        private float $balance;
        private string $_currency;
        private Owner $_owner;

        // Constructeur
        public function __construct(string $label, float $initialBalance, string $currency, Owner $owner) {
            $this->_label = $label;
            $this->_balance = $initialBalance;
            $this->_currency = $currency;
            $this->_owner = $owner;
            $this->_owner->addAccount($this);
        }

        // Accesseurs
        public function getLabel(): string {
            return $this->_label;
        }
        public function getBalance(): float {
            return $this->_balance;
        }
        public function getCurrency(): string {
            return $this->_currency;
        }
        public function getOwner(): string {
            return $this->_owner;
        }

        // Mutateurs
        public function setLabel(string $label) {
            $this->_label = $label;
        }
        public function setBalance(float $balance) {
            $this->_balance = $balance;
        }
        public function setCurrency(string $currency) {
            $this->_currency = $currency;
        }
        public function setOwner(string $owner) {
            $this->_owner = $owner;
        }

        // Méthodes
        public function addCredit(float $amount, string $action) {
            $newBalance = $this->_balance += $amount;
            if ($action == "simple") {
                echo "<span style='color:grey; font-size:80%;'>" . date("Y-m-d H:i:s") . ":</span> <span class='credit'>" . $amount . "</span> " . $this->getCurrency() . " ont été crédité sur le compte \"" . $this->getLabel() ."\". Nouveau solde: <span class='solde'>" . $this->getBalance() . "</span> " . $this->getCurrency() . ".<br>";
            }
            return $this->setBalance($newBalance);
        }
        public function withdraw(float $amount, string $action) {
            $newBalance = $this->_balance -= $amount;
            if ($action == "simple") {
                echo "<span style='color:grey; font-size:80%;'>" . date("Y-m-d H:i:s") . ":</span> <span class='debit'>" . $amount . "</span> " . $this->getCurrency() . " ont été débité sur le compte \"" . $this->getLabel() ."\". Nouveau solde: <span class='solde'>" . $this->getBalance() . "</span> " . $this->getCurrency() . ".<br>";
            }
            return $this->setBalance($newBalance);
        }

        public function moneyTransfer($amount, $receptAccount) {
            $this->withdraw($amount, "transfer");
            $receptAccount->addCredit($amount, "transfer");
            echo "<span style='color:grey; font-size:80%;'>" . date("Y-m-d H:i:s") . ":</span> <span class='debit'>" . $amount . "</span> " . $this->getCurrency() . " ont été transféré du compte \"" . $this->getLabel() . "\" au compte \"" . $receptAccount->getLabel() . "\".<br>";
            echo "Nouveau solde \"" . $this->getLabel() . "\": <span class='solde'>" . $this->getBalance() . "</span>,<br>Nouveau solde \"" . $receptAccount->getLabel() . "\": <span class='solde'>" . $receptAccount->getBalance() . "</span>.";
        }

        public function printOwnerFullname(): string {
            return $this->_owner->getFirstName() . " " . $this->_owner->getLastName();
        }

        public function __toString() {
            return "<span style='text-decoration:underline;'>Infos Account:</span><br>Intitulé: " . $this->getLabel() . "<br>Solde initial: <span class='solde'>" . $this->getBalance() . "</span><br>Devise: " . $this->getCurrency() . "<br>Titulaire: " . $this->printOwnerFullname();
        }

    }






?>