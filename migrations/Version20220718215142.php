<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718215142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion_item_item (champion_item_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_94EA6C2C91136FF3 (champion_item_id), INDEX IDX_94EA6C2C126F525E (item_id), PRIMARY KEY(champion_item_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion_item_item ADD CONSTRAINT FK_94EA6C2C91136FF3 FOREIGN KEY (champion_item_id) REFERENCES champion_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item_item ADD CONSTRAINT FK_94EA6C2C126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item DROP FOREIGN KEY FK_D34BA4A7126F525E');
        $this->addSql('DROP INDEX IDX_D34BA4A7126F525E ON champion_item');
        $this->addSql('ALTER TABLE champion_item DROP item_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE champion_item_item');
        $this->addSql('ALTER TABLE champion_item ADD item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champion_item ADD CONSTRAINT FK_D34BA4A7126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_D34BA4A7126F525E ON champion_item (item_id)');
    }
}
