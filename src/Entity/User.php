<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
/**
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;
 
    public function getFullname(): ?string
    {
        return $this->lastname . " " . $this->firstname;
    }


    /**
     * @ORM\PrePersist
     * @oORM\PreUpdate
     *
     * @return void
     */
    public function initSlug(){
        if (empty($this->slug)) {
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->getFullname() . time() . hash( "sha1" , $this->getFirstname()));
        }
    }

    // ... autres propriétés, getters et setters

  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }


public function setFirstname(string $firstname): self
{
    $this->firstname = $firstname;
    return $this;
}


public function getLastname(): ?string
{
    return $this->lastname;
}
    
    
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
    
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): void
    {
        $this->presentation = $presentation;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
  
    // Autres méthodes utiles
}
