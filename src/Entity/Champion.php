<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChampionRepository::class)]
class Champion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $origine = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cost = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'champion', targetEntity: ChampionItem::class)]
    private Collection $championItems;

    public function __toString(): string
    {
        return $this->name ?? '';
    }

    public function __construct()
    {
        $this->championItems = new ArrayCollection();
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

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

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
     * @return Collection<int, ChampionItem>
     */
    public function getChampionItems(): Collection
    {
        return $this->championItems;
    }

    public function addChampionItem(ChampionItem $championItem): self
    {
        if (!$this->championItems->contains($championItem)) {
            $this->championItems[] = $championItem;
            $championItem->setChampion($this);
        }

        return $this;
    }

    public function removeChampionItem(ChampionItem $championItem): self
    {
        if ($this->championItems->removeElement($championItem)) {
            // set the owning side to null (unless already changed)
            if ($championItem->getChampion() === $this) {
                $championItem->setChampion(null);
            }
        }

        return $this;
    }

}
