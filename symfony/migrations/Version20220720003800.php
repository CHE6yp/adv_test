<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720003800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE audio_book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE audio_book (id INT NOT NULL, available BOOLEAN NOT NULL, url VARCHAR(2047) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, currency_id VARCHAR(255) DEFAULT NULL, category_id INT DEFAULT NULL, picture VARCHAR(2047) DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, publisher VARCHAR(255) DEFAULT NULL, series TEXT DEFAULT NULL, isbn VARCHAR(255) DEFAULT NULL, performed_by VARCHAR(255) DEFAULT NULL, format VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, downloadable BOOLEAN DEFAULT NULL, age INT DEFAULT NULL, lang VARCHAR(255) DEFAULT NULL, formats VARCHAR(255) DEFAULT NULL, fragment VARCHAR(2047) DEFAULT NULL, litres_isbn VARCHAR(255) DEFAULT NULL, genres_list TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE audio_book_id_seq CASCADE');
        $this->addSql('CREATE TABLE xmldata (data VARCHAR(255) DEFAULT NULL)');
        $this->addSql('DROP TABLE audio_book');
    }
}
