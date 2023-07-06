<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use App\Entity\Theatre;
use App\Entity\Ouvreur;
use App\Entity\Pourboire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $theatre = new Theatre();
        $theatre -> setMailUtilisateur('mailtheater1@gmail.com')
                        -> setMdpUtilisateur('mdptheatre1')
                        -> setNomTheatre('Theatre 1')
                        -> setQrCode('path');

        $ouvreur = new Ouvreur();
        $ouvreur -> setMailUtilisateur('mailouvreur1@gmail.com')
                        -> setMdpUtilisateur('mdpouvreur1')
                        -> setNom('Ouvreur 1')
                        -> setPrenom('Ouvreur 1')
                        -> setIdTheatre($theatre);

        $manager->persist($theatre);
        $manager->persist($ouvreur);
        $manager->flush();

        /* commande pour mettre dans la bdd : php bin/console doctrine:fixtures:load */
    }
}
