<?php

namespace App\Entity;

use App\Repository\CalenderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalenderRepository::class)
 */
class Calender
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
    private $Moment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Begindate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Enddate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Frontpage;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="calenders")
     */
    private $UserID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoment(): ?\DateTimeInterface
    {
        return $this->Moment;
    }

    public function setMoment(\DateTimeInterface $Moment): self
    {
        $this->Moment = $Moment;

        return $this;
    }

    public function getBegindate(): ?\DateTimeInterface
    {
        return $this->Begindate;
    }

    public function setBegindate(\DateTimeInterface $Begindate): self
    {
        $this->Begindate = $Begindate;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->Enddate;
    }

    public function setEnddate(\DateTimeInterface $Enddate): self
    {
        $this->Enddate = $Enddate;

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

    public function getUserID(): ?User
    {
        return $this->UserID;
    }

    public function setUserID(?User $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }
}
