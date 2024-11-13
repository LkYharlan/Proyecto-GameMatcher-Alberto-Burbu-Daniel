<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113151801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videogames DROP INDEX UNIQ_A59106F6DAC91B76, ADD INDEX IDX_A59106F6DAC91B76 (gpurequirement_id)');
        $this->addSql('ALTER TABLE videogames DROP INDEX UNIQ_A59106F6A9C13CB9, ADD INDEX IDX_A59106F6A9C13CB9 (cpurequirement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videogames DROP INDEX IDX_A59106F6A9C13CB9, ADD UNIQUE INDEX UNIQ_A59106F6A9C13CB9 (cpurequirement_id)');
        $this->addSql('ALTER TABLE videogames DROP INDEX IDX_A59106F6DAC91B76, ADD UNIQUE INDEX UNIQ_A59106F6DAC91B76 (gpurequirement_id)');
    }
}
