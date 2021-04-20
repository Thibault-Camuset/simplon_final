<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204110904 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_item ADD save_id INT NOT NULL');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E73186602EC74B FOREIGN KEY (save_id) REFERENCES game_save (id)');
        $this->addSql('CREATE INDEX IDX_8E73186602EC74B ON character_item (save_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E73186602EC74B');
        $this->addSql('DROP INDEX IDX_8E73186602EC74B ON character_item');
        $this->addSql('ALTER TABLE character_item DROP save_id');
    }
}
