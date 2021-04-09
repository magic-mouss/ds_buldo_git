<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210409074843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches ADD user_id INT DEFAULT NULL, ADD priorite_id INT DEFAULT NULL, ADD description VARCHAR(255) NOT NULL, ADD date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD9853B4F1DE FOREIGN KEY (priorite_id) REFERENCES priorite (id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD98A76ED395 ON taches (user_id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD9853B4F1DE ON taches (priorite_id)');
        $this->addSql('ALTER TABLE user CHANGE role role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98A76ED395');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD9853B4F1DE');
        $this->addSql('DROP INDEX IDX_3BF2CD98A76ED395 ON taches');
        $this->addSql('DROP INDEX IDX_3BF2CD9853B4F1DE ON taches');
        $this->addSql('ALTER TABLE taches DROP user_id, DROP priorite_id, DROP description, DROP date');
        $this->addSql('ALTER TABLE user CHANGE role role INT NOT NULL');
    }
}
