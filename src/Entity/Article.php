<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
        /**
         * @ORM\Column(type="text", length=100)
         */

        private $Employee_First_Name;

        /**
         * @ORM\Column(type="text", length=100)
         */

         private $Employee_Last_Name;

         /**
         * @ORM\Column(type="integer", length=8)
         */
        private $Employee_Born_Date;
         /**
         * @ORM\Column(type="integer", length=9)
         */
        private $Employee_Phone_Number;

         /**
         * @ORM\Column(type="text", length=100)
         */

        private $Employee_Email;

        //RelationShip

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Car",inversedBy="Article")
         */
        private $Car;
        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Phone",inversedBy="Article")
         */
        private $Phone;
        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Computer",inversedBy="Article")
         */
        private $Computer;
         //Getters & Setters
         
         public function getId()
        {
         return $this->id;
        }

        public function getEmployeeFirstName()
        {
            return $this->Employee_First_Name;
        }
        public function setEmployeeFirstName($Employee_First_Name)
        {
            $this->Employee_First_Name = $Employee_First_Name;
        }

        public function getEmployeeLastName()
        {
            return $this->Employee_Last_Name;
        }
        public function setEmployeeLastName($Employee_Last_Name)
        {
            $this->Employee_Last_Name = $Employee_Last_Name;
        }

        public function getEmployeeBornDate()
        {
            return $this->Employee_Born_Date;
        }
        public function setEmployeeBornDate($Employee_Born_Date)
        {
            $this->Employee_Born_Date = $Employee_Born_Date;
        }

        public function getEmployeePhoneNumber()
        {
            return $this->Employee_Phone_Number;
        }
        public function setEmployeePhoneNumber($Employee_Phone_Number)
        {
            $this->Employee_Phone_Number = $Employee_Phone_Number;
        }

        public function getEmployeeEmail()
        {
            return $this->Employee_Email;
        }
        public function setEmployeeEmail($Employee_Email)
        {
            $this->Employee_Email = $Employee_Email;
        }

        public function getCar(): ?Car
        {
            return $this->Car;
        }

        public function setCar(?Car $Car): self
        {
            $this->Car = $Car;

            return $this;
        }

        public function getPhone(): ?Phone
        {
            return $this->Phone;
        }

        public function setPhone(?Phone $Phone): self
        {
            $this->Phone = $Phone;

            return $this;
        }

        public function getComputer(): ?Computer
        {
            return $this->Computer;
        }

        public function setComputer(?Computer $Computer): self
        {
            $this->Computer = $Computer;

            return $this;
        }

      
        
}
