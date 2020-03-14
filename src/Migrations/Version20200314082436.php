<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314082436 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE new_project CHANGE intro intro VARCHAR(255) DEFAULT NULL, CHANGE plotas plotas VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE property ADD rajonas VARCHAR(255) DEFAULT NULL, CHANGE gatve gatve VARCHAR(255) DEFAULT NULL, CHANGE plotas plotas INT DEFAULT NULL, CHANGE kambariu_skaicius kambariu_skaicius INT DEFAULT NULL, CHANGE miestas miestas VARCHAR(255) DEFAULT NULL, CHANGE butonr butonr VARCHAR(255) DEFAULT NULL, CHANGE aukstas aukstas INT DEFAULT NULL, CHANGE irengimas irengimas VARCHAR(255) DEFAULT NULL, CHANGE kaina kaina INT DEFAULT NULL, CHANGE nuotraukos nuotraukos VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE new_project CHANGE intro intro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE plotas plotas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE property DROP rajonas, CHANGE gatve gatve VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE plotas plotas INT DEFAULT NULL, CHANGE kambariu_skaicius kambariu_skaicius INT DEFAULT NULL, CHANGE miestas miestas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE butonr butonr VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE aukstas aukstas INT DEFAULT NULL, CHANGE irengimas irengimas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE kaina kaina INT DEFAULT NULL, CHANGE nuotraukos nuotraukos VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
