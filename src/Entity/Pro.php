<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProRepository")
 */
class Pro
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
    private $Entreprise;

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
    private $NumeroSiret;

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
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SiteWeb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SecteurActivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MotDePasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContactPro", mappedBy="ID_Pro")
     */
    private $Id_contact_pro;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="Id_Pro")
     */
    private $Id_Pro;

    public function __construct()
    {
        $this->Id_contact_pro = new ArrayCollection();
        $this->Id_Pro = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?string
    {
        return $this->Entreprise;
    }

    public function setEntreprise(string $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
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

    public function getNumeroSiret(): ?string
    {
        return $this->NumeroSiret;
    }

    public function setNumeroSiret(string $NumeroSiret): self
    {
        $this->NumeroSiret = $NumeroSiret;

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

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

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

    public function getSiteWeb(): ?string
    {
        return $this->SiteWeb;
    }

    public function setSiteWeb(string $SiteWeb): self
    {
        $this->SiteWeb = $SiteWeb;

        return $this;
    }

    public function getSecteurActivite(): ?string
    {
        return $this->SecteurActivite;
    }

    public function setSecteurActivite(string $SecteurActivite): self
    {
        $this->SecteurActivite = $SecteurActivite;

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

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(string $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }

    /**
     * @return Collection|ContactPro[]
     */
    public function getIdContactPro(): Collection
    {
        return $this->Id_contact_pro;
    }

    public function addIdContactPro(ContactPro $idContactPro): self
    {
        if (!$this->Id_contact_pro->contains($idContactPro)) {
            $this->Id_contact_pro[] = $idContactPro;
            $idContactPro->setIDPro($this);
        }

        return $this;
    }

    public function removeIdContactPro(ContactPro $idContactPro): self
    {
        if ($this->Id_contact_pro->contains($idContactPro)) {
            $this->Id_contact_pro->removeElement($idContactPro);
            // set the owning side to null (unless already changed)
            if ($idContactPro->getIDPro() === $this) {
                $idContactPro->setIDPro(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getIdPro(): Collection
    {
        return $this->Id_Pro;
    }

    public function addIdPro(Avis $idPro): self
    {
        if (!$this->Id_Pro->contains($idPro)) {
            $this->Id_Pro[] = $idPro;
            $idPro->setIdPro($this);
        }

        return $this;
    }

    public function removeIdPro(Avis $idPro): self
    {
        if ($this->Id_Pro->contains($idPro)) {
            $this->Id_Pro->removeElement($idPro);
            // set the owning side to null (unless already changed)
            if ($idPro->getIdPro() === $this) {
                $idPro->setIdPro(null);
            }
        }

        return $this;
    }
}
