<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810125903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add User';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C0155143A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__blog AS SELECT id, user_id, titlename FROM blog');
        $this->addSql('DROP TABLE blog');
        $this->addSql('CREATE TABLE blog (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, titlename VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_C0155143A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO blog (id, user_id, titlename) SELECT id, user_id, titlename FROM __temp__blog');
        $this->addSql('DROP TABLE __temp__blog');
        $this->addSql('CREATE INDEX IDX_C0155143A76ED395 ON blog (user_id)');
        $this->addSql('ALTER TABLE user ADD COLUMN created_at DATETIME');
        $this->addSql('ALTER TABLE user ADD COLUMN updated_at DATETIME');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C0155143A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__blog AS SELECT id, user_id, titlename FROM blog');
        $this->addSql('DROP TABLE blog');
        $this->addSql('CREATE TABLE blog (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, titlename VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO blog (id, user_id, titlename) SELECT id, user_id, titlename FROM __temp__blog');
        $this->addSql('DROP TABLE __temp__blog');
        $this->addSql('CREATE INDEX IDX_C0155143A76ED395 ON blog (user_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, password FROM "user"');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO "user" (id, username, password) SELECT id, username, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
