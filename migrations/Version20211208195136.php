<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208195136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP CONSTRAINT fk_23a0e66b5a459a0');
        $this->addSql('DROP SEQUENCE news_id_seq CASCADE');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP INDEX idx_23a0e66b5a459a0');
        $this->addSql('ALTER TABLE article ADD is_show BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE article ADD content TEXT NOT NULL');
        $this->addSql('ALTER TABLE article DROP news_id');
        $this->addSql('ALTER TABLE article DROP text');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE news_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE news (id INT NOT NULL, title VARCHAR(255) NOT NULL, is_show BOOLEAN NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE article ADD news_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD text VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article DROP is_show');
        $this->addSql('ALTER TABLE article DROP content');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT fk_23a0e66b5a459a0 FOREIGN KEY (news_id) REFERENCES news (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_23a0e66b5a459a0 ON article (news_id)');
    }
}
