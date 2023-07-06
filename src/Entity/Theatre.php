<?php

namespace App\Entity;

use App\Repository\TheatreRepository;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TheatreRepository::class)]
class Theatre extends Utilisateur
{
 
   #[ORM\Column(length: 255)]
    private ?string $nom_theatre = null;

    #[ORM\Column(length: 255)]
    private ?string $qrcode = null;

    #[ORM\OneToMany(mappedBy: 'theatre', targetEntity: Ouvreur::class)]
    private Collection $ouvreur;

    #[ORM\OneToMany(mappedBy: 'theatre', targetEntity: Pourboire::class)]
    private Collection $pourboire;

    public function __construct()
    {
        $this->ouvreur = new ArrayCollection();
        $this->pourboire = new ArrayCollection();
    }

    public function getNomTheatre(): ?string
    {
        return $this->nom_theatre;
    }

    public function setNomTheatre(string $nom_theatre): static
    {
        $this->nom_theatre = $nom_theatre;

        return $this;
    }

    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    public function setQrcode(string $qrcode): static
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    /**
     * @return Collection<int, Ouvreur>
     */
    public function getOuvreur(): Collection
    {
        return $this->ouvreur;
    }

    public function addOuvreur(Ouvreur $ouvreur): static
    {
        if (!$this->ouvreur->contains($ouvreur)) {
            $this->ouvreur->add($ouvreur);
            $ouvreur->setIdTheatre($this);
        }

        return $this;
    }

    public function removeOuvreur(Ouvreur $ouvreur): static
    {
        if ($this->ouvreur->removeElement($ouvreur)) {
            // set the owning side to null (unless already changed)
            if ($ouvreur->getIdTheatre() === $this) {
                $ouvreur->setIdTheatre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pourboire>
     */
    public function getPourboire(): Collection
    {
        return $this->pourboire;
    }

    public function addPourboire(Pourboire $pourboire): static
    {
        if (!$this->pourboire->contains($pourboire)) {
            $this->pourboire->add($pourboire);
            $pourboire->setTheatre($this);
        }

        return $this;
    }

    public function removePourboire(Pourboire $pourboire): static
    {
        if ($this->pourboire->removeElement($pourboire)) {
            // set the owning side to null (unless already changed)
            if ($pourboire->getTheatre() === $this) {
                $pourboire->setTheatre(null);
            }
        }

        return $this;
    }
}

?>