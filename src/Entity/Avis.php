<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mailPartage = null;

    #[ORM\Column(length: 255)]
    private ?string $suiviFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $formationCachan = null;

    #[ORM\Column(length: 255)]
    private ?string $mailDifuse = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Formation $formation = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Adherent $adherent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailPartage(): ?string
    {
        return $this->mailPartage;
    }

    public function setMailPartage(string $mailPartage): self
    {
        $this->mailPartage = $mailPartage;

        return $this;
    }

    public function getSuiviFormation(): ?string
    {
        return $this->suiviFormation;
    }

    public function setSuiviFormation(string $suiviFormation): self
    {
        $this->suiviFormation = $suiviFormation;

        return $this;
    }

    public function getFormationCachan(): ?string
    {
        return $this->formationCachan;
    }

    public function setFormationCachan(string $formationCachan): self
    {
        $this->formationCachan = $formationCachan;

        return $this;
    }

    public function getMailDifuse(): ?string
    {
        return $this->mailDifuse;
    }

    public function setMailDifuse(string $mailDifuse): self
    {
        $this->mailDifuse = $mailDifuse;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): self
    {
        $this->adherent = $adherent;

        return $this;
    }
}
