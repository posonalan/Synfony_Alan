<?php

namespace App\Entity;

use App\Repository\AnimauxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimauxRepository::class)
 */
class Animaux
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
    private $LibelleAnimal;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeNaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Alimentations;

    /**
     * @ORM\OneToOne(targetEntity=Alimentations::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idAlimentation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAnimal(): ?string
    {
        return $this->LibelleAnimal;
    }

    public function setLibelleAnimal(string $LibelleAnimal): self
    {
        $this->LibelleAnimal = $LibelleAnimal;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->DateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $DateDeNaissance): self
    {
        $this->DateDeNaissance = $DateDeNaissance;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getAlimentations(): ?string
    {
        return $this->Alimentations;
    }

    public function setAlimentations(string $Alimentations): self
    {
        $this->Alimentations = $Alimentations;

        return $this;
    }

    public function getIdAlimentation(): ?Alimentations
    {
        return $this->idAlimentation;
    }

    public function setIdAlimentation(Alimentations $idAlimentation): self
    {
        $this->idAlimentation = $idAlimentation;

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleAnimal();
    }


}
