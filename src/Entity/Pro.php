<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProRepository")
 * @ORM\Entity
 * @UniqueEntity(fields={"Email"}, message="cet email est déjà connu !")
 * @UniqueEntity(fields={"Entreprise"}, message="cette entreprise est déjà connu !")
 */
class Pro implements UserInterface, Serializable
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
     * @Assert\Email()
     * @Assert\NotBlank
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @var string The hashed password
     * @Assert\Length(min="6", max="32")
     */
    private $MotDePasse;

    /**
     * @ORM\Column(nullable=true)
     *@Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "image/png", "image/jpeg", "image/svg", "image/jpg"},
     *     mimeTypesMessage = "Veuillez télécharger un fichier au format jpeg/png/pdf "
     * )
     */
    private $Logo;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="Id_Pro")
     */
    private $AvisObtenu;

    public function __construct()
    {
        $this->Id_contact_pro = new ArrayCollection();
        $this->AvisObtenu = new ArrayCollection();
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

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->Email,
            $this->MotDePasse,
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->Email,
            $this->MotDePasse
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_PRO'];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getMotDePasse();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvisObtenu(): Collection
    {
        return $this->AvisObtenu;
    }

    public function addAvisObtenu(Avis $avisObtenu): self
    {
        if (!$this->AvisObtenu->contains($avisObtenu)) {
            $this->AvisObtenu[] = $avisObtenu;
            $avisObtenu->setIdPro($this);
        }

        return $this;
    }

    public function removeAvisObtenu(Avis $avisObtenu): self
    {
        if ($this->AvisObtenu->contains($avisObtenu)) {
            $this->AvisObtenu->removeElement($avisObtenu);
            // set the owning side to null (unless already changed)
            if ($avisObtenu->getIdPro() === $this) {
                $avisObtenu->setIdPro(null);
            }
        }

        return $this;
    }
}
