<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticulierRepository")
 */
class Particulier implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="2")
     * @Assert\NotBlank
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(max="5")
     * @Assert\NotBlank
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     * @Assert\NotBlank
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min="6", max="32")
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

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Ville;

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

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

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
        return ['ROLE_ADMIN'];
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

    public function getUsername()
    {
        return $this->getEmail();
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
            $this->email,
            $this->MotDePasse
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}
