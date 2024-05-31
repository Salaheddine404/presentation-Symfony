<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506141946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, utulisateur_id INT NOT NULL, service_id INT NOT NULL, demande VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_6DE44026F29A4132 (utulisateur_id), INDEX IDX_6DE44026ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, reciever_id INT NOT NULL, content VARCHAR(255) NOT NULL, sent_at DATETIME NOT NULL, INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307F5D5C928D (reciever_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rnd_vs (id INT AUTO_INCREMENT NOT NULL, utulisateur_id INT NOT NULL, service_id INT NOT NULL, dat_time DATETIME NOT NULL, reminder VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_B2E7336AF29A4132 (utulisateur_id), INDEX IDX_B2E7336AED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utulisateur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE44026F29A4132 FOREIGN KEY (utulisateur_id) REFERENCES utulisateur (id)');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE44026ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES utulisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F5D5C928D FOREIGN KEY (reciever_id) REFERENCES utulisateur (id)');
        $this->addSql('ALTER TABLE rnd_vs ADD CONSTRAINT FK_B2E7336AF29A4132 FOREIGN KEY (utulisateur_id) REFERENCES utulisateur (id)');
        $this->addSql('ALTER TABLE rnd_vs ADD CONSTRAINT FK_B2E7336AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE44026F29A4132');
        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE44026ED5CA9E6');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F5D5C928D');
        $this->addSql('ALTER TABLE rnd_vs DROP FOREIGN KEY FK_B2E7336AF29A4132');
        $this->addSql('ALTER TABLE rnd_vs DROP FOREIGN KEY FK_B2E7336AED5CA9E6');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE rnd_vs');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE utulisateur');
    }
}
