<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
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
    private $Car_Make;

    /**
     * @ORM\Column(type="text", length=100)
     */

     private $Car_Model;

     /**
     * @ORM\Column(type="integer", length=9)
     */

    private $Car_Years;


          /**
     * @ORM\Column(type="text", length=100)
     */
    private $Car_Numbers;


    //RelationShip      

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="Car" )
     */
    private $Article;

    public function __construct()
    {
        $this->Article = new ArrayCollection();
    }


    public function __toString()
    {
        return $this->Car_Make;
    }



     //Getters & Setters
     
     public function getId(): ?int
     {
         return $this->id;
     }

    public function getCarMake()
    {
        return $this->Car_Make;
    }
    public function setCarMake($Car_Make)
    {
        $this->Car_Make = $Car_Make;
    }

    public function getCarModel()
    {
        return $this->Car_Model;
    }
    public function setCarModel($Car_Model)
    {
        $this->Car_Model = $Car_Model;
    }

    public function getCarYears()
    {
        return $this->Car_Years;
    }
    public function setCarYears($Car_Years)
    {
        $this->Car_Years = $Car_Years;
    }

    public function getCarNumbers()
    {
        return $this->Car_Numbers;
    }
    public function setCarNumbers($Car_Numbers)
    {
        $this->Car_Numbers = $Car_Numbers;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->Article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->Article->contains($article)) {
            $this->Article[] = $article;
            $article->setCar($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Article->contains($article)) {
            $this->Article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getCar() === $this) {
                $article->setCar(null);
            }
        }

        return $this;
    }
}
