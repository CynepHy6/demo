<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200505172600 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE pizza_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pizza (id SERIAL NOT NULL, type INT NOT NULL UNIQUE, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO pizza (type, price) VALUES (1, 100)'); // BASE = 1
        $this->addSql('INSERT INTO pizza (type, price) VALUES (2, 50)');  // FAT = 2;
        $this->addSql('INSERT INTO pizza (type, price) VALUES (3, 40)'); // SLIM = 3;
        $this->addSql('INSERT INTO pizza (type, price) VALUES (4, 30)'); // CHEESE = 4;
        $this->addSql('INSERT INTO pizza (type, price) VALUES (5, 60)'); // BECON = 5;
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE pizza_id_seq CASCADE');
        $this->addSql('DROP TABLE pizza');
    }
}
