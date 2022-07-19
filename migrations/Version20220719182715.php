<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719182715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion_item_position (id INT AUTO_INCREMENT NOT NULL, champion_item_id INT NOT NULL, position SMALLINT NOT NULL, UNIQUE INDEX UNIQ_1488E8C491136FF3 (champion_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion_item_position_item (champion_item_position_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_8CE8EFA48523894E (champion_item_position_id), INDEX IDX_8CE8EFA4126F525E (item_id), PRIMARY KEY(champion_item_position_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion_item_position ADD CONSTRAINT FK_1488E8C491136FF3 FOREIGN KEY (champion_item_id) REFERENCES champion_item (id)');
        $this->addSql('ALTER TABLE champion_item_position_item ADD CONSTRAINT FK_8CE8EFA48523894E FOREIGN KEY (champion_item_position_id) REFERENCES champion_item_position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item_position_item ADD CONSTRAINT FK_8CE8EFA4126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion_item_position_item DROP FOREIGN KEY FK_8CE8EFA48523894E');
        $this->addSql('DROP TABLE champion_item_position');
        $this->addSql('DROP TABLE champion_item_position_item');
    }
}
