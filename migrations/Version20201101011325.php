<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101011325 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address MODIFY addressId INT NOT NULL');
        $this->addSql('ALTER TABLE address DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE address ADD address_id INT NOT NULL, ADD street_address1 VARCHAR(255) DEFAULT NULL, ADD street_address2 VARCHAR(255) DEFAULT NULL, DROP streetAddress1, DROP streetAddress2, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL, CHANGE zip zip INT DEFAULT NULL, CHANGE longitude longitude VARCHAR(255) DEFAULT NULL, CHANGE latitude latitude VARCHAR(255) DEFAULT NULL, CHANGE addressid id INT AUTO_INCREMENT NOT NULL, CHANGE userid user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX email_address_UNIQUE ON users');
        $this->addSql('ALTER TABLE users DROP password, CHANGE emailAddress emailAddress VARCHAR(255) NOT NULL, CHANGE firstName firstName VARCHAR(255) NOT NULL, CHANGE lastName lastName VARCHAR(255) NOT NULL, CHANGE creationDate creationDate VARCHAR(255) NOT NULL, CHANGE badLoginCount badLoginCount VARCHAR(255) NOT NULL, CHANGE lastLogin lastLogin VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE address DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE address ADD streetAddress1 VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, ADD streetAddress2 VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, DROP address_id, DROP street_address1, DROP street_address2, CHANGE city city VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state state VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE zip zip VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE latitude latitude VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE longitude longitude VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE id addressId INT AUTO_INCREMENT NOT NULL, CHANGE user_id userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD PRIMARY KEY (addressId)');
        $this->addSql('ALTER TABLE users ADD password VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE emailAddress emailAddress VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE firstName firstName VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE lastName lastName VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE creationDate creationDate DATETIME DEFAULT NULL, CHANGE lastLogin lastLogin DATE DEFAULT NULL, CHANGE badLoginCount badLoginCount INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX email_address_UNIQUE ON users (emailAddress)');
    }
}
