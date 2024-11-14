<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114113848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE myspecs DROP FOREIGN KEY FK_47AD85F89D86650F');
        $this->addSql('DROP INDEX UNIQ_47AD85F89D86650F ON myspecs');
        $this->addSql('ALTER TABLE myspecs DROP user_id_id, CHANGE cpu_id_id cpu_id_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE myspecs ADD user_id_id INT NOT NULL, CHANGE cpu_id_id cpu_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE myspecs ADD CONSTRAINT FK_47AD85F89D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_47AD85F89D86650F ON myspecs (user_id_id)');
    }
}
