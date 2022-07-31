<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $build;

    public function __construct()
    {
        $this->build = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name ?? '';
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBuild(): Collection
    {
        return $this->build;
    }

    public function addBuild(self $build): self
    {
        if (!$this->build->contains($build)) {
            $this->build[] = $build;
        }

        return $this;
    }

    public function removeBuild(self $build): self
    {
        $this->build->removeElement($build);

        return $this;
    }

}
