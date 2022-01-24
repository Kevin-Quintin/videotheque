<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Figurent::class, inversedBy="roles")
     */
    private $figurent;

    public function __construct()
    {
        $this->figurent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Figurent[]
     */
    public function getFigurent(): Collection
    {
        return $this->figurent;
    }

    public function addFigurent(Figurent $figurent): self
    {
        if (!$this->figurent->contains($figurent)) {
            $this->figurent[] = $figurent;
        }

        return $this;
    }

    public function removeFigurent(Figurent $figurent): self
    {
        $this->figurent->removeElement($figurent);

        return $this;
    }
}
