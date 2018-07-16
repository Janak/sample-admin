<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180716112137 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE page ADD is_active TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE page_translations CHANGE object_id object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension JSON DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE delete_at delete_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE ext_log_entries CHANGE object_id object_id VARCHAR(64) DEFAULT NULL, CHANGE data data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE username username VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ext_log_entries CHANGE object_id object_id VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE data data LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE page DROP is_active');
        $this->addSql('ALTER TABLE page_translations CHANGE object_id object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE delete_at delete_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin');
    }
}
