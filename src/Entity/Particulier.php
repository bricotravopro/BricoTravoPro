<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticulierRepository")
 */
class Particulier
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MotDePasse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContactParticulier", mappedBy="ID_Particulier")
     */
    private $Id_contact_particulier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="Id_Particulier")
     */
    private $Id_Particulier;

    public function __construct()
    {
        $this->Id_contact_particulier = new ArrayCollection();
        $this->Id_Particulier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCP(): ?int
    {
        return $this->CP;
    }

    public function setCP(int $CP): self
    {
        $this->CP = $CP;

        return $this;
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

    public function getMotDePasse(): ?string
    {
        return $this->MotDePasse;
    }

    public function setMotDePasse(string $MotDePasse): self
    {
        $this->MotDePasse = $MotDePasse;

        return $this;
    }

    /**
     * @return Collection|ContactParticulier[]
     */
    public function getIdContactParticulier(): Collection
    {
        return $this->Id_contact_particulier;
    }

    public function addIdContactParticulier(ContactParticulier $idContactParticulier): self
    {
        if (!$this->Id_contact_particulier->contains($idContactParticulier)) {
            $this->Id_contact_particulier[] = $idContactParticulier;
            $idContactParticulier->setIDParticulier($this);
        }

        return $this;
    }

    public function removeIdContactParticulier(ContactParticulier $idContactParticulier): self
    {
        if ($this->Id_contact_particulier->contains($idContactParticulier)) {
            $this->Id_contact_particulier->removeElement($idContactParticulier);
            // set the owning side to null (unless already changed)
            if ($idContactParticulier->getIDParticulier() === $this) {
                $idContactParticulier->setIDParticulier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getIdParticulier(): Collection
    {
        return $this->Id_Particulier;
    }

    public function addIdParticulier(Avis $idParticulier): self
    {
        if (!$this->Id_Particulier->contains($idParticulier)) {
            $this->Id_Particulier[] = $idParticulier;
            $idParticulier->setIdParticulier($this);
        }

        return $this;
    }

    public function removeIdParticulier(Avis $idParticulier): self
    {
        if ($this->Id_Particulier->contains($idParticulier)) {
            $this->Id_Particulier->removeElement($idParticulier);
            // set the owning side to null (unless already changed)
            if ($idParticulier->getIdParticulier() === $this) {
                $idParticulier->setIdParticulier(null);
            }
        }

        return $this;
    }
}
