<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415094458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact_particulier CHANGE id_particulier_id id_particulier_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE contact_pro CHANGE id_pro_id id_pro_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE pro CHANGE page_facebook page_facebook VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact_particulier CHANGE id_particulier_id id_particulier_id INT NOT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE contact_pro CHANGE id_pro_id id_pro_id INT NOT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE pro CHANGE page_facebook page_facebook VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
