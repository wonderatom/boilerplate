<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200905173159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("SELECT NEXTVAL('hangars_id_seq')");
        $this->addSql("INSERT INTO hangars (id, name) VALUES (CURRVAL('hangars_id_seq'), 'Aeropakt')");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Aeroprakt A-24')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Aeroprakt A-24')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Aeroprakt A-24')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Aeroprakt A-24')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Aeroprakt A-24')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Curtiss NC-4')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Curtiss NC-4')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Curtiss NC-4')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Boeing 747')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

        $this->addSql("INSERT INTO airplanes (id, name) VALUES (NEXTVAL('airplanes_id_seq'), 'Boeing 747')");
        $this->addSql("INSERT INTO hangars_airplanes (airplane_id, hangar_id) VALUES (CURRVAL('airplanes_id_seq'), CURRVAL('hangars_id_seq'))");

    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM hangars_airplanes');
        $this->addSql('DELETE FROM airplanes');
        $this->addSql('DELETE FROM hangars');
    }
}
