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
        public function addCredit(float $amount) {
            $newBalance = $this->_balance += $amount;
            echo $amount . " " . $this->getCurrency() . " ont été crédité sur le compte \"" . $this->getLabel() ."\". Nouveau solde: " . $this->getBalance() . " " . $this->getCurrency();
            return $this->setBalance($newBalance);
        }
        public function withdraw(float $amount) {
            $newBalance = $this->_balance -= $amount;
            echo $amount . " " . $this->getCurrency() . " ont été débité sur le compte \"" . $this->getLabel() ."\". Nouveau solde: " . $this->getBalance() . " " . $this->getCurrency();
            return $this->setBalance($newBalance);
        }

        public function printOwnerFullname(): string {
            return $this->_owner->getFirstName() . " " . $this->_owner->getLastName();
        }

        public function __toString() {
            return "<span style='text-decoration:underline;'>Infos Account:</span><br>Intitulé: " . $this->getLabel() . "<br>Solde initial: " . $this->getBalance() . "<br>Devise: " . $this->getCurrency() . "<br>Titulaire: " . $this->printOwnerFullname();
        }

    }






?>