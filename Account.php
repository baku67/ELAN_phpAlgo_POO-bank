<?php

    class Account {

        // Propriétés
        private string $_label;
        private int $_initialBalance;
        private string $_currency;
        private Owner $_owner;

        // Constructeur
        public function __construct(string $label, int $initialBalance, string $currency, Owner $owner) {
            $this->_label = $label;
            $this->_initialBalance = $initialBalance;
            $this->_currency = $currency;
            $this->_owner = $owner;
        }

        // Accesseurs
        public function getLabel(): string {
            return $this->_label;
        }
        public function getInitialBalance(): int {
            return $this->_initialBalance;
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
            return "Le label a été mis à jour.<br>";
        }
        public function setInitialBalance(string $initialBalance) {
            $this->_initialBalance = $initialBalance;
        }
        public function setCurrency(string $currency) {
            $this->_currency = $currency;
        }
        public function setOwner(string $owner) {
            $this->_owner = $owner;
        }

        // Méthodes
        public function __toString() {
            return "<span style='text-decoration:underline;'>Infos Account:</span><br>Intitulé: " . $this->getLabel() . "<br>Solde initial: " . $this->getInitialBalance() . "<br>Devise: " . $this->getCurrency() . "<br>Titulaire: " . $this->getOwner();
        }

    }






?>