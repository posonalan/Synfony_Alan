<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207141517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alimentations (id INT AUTO_INCREMENT NOT NULL, libelle_aliment VARCHAR(50) NOT NULL, type_aliment VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animaux (id INT AUTO_INCREMENT NOT NULL, id_alimentation_id INT NOT NULL, libelle_animal VARCHAR(50) NOT NULL, sexe VARCHAR(10) NOT NULL, date_de_naissance DATETIME NOT NULL, prix INT NOT NULL, alimentations VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9ABE194D6D1F1751 (id_alimentation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animaux ADD CONSTRAINT FK_9ABE194D6D1F1751 FOREIGN KEY (id_alimentation_id) REFERENCES alimentations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux DROP FOREIGN KEY FK_9ABE194D6D1F1751');
        $this->addSql('DROP TABLE alimentations');
        $this->addSql('DROP TABLE animaux');
    }
}
