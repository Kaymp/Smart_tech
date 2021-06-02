<?php

namespace App\Entity;

use App\Repository\StatictextRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatictextRepository::class)
 */
class Statictext
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $moment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Frontpage;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="statictexts")
     */
    private $UserID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoment(): ?\DateTimeInterface
    {
        return $this->moment;
    }

    public function setMoment(\DateTimeInterface $moment): self
    {
        $this->moment = $moment;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getFrontpage(): ?bool
    {
        return $this->Frontpage;
    }

    public function setFrontpage(bool $Frontpage): self
    {
        $this->Frontpage = $Frontpage;

        return $this;
    }

    public function getUserID(): ?user
    {
        return $this->UserID;
    }

    public function setUserID(?user $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }
}
