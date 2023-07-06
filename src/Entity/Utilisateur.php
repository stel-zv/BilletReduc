<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use App\Entity\Administrateur;
use App\Entity\Theatre;
use App\Entity\Ouvreur;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'discr', type: 'string')]
#[ORM\DiscriminatorMap([
    'administrateur' => Administrateur::class,
    'theatre' => Theatre::class,
    'ouvreur' => Ouvreur::class
])]

class Utilisateur 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $mail_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp_utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMailUtilisateur(string $mail_utilisateur): static
    {
        $this->mail_utilisateur = $mail_utilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdp_utilisateur;
    }

    public function setMdpUtilisateur(string $mdp_utilisateur): static
    {
        $this->mdp_utilisateur = $mdp_utilisateur;

        return $this;
    }
}

?>