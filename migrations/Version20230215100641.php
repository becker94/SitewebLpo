<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215100641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, nom_adherent VARCHAR(255) NOT NULL, prenom_adherent VARCHAR(255) NOT NULL, adresse_mail_adherent VARCHAR(255) NOT NULL, domaine_adherent VARCHAR(255) NOT NULL, temoignage VARCHAR(255) NOT NULL, reference_linkedin VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ancien_etudiant (id INT AUTO_INCREMENT NOT NULL, metier_formation VARCHAR(255) NOT NULL, anee_etude DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, adherent_id INT DEFAULT NULL, mail_partage VARCHAR(255) NOT NULL, suivi_formation VARCHAR(255) NOT NULL, formation_cachan VARCHAR(255) NOT NULL, mail_difuse VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF05200282E (formation_id), INDEX IDX_8F91ABF025F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom_etablissemnt VARCHAR(255) NOT NULL, ville_etablissemnt VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_etablissement (formation_id INT NOT NULL, etablissement_id INT NOT NULL, INDEX IDX_795F3ACD5200282E (formation_id), INDEX IDX_795F3ACDFF631228 (etablissement_id), PRIMARY KEY(formation_id, etablissement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_adherent (formation_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_5741A7915200282E (formation_id), INDEX IDX_5741A79125F06C53 (adherent_id), PRIMARY KEY(formation_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, titre_poste VARCHAR(255) NOT NULL, competence_requises VARCHAR(255) NOT NULL, statut_offre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, code_postal INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF05200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF025F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE formation_etablissement ADD CONSTRAINT FK_795F3ACD5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_etablissement ADD CONSTRAINT FK_795F3ACDFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_adherent ADD CONSTRAINT FK_5741A7915200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_adherent ADD CONSTRAINT FK_5741A79125F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF05200282E');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF025F06C53');
        $this->addSql('ALTER TABLE formation_etablissement DROP FOREIGN KEY FK_795F3ACD5200282E');
        $this->addSql('ALTER TABLE formation_etablissement DROP FOREIGN KEY FK_795F3ACDFF631228');
        $this->addSql('ALTER TABLE formation_adherent DROP FOREIGN KEY FK_5741A7915200282E');
        $this->addSql('ALTER TABLE formation_adherent DROP FOREIGN KEY FK_5741A79125F06C53');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE ancien_etudiant');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_etablissement');
        $this->addSql('DROP TABLE formation_adherent');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
