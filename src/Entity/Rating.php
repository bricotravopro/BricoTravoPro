<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RatingRepository")
 */
class Rating
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $posted_by;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pro", inversedBy="ratings")
     */
    private $rate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $posted_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPostedBy(): ?string
    {
        return $this->posted_by;
    }

    public function setPostedBy(string $posted_by): self
    {
        $this->posted_by = $posted_by;

        return $this;
    }

    public function getRate(): ?Pro
    {
        return $this->rate;
    }

    public function setRate(?Pro $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getPostedAt(): ?\DateTimeInterface
    {
        return $this->posted_at;
    }

    public function setPostedAt(\DateTimeInterface $posted_at): self
    {
        $this->posted_at = $posted_at;

        return $this;
    }
}
