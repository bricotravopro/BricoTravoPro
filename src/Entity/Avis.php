<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
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
    private $Email;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Commentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Particulier", inversedBy="Id_Particulier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Particulier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pro", inversedBy="Id_Pro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Pro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

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

    public function getIdParticulier(): ?Particulier
    {
        return $this->Id_Particulier;
    }

    public function setIdParticulier(?Particulier $Id_Particulier): self
    {
        $this->Id_Particulier = $Id_Particulier;

        return $this;
    }

    public function getIdPro(): ?Pro
    {
        return $this->Id_Pro;
    }

    public function setIdPro(?Pro $Id_Pro): self
    {
        $this->Id_Pro = $Id_Pro;

        return $this;
    }
}
