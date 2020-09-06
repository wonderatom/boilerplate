<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200905173001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE airplanes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hangars_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE hangars (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX name_idx ON hangars (name)');
        $this->addSql('CREATE TABLE airplanes (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hangars_airplanes (hangar_id INT NOT NULL, airplane_id INT NOT NULL, PRIMARY KEY(hangar_id, airplane_id))');
        $this->addSql('CREATE INDEX IDX_15BC9132FEFB5A5 ON hangars_airplanes (hangar_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_15BC913996E853C ON hangars_airplanes (airplane_id)');
        $this->addSql('ALTER TABLE hangars_airplanes ADD CONSTRAINT FK_15BC9132FEFB5A5 FOREIGN KEY (hangar_id) REFERENCES hangars (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hangars_airplanes ADD CONSTRAINT FK_15BC913996E853C FOREIGN KEY (airplane_id) REFERENCES airplanes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE hangars_airplanes DROP CONSTRAINT FK_15BC913996E853C');
        $this->addSql('ALTER TABLE hangars_airplanes DROP CONSTRAINT FK_15BC9132FEFB5A5');
        $this->addSql('DROP SEQUENCE airplanes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hangars_id_seq CASCADE');
        $this->addSql('DROP TABLE airplanes');
        $this->addSql('DROP TABLE hangars');
        $this->addSql('DROP TABLE hangars_airplanes');
    }
}
