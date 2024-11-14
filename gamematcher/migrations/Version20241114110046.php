<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114110046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE myspecs DROP INDEX UNIQ_47AD85F888B545B7, ADD INDEX IDX_47AD85F888B545B7 (gpu_id_id)');
        $this->addSql('ALTER TABLE myspecs DROP INDEX UNIQ_47AD85F8D55914BB, ADD INDEX IDX_47AD85F8D55914BB (cpu_id_id)');
        $this->addSql('ALTER TABLE myspecs DROP INDEX UNIQ_47AD85F88AC2A195, ADD INDEX IDX_47AD85F88AC2A195 (ram_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE myspecs DROP INDEX IDX_47AD85F8D55914BB, ADD UNIQUE INDEX UNIQ_47AD85F8D55914BB (cpu_id_id)');
        $this->addSql('ALTER TABLE myspecs DROP INDEX IDX_47AD85F888B545B7, ADD UNIQUE INDEX UNIQ_47AD85F888B545B7 (gpu_id_id)');
        $this->addSql('ALTER TABLE myspecs DROP INDEX IDX_47AD85F88AC2A195, ADD UNIQUE INDEX UNIQ_47AD85F88AC2A195 (ram_id_id)');
    }
}
