<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210815162554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add picture to blog';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog ADD picture VARCHAR (255)');
        $this->addSql('ALTER TABLE post ADD picture VARCHAR (255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP COLUMN picture');
        $this->addSql('ALTER TABLE post DROP COLUMN picture');
        }
}
