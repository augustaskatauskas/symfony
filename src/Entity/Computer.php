<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComputerRepository")
 */
class Computer
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
    private $Computer_Make;

    /**
     * @ORM\Column(type="text", length=100)
     */

     private $Computer_Model;

     /**
     * @ORM\Column(type="integer", length=9)
     */

    private $Computer_Years;

   //RelationShip      

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="Computer" )
     */
    private $Article;

    public function __construct()
    {
        $this->Article = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->Computer_Make;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComputerMake(): ?string
    {
        return $this->Computer_Make;
    }

    public function setComputerMake(string $Computer_Make): self
    {
        $this->Computer_Make = $Computer_Make;

        return $this;
    }

    public function getComputerModel(): ?string
    {
        return $this->Computer_Model;
    }

    public function setComputerModel(string $Computer_Model): self
    {
        $this->Computer_Model = $Computer_Model;

        return $this;
    }

    public function getComputerYears(): ?int
    {
        return $this->Computer_Years;
    }

    public function setComputerYears(int $Computer_Years): self
    {
        $this->Computer_Years = $Computer_Years;

        return $this;
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
            $article->setComputer($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Article->contains($article)) {
            $this->Article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getComputer() === $this) {
                $article->setComputer(null);
            }
        }

        return $this;
    }
}
