<?php

namespace App\Entity;

use App\Repository\AlimentationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlimentationsRepository::class)
 */
class Alimentations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelleAliment;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TypeAliment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAliment(): ?string
    {
        return $this->libelleAliment;
    }

    public function setLibelleAliment(string $libelleAliment): self
    {
        $this->libelleAliment = $libelleAliment;

        return $this;
    }

    public function getTypeAliment(): ?string
    {
        return $this->TypeAliment;
    }

    public function setTypeAliment(string $TypeAliment): self
    {
        $this->TypeAliment = $TypeAliment;

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleAliment();
    }
}
