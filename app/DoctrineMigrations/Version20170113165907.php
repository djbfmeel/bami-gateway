<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170113165907 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE api_ai_log (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, method VARCHAR(10) NOT NULL, url VARCHAR(200) NOT NULL, ip VARCHAR(50) NOT NULL, headers LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', body LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\', response_code INT UNSIGNED NOT NULL, response_headers LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', response_body LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE api_ai_log');
    }
}
