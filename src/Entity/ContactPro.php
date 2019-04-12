<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactProRepository")
 */
class ContactPro
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Pro", inversedBy="Id_contact_pro")
     */
    private $ID_Pro;

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

    public function getIDPro(): ?Pro
    {
        return $this->ID_Pro;
    }

    public function setIDPro(?Pro $ID_Pro): self
    {
        $this->ID_Pro = $ID_Pro;

        return $this;
    }
}


