<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200201213556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, title, created, modified, user_id, pdf_filename FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, created DATETIME NOT NULL, modified DATETIME DEFAULT NULL, user_id INTEGER NOT NULL, pdf_filename VARCHAR(255) DEFAULT NULL COLLATE BINARY, pdf_link VARCHAR(255) DEFAULT NULL, thumbnail_file_name VARCHAR(255) DEFAULT NULL, thumbnail_link VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO document (id, title, created, modified, user_id, pdf_filename) SELECT id, title, created, modified, user_id, pdf_filename FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, title, created, modified, user_id, pdf_filename FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created DATETIME NOT NULL, modified DATETIME DEFAULT NULL, user_id INTEGER NOT NULL, pdf_filename VARCHAR(255) DEFAULT NULL, file VARCHAR(255) NOT NULL COLLATE BINARY, thumbnail VARCHAR(255) DEFAULT NULL COLLATE BINARY, link VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO document (id, title, created, modified, user_id, pdf_filename) SELECT id, title, created, modified, user_id, pdf_filename FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
    }
}
