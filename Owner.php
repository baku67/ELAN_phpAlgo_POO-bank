<?php

    class Owner {

        // Propriétés
        private string $_firstName;
        private string $_lastName;
        private DateTime $_birthDate;
        private string $_city;
        private array $_accountList;

        // Constructeur
        public function __construct(string $firstName, string $lastName, string $birthDate, string $city) {
            $this->_firstName = $firstName;
            $this->_lastName = $lastName;
            $this->_birthDate = new DateTime ($birthDate);
            $this->_city = $city;
            $this->_accountList = [];
        }

        // Accesseurs
        /**
         * Get the value of _firstName
         */
        public function getFirstName(): string
        {
                return $this->_firstName;
        }

        /**
         * Set the value of _firstName
         */
        public function setFirstName(string $_firstName): self
        {
                $this->_firstName = $_firstName;
                return $this;
        }

        /**
         * Get the value of _lastName
         */
        public function getLastName(): string
        {
                return $this->_lastName;
        }

        /**
         * Set the value of _lastName
         */
        public function setLastName(string $_lastName): self
        {
                $this->_lastName = $_lastName;
                return $this;
        }

        /**
         * Get the value of _birthDate
         */
        public function getBirthDate()
        {
                return $this->_birthDate;
        }

        /**
         * Set the value of _birthDate
         */
        public function setBirthDate(date $_birthDate): self
        {
                $this->_birthDate = $_birthDate;
                return $this;
        }

        /**
         * Get the value of _city
         */
        public function getCity(): string
        {
                return $this->_city;
        }

        /**
         * Set the value of _city
         */
        public function setCity(string $_city): self
        {
                $this->_city = $_city;
                return $this;
        }

        
        /**
         * Set the value of _accountList
         */
        public function setAccountList(array $_accountList): self
        {
                $this->_accountList = $_accountList;
                return $this;
        }

        /**
         * Get the value of _accountList
         */
        public function getAccountList(): array
        {
                return $this->_accountList;
        }


        // Méthodes
        // Méthode appelée dans le constructeur du Account (à chaque création de compte, le compte est ajouté à la liste des comptes de l'Owner)
        public function addAccount($account) {
            $this->_accountList[] = $account;
        }

        public function getAge() {
            $todayDate = new DateTime();
            $age = $this->getBirthDate()->diff($todayDate);

            // return $age->format('%Y ans %m mois et %d jours');
            return $age->format('%Y');
        }

        public function printAccountListLabel()
        {
                $accountList = $this->getAccountList();
                $accountLabelList;
                // var_dump($accountList);die;
                foreach($accountList as $account) {
                    // echo $account-> getLabel().",  ";
                    $accountLabelList[] = $account->getLabel();
                }

                return $accountLabelList;
        }

        public function __toString() {
            return "<br><span style='text-decoration:underline;'><br>Infos Owner:</span><br>Prénom: " . $this->getFirstName() . "<br>Nom: " . $this->getLastName() . "<br>Date de naissance: " . $this->getBirthDate()->format("d-m-Y") . " (" . $this->getAge() . " ans)<br>Ville: " . $this->getCity() . "<br>Liste de comptes: " . implode(", ", $this->printAccountListLabel());
        }
    }