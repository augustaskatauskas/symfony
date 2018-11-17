<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 */
class Phone
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
    private $Phone_Make;

    /**
     * @ORM\Column(type="text", length=100)
     */

     private $Phone_Model;

     /**
     * @ORM\Column(type="integer", length=9)
     */

    private $Phone_Years;

     /**
     * @ORM\Column(type="integer", length=18)
     */

    private $Phone_IMEI;



    //RelationShip      

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="Phone" )
     */
    private $Article;

    public function __toString()
    {
        return $this->Phone_Make;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->Article = new ArrayCollection();
    }

    public function getPhoneMake(): ?string
    {
        return $this->Phone_Make;
    }

    public function setPhoneMake(string $Phone_Make): self
    {
        $this->Phone_Make = $Phone_Make;

        return $this;
    }

    public function getPhoneModel(): ?string
    {
        return $this->Phone_Model;
    }

    public function setPhoneModel(string $Phone_Model): self
    {
        $this->Phone_Model = $Phone_Model;

        return $this;
    }

    public function getPhoneYears(): ?int
    {
        return $this->Phone_Years;
    }

    public function setPhoneYears(int $Phone_Years): self
    {
        $this->Phone_Years = $Phone_Years;

        return $this;
    }

    public function getPhoneIMEI(): ?int
    {
        return $this->Phone_IMEI;
    }

    public function setPhoneIMEI(int $Phone_IMEI): self
    {
        $this->Phone_IMEI = $Phone_IMEI;

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
            $article->setPhone($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Article->contains($article)) {
            $this->Article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getPhone() === $this) {
                $article->setPhone(null);
            }
        }

        return $this;
    }
}
