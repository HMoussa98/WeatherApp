<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418193405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY abonnement_ibfk_1');
        $this->addSql('ALTER TABLE abonnement CHANGE klant_id klant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB3C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE abonnement RENAME INDEX klant_id TO IDX_351268BB3C427B2F');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY contract_ibfk_1');
        $this->addSql('ALTER TABLE contract ADD contract_details VARCHAR(255) NOT NULL, DROP contractDetails, CHANGE klant_id klant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28593C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE contract RENAME INDEX klant_id TO IDX_E98F28593C427B2F');
        $this->addSql('ALTER TABLE klant ADD startdatum DATE NOT NULL, ADD einddatum DATE NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE telefoonnummer telefoonnummer VARCHAR(255) NOT NULL, CHANGE type type VARCHAR(255) NOT NULL, CHANGE contract_id status VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB3C427B2F');
        $this->addSql('ALTER TABLE abonnement CHANGE klant_id klant_id INT NOT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT abonnement_ibfk_1 FOREIGN KEY (klant_id) REFERENCES klant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement RENAME INDEX idx_351268bb3c427b2f TO klant_id');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28593C427B2F');
        $this->addSql('ALTER TABLE contract ADD contractDetails TEXT NOT NULL, DROP contract_details, CHANGE klant_id klant_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT contract_ibfk_1 FOREIGN KEY (klant_id) REFERENCES klant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contract RENAME INDEX idx_e98f28593c427b2f TO klant_id');
        $this->addSql('ALTER TABLE klant DROP startdatum, DROP einddatum, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE telefoonnummer telefoonnummer VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE status contract_id VARCHAR(255) NOT NULL');
    }
}
