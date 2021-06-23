<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"uuid"}, message="There is already an account with this uuid")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $uuid;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\OneToMany(targetEntity=Statictext::class, mappedBy="UserID")
     */
    private $statictexts;

    /**
     * @ORM\OneToMany(targetEntity=Blog::class, mappedBy="UserID")
     */
    private $blogs;

    /**
     * @ORM\OneToMany(targetEntity=Calender::class, mappedBy="UserID")
     */
    private $calenders;


    public function __construct()
    {
        $this->statictexts = new ArrayCollection();
        $this->blogs = new ArrayCollection();
        $this->calenders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->uuid;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return null;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmailaddres(): ?string
    {
        return $this->Emailaddres;
    }

    public function setEmailaddres(string $Emailaddres): self
    {
        $this->Emailaddres = $Emailaddres;

        return $this;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection|Statictext[]
     */
    public function getStatictexts(): Collection
    {
        return $this->statictexts;
    }

    public function addStatictext(Statictext $statictext): self
    {
        if (!$this->statictexts->contains($statictext)) {
            $this->statictexts[] = $statictext;
            $statictext->setUserID($this);
        }

        return $this;
    }

    public function removeStatictext(Statictext $statictext): self
    {
        if ($this->statictexts->removeElement($statictext)) {
            // set the owning side to null (unless already changed)
            if ($statictext->getUserID() === $this) {
                $statictext->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Blog[]
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): self
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs[] = $blog;
            $blog->setUserID($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): self
    {
        if ($this->blogs->removeElement($blog)) {
            // set the owning side to null (unless already changed)
            if ($blog->getUserID() === $this) {
                $blog->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Calender[]
     */
    public function getCalenders(): Collection
    {
        return $this->calenders;
    }

    public function addCalender(Calender $calender): self
    {
        if (!$this->calenders->contains($calender)) {
            $this->calenders[] = $calender;
            $calender->setUserID($this);
        }

        return $this;
    }

    public function removeCalender(Calender $calender): self
    {
        if ($this->calenders->removeElement($calender)) {
            // set the owning side to null (unless already changed)
            if ($calender->getUserID() === $this) {
                $calender->setUserID(null);
            }
        }

        return $this;
    }
}
