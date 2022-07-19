<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719184756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE champion_item_position_item');
        $this->addSql('ALTER TABLE champion_item_position DROP INDEX UNIQ_1488E8C491136FF3, ADD INDEX IDX_1488E8C491136FF3 (champion_item_id)');
        $this->addSql('ALTER TABLE champion_item_position ADD item_id INT NOT NULL');
        $this->addSql('ALTER TABLE champion_item_position ADD CONSTRAINT FK_1488E8C4126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_1488E8C4126F525E ON champion_item_position (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion_item_position_item (champion_item_position_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_8CE8EFA48523894E (champion_item_position_id), INDEX IDX_8CE8EFA4126F525E (item_id), PRIMARY KEY(champion_item_position_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE champion_item_position_item ADD CONSTRAINT FK_8CE8EFA4126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item_position_item ADD CONSTRAINT FK_8CE8EFA48523894E FOREIGN KEY (champion_item_position_id) REFERENCES champion_item_position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_item_position DROP INDEX IDX_1488E8C491136FF3, ADD UNIQUE INDEX UNIQ_1488E8C491136FF3 (champion_item_id)');
        $this->addSql('ALTER TABLE champion_item_position DROP FOREIGN KEY FK_1488E8C4126F525E');
        $this->addSql('DROP INDEX IDX_1488E8C4126F525E ON champion_item_position');
        $this->addSql('ALTER TABLE champion_item_position DROP item_id');
    }
}
