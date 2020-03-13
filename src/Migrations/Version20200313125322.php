<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200313125322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE new_project (id INT AUTO_INCREMENT NOT NULL, pavadinimas VARCHAR(255) NOT NULL, intro VARCHAR(255) DEFAULT NULL, adresas VARCHAR(255) NOT NULL, aprasymas LONGTEXT DEFAULT NULL, mainimg VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property CHANGE gatve gatve VARCHAR(255) DEFAULT NULL, CHANGE plotas plotas INT DEFAULT NULL, CHANGE kambariu_skaicius kambariu_skaicius INT DEFAULT NULL, CHANGE miestas miestas VARCHAR(255) DEFAULT NULL, CHANGE butonr butonr VARCHAR(255) DEFAULT NULL, CHANGE aukstas aukstas INT DEFAULT NULL, CHANGE irengimas irengimas VARCHAR(255) DEFAULT NULL, CHANGE kaina kaina INT DEFAULT NULL, CHANGE nuotraukos nuotraukos VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE new_project');
        $this->addSql('ALTER TABLE property CHANGE gatve gatve VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE plotas plotas INT DEFAULT NULL, CHANGE kambariu_skaicius kambariu_skaicius INT DEFAULT NULL, CHANGE miestas miestas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE butonr butonr VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE aukstas aukstas INT DEFAULT NULL, CHANGE irengimas irengimas VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE kaina kaina INT DEFAULT NULL, CHANGE nuotraukos nuotraukos VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
