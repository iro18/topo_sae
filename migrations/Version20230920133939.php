<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920133939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire_route (id INT AUTO_INCREMENT NOT NULL, id_route_id INT NOT NULL, prenom VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_8748E86564375873 (id_route_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_route ADD CONSTRAINT FK_8748E86564375873 FOREIGN KEY (id_route_id) REFERENCES route (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route DROP FOREIGN KEY FK_8748E86564375873');
        $this->addSql('DROP TABLE commentaire_route');
    }
}
