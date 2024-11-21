<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112105101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, videogame_id_id INT NOT NULL, text VARCHAR(1000) NOT NULL, INDEX IDX_5F9E962A9D86650F (user_id_id), INDEX IDX_5F9E962AC2943B50 (videogame_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, videogames_id INT NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_835033F865ACEA3 (videogames_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, videogame_id_id INT NOT NULL, trailer VARCHAR(500) DEFAULT NULL, score INT NOT NULL, description VARCHAR(10000) DEFAULT NULL, UNIQUE INDEX UNIQ_794381C6C2943B50 (videogame_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videogames (id INT AUTO_INCREMENT NOT NULL, ramrequirement_id INT NOT NULL, cpurequirement_id INT NOT NULL, gpurequirement_id INT NOT NULL, platform VARCHAR(300) NOT NULL, name VARCHAR(300) NOT NULL, UNIQUE INDEX UNIQ_A59106F6FA929240 (ramrequirement_id), UNIQUE INDEX UNIQ_A59106F6A9C13CB9 (cpurequirement_id), UNIQUE INDEX UNIQ_A59106F6DAC91B76 (gpurequirement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AC2943B50 FOREIGN KEY (videogame_id_id) REFERENCES videogames (id)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F865ACEA3 FOREIGN KEY (videogames_id) REFERENCES videogames (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6C2943B50 FOREIGN KEY (videogame_id_id) REFERENCES videogames (id)');
        $this->addSql('ALTER TABLE videogames ADD CONSTRAINT FK_A59106F6FA929240 FOREIGN KEY (ramrequirement_id) REFERENCES ramlist (id)');
        $this->addSql('ALTER TABLE videogames ADD CONSTRAINT FK_A59106F6A9C13CB9 FOREIGN KEY (cpurequirement_id) REFERENCES cpulist (id)');
        $this->addSql('ALTER TABLE videogames ADD CONSTRAINT FK_A59106F6DAC91B76 FOREIGN KEY (gpurequirement_id) REFERENCES gpulist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A9D86650F');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AC2943B50');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F865ACEA3');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6C2943B50');
        $this->addSql('ALTER TABLE videogames DROP FOREIGN KEY FK_A59106F6FA929240');
        $this->addSql('ALTER TABLE videogames DROP FOREIGN KEY FK_A59106F6A9C13CB9');
        $this->addSql('ALTER TABLE videogames DROP FOREIGN KEY FK_A59106F6DAC91B76');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE videogames');
    }
}
