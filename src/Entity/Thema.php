<?php

namespace App\Entity;

use App\Repository\ThemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemaRepository::class)
 */
class Thema
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=project::class, mappedBy="thema")
     */
    private $ProjectID;

    public function __construct()
    {
        $this->ProjectID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    /**
     * @return Collection|project[]
     */
    public function getProjectID(): Collection
    {
        return $this->ProjectID;
    }

    public function addProjectID(project $projectID): self
    {
        if (!$this->ProjectID->contains($projectID)) {
            $this->ProjectID[] = $projectID;
            $projectID->setThema($this);
        }

        return $this;
    }

    public function removeProjectID(project $projectID): self
    {
        if ($this->ProjectID->removeElement($projectID)) {
            // set the owning side to null (unless already changed)
            if ($projectID->getThema() === $this) {
                $projectID->setThema(null);
            }
        }

        return $this;
    }
}
