<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank
     * @Assert\Length(min="2")
     */
    private $Entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min="2")
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min="2")
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $NumeroSiret;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Length(min="5", max="5")
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern     = " /^(?:(?:\+|00)33[\s.\-\/]{0,3}(?:\(0\)[\s.\-\/]{0,3})?|0)[1-9](?:(?:[\s.\-\/]?\d{2}){4}|\d{2}(?:[\s.\-\/]?\d{3}){2})$/")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email()
     *
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SiteWeb;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $SecteurActivite;

    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\NotBlank
     * @Assert\Length(min="6", max="16")
     */
    private $MotDePasse;

    /**
     * @ORM\Column()
     *@Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "image/png", "image/jpeg"},
     *     mimeTypesMessage = "Veuillez télécharger un fichier au format jpeg/png/pdf "
     * )
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PageFacebook;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\IsTrue(message="Veuillez cocher la case")
     */
    private $CGU;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Newsletter;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $Ville;

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

    public function getLogo()
    {
        return $this->Logo;
    }

    public function setLogo(File $file)
    {
        $this->Logo = $file;

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

    public function getPageFacebook(): ?string
    {
        return $this->PageFacebook;
    }

    public function setPageFacebook(string $PageFacebook): self
    {
        $this->PageFacebook = $PageFacebook;

        return $this;
    }

    public function getCGU(): ?bool
    {
        return $this->CGU;
    }

    public function setCGU(bool $CGU): self
    {
        $this->CGU = $CGU;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->Newsletter;
    }

    public function setNewsletter(bool $Newsletter): self
    {
        $this->Newsletter = $Newsletter;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }
}
