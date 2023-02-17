<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdherentRepository::class)]
class Adherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAdherent = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomAdherent = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseMailAdherent = null;

    #[ORM\Column(length: 255)]
    private ?string $domaineAdherent = null;

    #[ORM\Column(length: 255)]
    private ?string $temoignage = null;

    #[ORM\Column(length: 255)]
    private ?string $referenceLinkedin = null;

    #[ORM\Column(length: 255)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    #[ORM\ManyToMany(targetEntity: Formation::class, mappedBy: 'adherent')]
    private Collection $formation;

    #[ORM\OneToMany(mappedBy: 'adherent', targetEntity: Avis::class)]
    private Collection $avis;

    #[ORM\ManyToMany(targetEntity: Stage::class, mappedBy: 'adherent')]
    private Collection $stages;

    public function __construct()
    {
        $this->formation = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->stages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdherent(): ?string
    {
        return $this->nomAdherent;
    }

    public function setNomAdherent(string $nomAdherent): self
    {
        $this->nomAdherent = $nomAdherent;

        return $this;
    }

    public function getPrenomAdherent(): ?string
    {
        return $this->prenomAdherent;
    }

    public function setPrenomAdherent(string $prenomAdherent): self
    {
        $this->prenomAdherent = $prenomAdherent;

        return $this;
    }

    public function getAdresseMailAdherent(): ?string
    {
        return $this->adresseMailAdherent;
    }

    public function setAdresseMailAdherent(string $adresseMailAdherent): self
    {
        $this->adresseMailAdherent = $adresseMailAdherent;

        return $this;
    }

    public function getDomaineAdherent(): ?string
    {
        return $this->domaineAdherent;
    }

    public function setDomaineAdherent(string $domaineAdherent): self
    {
        $this->domaineAdherent = $domaineAdherent;

        return $this;
    }

    public function getTemoignage(): ?string
    {
        return $this->temoignage;
    }

    public function setTemoignage(string $temoignage): self
    {
        $this->temoignage = $temoignage;

        return $this;
    }

    public function getReferenceLinkedin(): ?string
    {
        return $this->referenceLinkedin;
    }

    public function setReferenceLinkedin(string $referenceLinkedin): self
    {
        $this->referenceLinkedin = $referenceLinkedin;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

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
            $formation->addAdherent($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formation->removeElement($formation)) {
            $formation->removeAdherent($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setAdherent($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getAdherent() === $this) {
                $avi->setAdherent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages->add($stage);
            $stage->addAdherent($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->removeElement($stage)) {
            $stage->removeAdherent($this);
        }

        return $this;
    }


public function __toString(){
    return $this->getNomAdherent().$this->getPrenomAdherent();
}
}
