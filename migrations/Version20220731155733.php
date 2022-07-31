<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220731155733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_item (item_source INT NOT NULL, item_target INT NOT NULL, INDEX IDX_D72B61E5D9730ABC (item_source), INDEX IDX_D72B61E5C0965A33 (item_target), PRIMARY KEY(item_source, item_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_item ADD CONSTRAINT FK_D72B61E5D9730ABC FOREIGN KEY (item_source) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_item ADD CONSTRAINT FK_D72B61E5C0965A33 FOREIGN KEY (item_target) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE item_item');
    }
}
