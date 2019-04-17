<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactParticulierRepository")
 */
class ContactParticulier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sujet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Message;

    /**
     * @ORM\Column(type="datetime", nullable=true,options={"default": "CURRENT_TIMESTAMP"})
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Particulier", inversedBy="id")
     */
    private $ID_Particulier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->Sujet;
    }

    public function setSujet(string $Sujet): self
    {
        $this->Sujet = $Sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getIDParticulier(): ?Particulier
    {
        return $this->ID_Particulier;
    }

    public function setIDParticulier(?Particulier $ID_Particulier): self
    {
        $this->ID_Particulier = $ID_Particulier;

        return $this;
    }

}
