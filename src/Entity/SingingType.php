<?php

namespace App\Entity;

use App\Repository\SingingTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SingingTypeRepository::class)]
class SingingType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isChurch = null;

    /**
     * @var Collection<int, Singing>
     */
    #[ORM\ManyToMany(targetEntity: Singing::class, inversedBy: 'singingTypes')]
    private Collection $singings;

    public function __construct()
    {
        $this->singings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isChurch(): ?bool
    {
        return $this->isChurch;
    }

    public function setIsChurch(?bool $isChurch): static
    {
        $this->isChurch = $isChurch;

        return $this;
    }

    /**
     * @return Collection<int, Singing>
     */
    public function getSingings(): Collection
    {
        return $this->singings;
    }

    public function addSinging(Singing $singing): static
    {
        if (!$this->singings->contains($singing)) {
            $this->singings->add($singing);
        }

        return $this;
    }

    public function removeSinging(Singing $singing): static
    {
        $this->singings->removeElement($singing);

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
