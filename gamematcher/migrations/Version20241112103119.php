<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112103119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cpulist (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(300) NOT NULL, core INT NOT NULL, manufacturer VARCHAR(300) NOT NULL, cpuscore INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gpulist (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(300) NOT NULL, vram INT NOT NULL, manufacturer VARCHAR(300) NOT NULL, gpuscore INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE myspecs (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, cpu_id_id INT DEFAULT NULL, gpu_id_id INT DEFAULT NULL, ram_id_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_47AD85F89D86650F (user_id_id), UNIQUE INDEX UNIQ_47AD85F8D55914BB (cpu_id_id), UNIQUE INDEX UNIQ_47AD85F888B545B7 (gpu_id_id), UNIQUE INDEX UNIQ_47AD85F88AC2A195 (ram_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ramlist (id INT AUTO_INCREMENT NOT NULL, technology VARCHAR(300) NOT NULL, memory VARCHAR(300) NOT NULL, frequency VARCHAR(300) NOT NULL, ramscore INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE myspecs ADD CONSTRAINT FK_47AD85F89D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE myspecs ADD CONSTRAINT FK_47AD85F8D55914BB FOREIGN KEY (cpu_id_id) REFERENCES cpulist (id)');
        $this->addSql('ALTER TABLE myspecs ADD CONSTRAINT FK_47AD85F888B545B7 FOREIGN KEY (gpu_id_id) REFERENCES gpulist (id)');
        $this->addSql('ALTER TABLE myspecs ADD CONSTRAINT FK_47AD85F88AC2A195 FOREIGN KEY (ram_id_id) REFERENCES ramlist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE myspecs DROP FOREIGN KEY FK_47AD85F89D86650F');
        $this->addSql('ALTER TABLE myspecs DROP FOREIGN KEY FK_47AD85F8D55914BB');
        $this->addSql('ALTER TABLE myspecs DROP FOREIGN KEY FK_47AD85F888B545B7');
        $this->addSql('ALTER TABLE myspecs DROP FOREIGN KEY FK_47AD85F88AC2A195');
        $this->addSql('DROP TABLE cpulist');
        $this->addSql('DROP TABLE gpulist');
        $this->addSql('DROP TABLE myspecs');
        $this->addSql('DROP TABLE ramlist');
    }
}
