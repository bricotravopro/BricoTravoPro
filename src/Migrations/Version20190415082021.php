<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415082021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE particulier ADD ville VARCHAR(255) NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(16) NOT NULL');
        $this->addSql('ALTER TABLE pro ADD ville VARCHAR(255) NOT NULL, CHANGE site_web site_web VARCHAR(255) NOT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(16) NOT NULL, CHANGE page_facebook page_facebook VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE particulier DROP ville, CHANGE mot_de_passe mot_de_passe VARCHAR(32) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pro DROP ville, CHANGE site_web site_web VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE mot_de_passe mot_de_passe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE page_facebook page_facebook VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
