<?php

namespace App\Entity;

use App\Repository\OuvreurRepository;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvreurRepository::class)]
class Ouvreur extends Utilisateur
{

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'ouvreur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Theatre $theatre = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIdTheatre(): ?Theatre
    {
        return $this->theatre;
    }

    public function setIdTheatre(?Theatre $theatre): static
    {
        $this->theatre = $theatre;

        return $this;
    }
}

?>