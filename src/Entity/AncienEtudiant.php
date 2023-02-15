<?php

namespace App\Entity;

use App\Repository\AncienEtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AncienEtudiantRepository::class)]
class AncienEtudiant
extends Adherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $metierFormation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $aneeEtude = null;

    #[ORM\ManyToMany(targetEntity: Entreprise::class, inversedBy: 'ancienEtudiants')]
    private Collection $entreprise;

    #[ORM\OneToMany(mappedBy: 'ancienEtudiant', targetEntity: Metier::class)]
    private Collection $metiers;

    public function __construct()
    {
        $this->entreprise = new ArrayCollection();
        $this->metiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetierFormation(): ?string
    {
        return $this->metierFormation;
    }

    public function setMetierFormation(string $metierFormation): self
    {
        $this->metierFormation = $metierFormation;

        return $this;
    }

    public function getAneeEtude(): ?\DateTimeInterface
    {
        return $this->aneeEtude;
    }

    public function setAneeEtude(\DateTimeInterface $aneeEtude): self
    {
        $this->aneeEtude = $aneeEtude;

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getEntreprise(): Collection
    {
        return $this->entreprise;
    }

    public function addEntreprise(Entreprise $entreprise): self
    {
        if (!$this->entreprise->contains($entreprise)) {
            $this->entreprise->add($entreprise);
        }

        return $this;
    }

    public function removeEntreprise(Entreprise $entreprise): self
    {
        $this->entreprise->removeElement($entreprise);

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetiers(): Collection
    {
        return $this->metiers;
    }

    public function addMetier(Metier $metier): self
    {
        if (!$this->metiers->contains($metier)) {
            $this->metiers->add($metier);
            $metier->setAncienEtudiant($this);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): self
    {
        if ($this->metiers->removeElement($metier)) {
            // set the owning side to null (unless already changed)
            if ($metier->getAncienEtudiant() === $this) {
                $metier->setAncienEtudiant(null);
            }
        }

        return $this;
    }
}
