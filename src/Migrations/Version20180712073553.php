<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180712073553 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_users ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE username username VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension JSON DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE delete_at delete_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_users DROP roles, CHANGE username username VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(254) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE report_time_seriese CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE delete_at delete_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE report_total_aggregation CHANGE count count BIGINT DEFAULT NULL, CHANGE dimension dimension LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin');
    }
}
