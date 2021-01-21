<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121141246 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03442E3EB37');
        $this->addSql('DROP INDEX IDX_937AB03442E3EB37 ON `character`');
        $this->addSql('ALTER TABLE `character` ADD level INT NOT NULL, ADD strength INT NOT NULL, ADD dexterity INT NOT NULL, ADD constitution INT NOT NULL, ADD intelligence INT NOT NULL, ADD wisdom INT NOT NULL, ADD charisma INT NOT NULL, ADD max_hp INT NOT NULL, DROP character_level, DROP character_strength, DROP character_dexterity, DROP character_constitution, DROP character_intelligence, DROP character_wisdom, DROP character_charisma, DROP character_max_hp, CHANGE save_id_id save_id INT DEFAULT NULL, CHANGE character_name name VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034602EC74B FOREIGN KEY (save_id) REFERENCES game_save (id)');
        $this->addSql('CREATE INDEX IDX_937AB034602EC74B ON `character` (save_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034602EC74B');
        $this->addSql('DROP INDEX IDX_937AB034602EC74B ON `character`');
        $this->addSql('ALTER TABLE `character` ADD character_level INT NOT NULL, ADD character_strength INT NOT NULL, ADD character_dexterity INT NOT NULL, ADD character_constitution INT NOT NULL, ADD character_intelligence INT NOT NULL, ADD character_wisdom INT NOT NULL, ADD character_charisma INT NOT NULL, ADD character_max_hp INT NOT NULL, DROP level, DROP strength, DROP dexterity, DROP constitution, DROP intelligence, DROP wisdom, DROP charisma, DROP max_hp, CHANGE save_id save_id_id INT DEFAULT NULL, CHANGE name character_name VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03442E3EB37 FOREIGN KEY (save_id_id) REFERENCES game_save (id)');
        $this->addSql('CREATE INDEX IDX_937AB03442E3EB37 ON `character` (save_id_id)');
    }
}
