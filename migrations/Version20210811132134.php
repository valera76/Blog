<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811132134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add slug to blog and post';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog ADD slug VARCHAR (255)');
        $this->addSql("UPDATE blog SET slug=REPLACE(LOWER(titlename), ' ', '-')");
        $this->addSql('ALTER TABLE post ADD slug VARCHAR (255)');
        $this->addSql("UPDATE post SET slug=REPLACE(LOWER(name), ' ', '-')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP COLUMN slug');
        $this->addSql('ALTER TABLE post DROP COLUMN slug');
    }
}
