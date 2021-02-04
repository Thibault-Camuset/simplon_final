<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204103025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_item (id INT AUTO_INCREMENT NOT NULL, item_id_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(5000) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, slot VARCHAR(255) DEFAULT NULL, level INT DEFAULT NULL, attack INT DEFAULT NULL, defence INT DEFAULT NULL, hp INT DEFAULT NULL, strength INT DEFAULT NULL, dexterity INT DEFAULT NULL, constitution INT DEFAULT NULL, intelligence INT DEFAULT NULL, wisdom INT DEFAULT NULL, charisma INT DEFAULT NULL, value INT DEFAULT NULL, INDEX IDX_8E7318655E38587 (item_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) NOT NULL, type VARCHAR(255) NOT NULL, slot VARCHAR(255) DEFAULT NULL, level INT NOT NULL, attack INT DEFAULT NULL, defence INT DEFAULT NULL, hp INT DEFAULT NULL, strength INT DEFAULT NULL, dexterity INT DEFAULT NULL, constitution INT DEFAULT NULL, intelligence INT DEFAULT NULL, wisdom INT DEFAULT NULL, charisma INT DEFAULT NULL, value INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E7318655E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE `character` ADD weapon_right_slot_id INT DEFAULT NULL, ADD weapon_left_slot_id INT DEFAULT NULL, ADD body_armor_slot_id INT DEFAULT NULL, ADD head_slot_id INT DEFAULT NULL, ADD hand_slot_id INT DEFAULT NULL, ADD feet_slot_id INT DEFAULT NULL, ADD belt_slot_id INT DEFAULT NULL, ADD neck_slot_id INT DEFAULT NULL, ADD ring_right_slot_id INT DEFAULT NULL, ADD ring_left_slot_id INT DEFAULT NULL, ADD back_slot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034404DEC1A FOREIGN KEY (weapon_right_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0348A0409F7 FOREIGN KEY (weapon_left_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034EAC02744 FOREIGN KEY (body_armor_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03432D768D FOREIGN KEY (head_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03442FF5E82 FOREIGN KEY (hand_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0344F374798 FOREIGN KEY (feet_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B024572D FOREIGN KEY (belt_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034375CCC81 FOREIGN KEY (neck_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03439DB48D3 FOREIGN KEY (ring_right_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034C01864FE FOREIGN KEY (ring_left_slot_id) REFERENCES character_item (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034828FF282 FOREIGN KEY (back_slot_id) REFERENCES character_item (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034404DEC1A ON `character` (weapon_right_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB0348A0409F7 ON `character` (weapon_left_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034EAC02744 ON `character` (body_armor_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB03432D768D ON `character` (head_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB03442FF5E82 ON `character` (hand_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB0344F374798 ON `character` (feet_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034B024572D ON `character` (belt_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034375CCC81 ON `character` (neck_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB03439DB48D3 ON `character` (ring_right_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034C01864FE ON `character` (ring_left_slot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034828FF282 ON `character` (back_slot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034404DEC1A');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0348A0409F7');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034EAC02744');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03432D768D');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03442FF5E82');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0344F374798');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B024572D');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034375CCC81');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03439DB48D3');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034C01864FE');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034828FF282');
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E7318655E38587');
        $this->addSql('DROP TABLE character_item');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP INDEX UNIQ_937AB034404DEC1A ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB0348A0409F7 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034EAC02744 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB03432D768D ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB03442FF5E82 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB0344F374798 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034B024572D ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034375CCC81 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB03439DB48D3 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034C01864FE ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034828FF282 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP weapon_right_slot_id, DROP weapon_left_slot_id, DROP body_armor_slot_id, DROP head_slot_id, DROP hand_slot_id, DROP feet_slot_id, DROP belt_slot_id, DROP neck_slot_id, DROP ring_right_slot_id, DROP ring_left_slot_id, DROP back_slot_id');
    }
}
