<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920141730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route ADD commentaires_route_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire_route ADD CONSTRAINT FK_8748E865C0DA9DEF FOREIGN KEY (commentaires_route_id) REFERENCES route (id)');
        $this->addSql('CREATE INDEX IDX_8748E865C0DA9DEF ON commentaire_route (commentaires_route_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route DROP FOREIGN KEY FK_8748E865C0DA9DEF');
        $this->addSql('DROP INDEX IDX_8748E865C0DA9DEF ON commentaire_route');
        $this->addSql('ALTER TABLE commentaire_route DROP commentaires_route_id');
    }
}
