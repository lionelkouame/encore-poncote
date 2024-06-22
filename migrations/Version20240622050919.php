<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622050919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE singing_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE singing_type (id INT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, is_church BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE singing_type_singing (singing_type_id INT NOT NULL, singing_id INT NOT NULL, PRIMARY KEY(singing_type_id, singing_id))');
        $this->addSql('CREATE INDEX IDX_28C3C44B423552A6 ON singing_type_singing (singing_type_id)');
        $this->addSql('CREATE INDEX IDX_28C3C44BB34CE5D6 ON singing_type_singing (singing_id)');
        $this->addSql('ALTER TABLE singing_type_singing ADD CONSTRAINT FK_28C3C44B423552A6 FOREIGN KEY (singing_type_id) REFERENCES singing_type (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE singing_type_singing ADD CONSTRAINT FK_28C3C44BB34CE5D6 FOREIGN KEY (singing_id) REFERENCES singing (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE singing_type_id_seq CASCADE');
        $this->addSql('ALTER TABLE singing_type_singing DROP CONSTRAINT FK_28C3C44B423552A6');
        $this->addSql('ALTER TABLE singing_type_singing DROP CONSTRAINT FK_28C3C44BB34CE5D6');
        $this->addSql('DROP TABLE singing_type');
        $this->addSql('DROP TABLE singing_type_singing');
    }
}
