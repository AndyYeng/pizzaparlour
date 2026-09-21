<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Pizzas>
     */
    #[ORM\OneToMany(targetEntity: Pizzas::class, mappedBy: 'categories')]
    private Collection $pizzas;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
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


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Pizzas>
     */
    public function getPizzas(): Collection
    {
        return $this->pizzas;
    }

    public function addPizza(Pizzas $pizza): static
    {
        if (!$this->pizzas->contains($pizza)) {
            $this->pizzas->add($pizza);
            $pizza->setCategories($this);
        }

        return $this;
    }

    public function removePizza(Pizzas $pizza): static
    {
        if ($this->pizzas->removeElement($pizza)) {
            // set the owning side to null (unless already changed)
            if ($pizza->getCategories() === $this) {
                $pizza->setCategories(null);
            }
        }

        return $this;
    }
}
