<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260921145949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizzas ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pizzas ADD CONSTRAINT FK_C6CC6E40A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_C6CC6E40A21214B7 ON pizzas (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizzas DROP FOREIGN KEY FK_C6CC6E40A21214B7');
        $this->addSql('DROP INDEX IDX_C6CC6E40A21214B7 ON pizzas');
        $this->addSql('ALTER TABLE pizzas DROP categories_id');
    }
}
