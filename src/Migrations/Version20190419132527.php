<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190419132527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_particulier_id INT NOT NULL, id_pro_id INT NOT NULL, email VARCHAR(255) NOT NULL, note INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_8F91ABF095F8B361 (id_particulier_id), INDEX IDX_8F91ABF0E5805157 (id_pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_particulier (id INT AUTO_INCREMENT NOT NULL, id_particulier_id INT DEFAULT NULL, sujet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX IDX_2686B4D95F8B361 (id_particulier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_pro (id INT AUTO_INCREMENT NOT NULL, id_pro_id INT DEFAULT NULL, sujet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX IDX_968EB7C7E5805157 (id_pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D2367717E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE particulier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pro (id INT AUTO_INCREMENT NOT NULL, entreprise VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_siret VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, site_web VARCHAR(255) NOT NULL, secteur_activite VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, page_facebook VARCHAR(255) DEFAULT NULL, cgu TINYINT(1) NOT NULL, newsletter TINYINT(1) NOT NULL, ville VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6BB4D6FFE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur_activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF095F8B361 FOREIGN KEY (id_particulier_id) REFERENCES particulier (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0E5805157 FOREIGN KEY (id_pro_id) REFERENCES pro (id)');
        $this->addSql('ALTER TABLE contact_particulier ADD CONSTRAINT FK_2686B4D95F8B361 FOREIGN KEY (id_particulier_id) REFERENCES particulier (id)');
        $this->addSql('ALTER TABLE contact_pro ADD CONSTRAINT FK_968EB7C7E5805157 FOREIGN KEY (id_pro_id) REFERENCES pro (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF095F8B361');
        $this->addSql('ALTER TABLE contact_particulier DROP FOREIGN KEY FK_2686B4D95F8B361');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0E5805157');
        $this->addSql('ALTER TABLE contact_pro DROP FOREIGN KEY FK_968EB7C7E5805157');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE contact_particulier');
        $this->addSql('DROP TABLE contact_pro');
        $this->addSql('DROP TABLE email_newsletter');
        $this->addSql('DROP TABLE particulier');
        $this->addSql('DROP TABLE pro');
        $this->addSql('DROP TABLE secteur_activite');
    }
}
