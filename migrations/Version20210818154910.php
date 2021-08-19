<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210818154910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Commentary';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C0155143A76ED395');
        $this->addSql('DROP INDEX UNIQ_C015514316DB4F89');
        $this->addSql('DROP INDEX UNIQ_C0155143989D9B62');
        $this->addSql('CREATE TEMPORARY TABLE __temp__blog AS SELECT id, user_id, titlename, created_at, updated_at, slug, picture FROM blog');
        $this->addSql('DROP TABLE blog');
        $this->addSql('CREATE TABLE blog (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, titlename VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL COLLATE BINARY, picture VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_C0155143A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO blog (id, user_id, titlename, created_at, updated_at, slug, picture) SELECT id, user_id, titlename, created_at, updated_at, slug, picture FROM __temp__blog');
        $this->addSql('DROP TABLE __temp__blog');
        $this->addSql('CREATE INDEX IDX_C0155143A76ED395 ON blog (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C015514316DB4F89 ON blog (picture)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0155143989D9B62 ON blog (slug)');
        $this->addSql('DROP INDEX UNIQ_1CAC12CABDAFD8C8');
        $this->addSql('DROP INDEX IDX_1CAC12CA4B89032C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentary AS SELECT id, post_id, author, created_at, updated_at, comment FROM commentary');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('CREATE TABLE commentary (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, post_id INTEGER DEFAULT NULL, author VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, comment CLOB NOT NULL COLLATE BINARY, CONSTRAINT FK_1CAC12CA4B89032C FOREIGN KEY (post_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO commentary (id, post_id, author, created_at, updated_at, comment) SELECT id, post_id, author, created_at, updated_at, comment FROM __temp__commentary');
        $this->addSql('DROP TABLE __temp__commentary');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CAC12CABDAFD8C8 ON commentary (author)');
        $this->addSql('CREATE INDEX IDX_1CAC12CA4B89032C ON commentary (post_id)');
        $this->addSql('DROP INDEX IDX_5A8A6C8DDAE07E97');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8DBDAFD8C8');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D16DB4F89');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D989D9B62');
        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, blog_id, name, author, created_at, updated_at, slug, picture FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, blog_id INTEGER NOT NULL, name CLOB NOT NULL COLLATE BINARY, author VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL COLLATE BINARY, picture VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_5A8A6C8DDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO post (id, blog_id, name, author, created_at, updated_at, slug, picture) SELECT id, blog_id, name, author, created_at, updated_at, slug, picture FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DDAE07E97 ON post (blog_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8DBDAFD8C8 ON post (author)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D16DB4F89 ON post (picture)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D989D9B62 ON post (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_C015514316DB4F89');
        $this->addSql('DROP INDEX UNIQ_C0155143989D9B62');
        $this->addSql('DROP INDEX IDX_C0155143A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__blog AS SELECT id, user_id, titlename, picture, created_at, updated_at, slug FROM blog');
        $this->addSql('DROP TABLE blog');
        $this->addSql('CREATE TABLE blog (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, titlename VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO blog (id, user_id, titlename, picture, created_at, updated_at, slug) SELECT id, user_id, titlename, picture, created_at, updated_at, slug FROM __temp__blog');
        $this->addSql('DROP TABLE __temp__blog');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C015514316DB4F89 ON blog (picture)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0155143989D9B62 ON blog (slug)');
        $this->addSql('CREATE INDEX IDX_C0155143A76ED395 ON blog (user_id)');
        $this->addSql('DROP INDEX UNIQ_1CAC12CABDAFD8C8');
        $this->addSql('DROP INDEX IDX_1CAC12CA4B89032C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentary AS SELECT id, post_id, comment, author, created_at, updated_at FROM commentary');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('CREATE TABLE commentary (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, post_id INTEGER DEFAULT NULL, comment CLOB NOT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO commentary (id, post_id, comment, author, created_at, updated_at) SELECT id, post_id, comment, author, created_at, updated_at FROM __temp__commentary');
        $this->addSql('DROP TABLE __temp__commentary');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CAC12CABDAFD8C8 ON commentary (author)');
        $this->addSql('CREATE INDEX IDX_1CAC12CA4B89032C ON commentary (post_id)');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8DBDAFD8C8');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D16DB4F89');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D989D9B62');
        $this->addSql('DROP INDEX IDX_5A8A6C8DDAE07E97');
        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, blog_id, name, author, picture, created_at, updated_at, slug FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, blog_id INTEGER NOT NULL, name CLOB NOT NULL, author VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO post (id, blog_id, name, author, picture, created_at, updated_at, slug) SELECT id, blog_id, name, author, picture, created_at, updated_at, slug FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8DBDAFD8C8 ON post (author)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D16DB4F89 ON post (picture)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D989D9B62 ON post (slug)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DDAE07E97 ON post (blog_id)');
    }
}
