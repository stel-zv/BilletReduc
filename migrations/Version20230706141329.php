<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706141329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvreur (id INT NOT NULL, theatre_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_AE869610C80060CD (theatre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pourboire (id INT AUTO_INCREMENT NOT NULL, theatre_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, moyen_paiement VARCHAR(255) NOT NULL, INDEX IDX_BB8B5EC80060CD (theatre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theatre (id INT NOT NULL, nom_theatre VARCHAR(255) NOT NULL, qrcode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, mail_utilisateur VARCHAR(255) NOT NULL, mdp_utilisateur VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8BF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvreur ADD CONSTRAINT FK_AE869610C80060CD FOREIGN KEY (theatre_id) REFERENCES theatre (id)');
        $this->addSql('ALTER TABLE ouvreur ADD CONSTRAINT FK_AE869610BF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pourboire ADD CONSTRAINT FK_BB8B5EC80060CD FOREIGN KEY (theatre_id) REFERENCES theatre (id)');
        $this->addSql('ALTER TABLE theatre ADD CONSTRAINT FK_C08D8005BF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8BF396750');
        $this->addSql('ALTER TABLE ouvreur DROP FOREIGN KEY FK_AE869610C80060CD');
        $this->addSql('ALTER TABLE ouvreur DROP FOREIGN KEY FK_AE869610BF396750');
        $this->addSql('ALTER TABLE pourboire DROP FOREIGN KEY FK_BB8B5EC80060CD');
        $this->addSql('ALTER TABLE theatre DROP FOREIGN KEY FK_C08D8005BF396750');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE ouvreur');
        $this->addSql('DROP TABLE pourboire');
        $this->addSql('DROP TABLE theatre');
        $this->addSql('DROP TABLE utilisateur');
    }
}
