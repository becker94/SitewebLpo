<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEtablissemnt = null;

    #[ORM\Column(length: 255)]
    private ?string $villeEtablissemnt = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\ManyToMany(targetEntity: Formation::class, mappedBy: 'etablissement')]
    private Collection $formation;

    public function __construct()
    {
        $this->formation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissemnt(): ?string
    {
        return $this->nomEtablissemnt;
    }

    public function setNomEtablissemnt(string $nomEtablissemnt): self
    {
        $this->nomEtablissemnt = $nomEtablissemnt;

        return $this;
    }

    public function getVilleEtablissemnt(): ?string
    {
        return $this->villeEtablissemnt;
    }

    public function setVilleEtablissemnt(string $villeEtablissemnt): self
    {
        $this->villeEtablissemnt = $villeEtablissemnt;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormation(): Collection
    {
        return $this->formation;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formation->contains($formation)) {
            $this->formation->add($formation);
            $formation->addEtablissement($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formation->removeElement($formation)) {
            $formation->removeEtablissement($this);
        }

        return $this;
   
    }

    

public function __toString(){
    return $this->getNomEtablissemnt();
}
  
}
