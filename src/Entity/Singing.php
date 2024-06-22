<?php

namespace App\Entity;

use App\Repository\SingingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SingingRepository::class)]
class Singing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    /**
     * @var Collection<int, SingingType>
     */
    #[ORM\ManyToMany(targetEntity: SingingType::class, mappedBy: 'singings')]
    private Collection $singingTypes;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $translation = null;

    public function __construct()
    {
        $this->singingTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, SingingType>
     */
    public function getSingingTypes(): Collection
    {
        return $this->singingTypes;
    }

    public function addSingingType(SingingType $singingType): static
    {
        if (!$this->singingTypes->contains($singingType)) {
            $this->singingTypes->add($singingType);
            $singingType->addSinging($this);
        }

        return $this;
    }

    public function removeSingingType(SingingType $singingType): static
    {
        if ($this->singingTypes->removeElement($singingType)) {
            $singingType->removeSinging($this);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTranslation(): ?string
    {
        return $this->translation;
    }

    public function setTranslation(string $translation): static
    {
        $this->translation = $translation;

        return $this;
    }
}
