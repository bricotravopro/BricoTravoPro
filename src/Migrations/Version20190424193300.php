<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190424193300 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact_mail ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact_particulier DROP FOREIGN KEY FK_2686B4D95F8B361');
        $this->addSql('DROP INDEX IDX_2686B4D95F8B361 ON contact_particulier');
        $this->addSql('ALTER TABLE contact_particulier ADD id_particulier INT NOT NULL, DROP id_particulier_id');
        $this->addSql('ALTER TABLE contact_pro DROP FOREIGN KEY FK_968EB7C7E5805157');
        $this->addSql('DROP INDEX IDX_968EB7C7E5805157 ON contact_pro');
        $this->addSql('ALTER TABLE contact_pro ADD id_pro INT NOT NULL, DROP id_pro_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact_mail DROP email');
        $this->addSql('ALTER TABLE contact_particulier ADD id_particulier_id INT DEFAULT NULL, DROP id_particulier');
        $this->addSql('ALTER TABLE contact_particulier ADD CONSTRAINT FK_2686B4D95F8B361 FOREIGN KEY (id_particulier_id) REFERENCES particulier (id)');
        $this->addSql('CREATE INDEX IDX_2686B4D95F8B361 ON contact_particulier (id_particulier_id)');
        $this->addSql('ALTER TABLE contact_pro ADD id_pro_id INT DEFAULT NULL, DROP id_pro');
        $this->addSql('ALTER TABLE contact_pro ADD CONSTRAINT FK_968EB7C7E5805157 FOREIGN KEY (id_pro_id) REFERENCES pro (id)');
        $this->addSql('CREATE INDEX IDX_968EB7C7E5805157 ON contact_pro (id_pro_id)');
    }
}
