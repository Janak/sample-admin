<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180712070045 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(254) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C2502824F85E0677 (username), UNIQUE INDEX UNIQ_C2502824E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE report');
        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension JSON DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE delete_at delete_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, date TIME NOT NULL, dimension_1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, dimension_1_val VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, dimension_2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, dimension_2_val VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, dimension_3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, dimension_3_val VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, tname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE delete_at delete_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin');
    }
}
