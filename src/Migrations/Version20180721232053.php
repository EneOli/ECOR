<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180721232053 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE anlage (id INT AUTO_INCREMENT NOT NULL, crane_id INT DEFAULT NULL, manufactor VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, manufactor_crane_number LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', lifting_gear_factory_number VARCHAR(255) DEFAULT NULL, engine_group VARCHAR(255) DEFAULT NULL, rope_model INT DEFAULT NULL, rope_diameter DOUBLE PRECISION DEFAULT NULL, rope_length DOUBLE PRECISION DEFAULT NULL, control VARCHAR(255) DEFAULT NULL, load_capacity_cat DOUBLE PRECISION DEFAULT NULL, load_capacity_bridge DOUBLE PRECISION DEFAULT NULL, total_weight DOUBLE PRECISION DEFAULT NULL, span DOUBLE PRECISION DEFAULT NULL, impeller_diameter_cat DOUBLE PRECISION DEFAULT NULL, impeller_diameter_crane DOUBLE PRECISION DEFAULT NULL, hall_number INT DEFAULT NULL, field_of_activity VARCHAR(255) DEFAULT NULL, constrution_year INT DEFAULT NULL, overhaul VARCHAR(255) DEFAULT NULL, proportion_of_overhaul VARCHAR(255) DEFAULT NULL, remarks VARCHAR(2000) DEFAULT NULL, crane_designation VARCHAR(255) DEFAULT NULL, lifting_gear_designation VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, files LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE anlage');
    }
}
