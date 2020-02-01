<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200201203238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE document ADD COLUMN pdf_filename VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, title, file, thumbnail, created, modified, user_id, link FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, modified DATETIME DEFAULT NULL, user_id INTEGER NOT NULL, link VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO document (id, title, file, thumbnail, created, modified, user_id, link) SELECT id, title, file, thumbnail, created, modified, user_id, link FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
    }
}
