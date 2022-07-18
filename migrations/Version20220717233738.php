<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220717233738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE champion_item');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion_item (champion_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_D34BA4A7FA7FD7EB (champion_id), INDEX IDX_D34BA4A7126F525E (item_id), PRIMARY KEY(champion_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE champion_item ADD CONSTRAINT FK_D34BA4A7FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item ADD CONSTRAINT FK_D34BA4A7126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
    }
}
