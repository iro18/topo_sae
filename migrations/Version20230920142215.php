<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920142215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route DROP FOREIGN KEY FK_8748E86564375873');
        $this->addSql('DROP INDEX IDX_8748E86564375873 ON commentaire_route');
        $this->addSql('ALTER TABLE commentaire_route DROP id_route_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route ADD id_route_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire_route ADD CONSTRAINT FK_8748E86564375873 FOREIGN KEY (id_route_id) REFERENCES route (id)');
        $this->addSql('CREATE INDEX IDX_8748E86564375873 ON commentaire_route (id_route_id)');
    }
}
