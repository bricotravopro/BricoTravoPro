<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190417100535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE secteur_activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE particulier CHANGE mot_de_passe mot_de_passe VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pro CHANGE mot_de_passe mot_de_passe VARCHAR(255) NOT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6BB4D6FF6C6E55B5 ON pro (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6BB4D6FFE7927C74 ON pro (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE secteur_activite');
        $this->addSql('ALTER TABLE particulier CHANGE mot_de_passe mot_de_passe VARCHAR(16) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_6BB4D6FF6C6E55B5 ON pro');
        $this->addSql('DROP INDEX UNIQ_6BB4D6FFE7927C74 ON pro');
        $this->addSql('ALTER TABLE pro CHANGE mot_de_passe mot_de_passe VARCHAR(16) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE logo logo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
