<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230921154305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route ADD user_commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire_route ADD CONSTRAINT FK_8748E865D1190EC9 FOREIGN KEY (user_commentaire_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8748E865D1190EC9 ON commentaire_route (user_commentaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_route DROP FOREIGN KEY FK_8748E865D1190EC9');
        $this->addSql('DROP INDEX IDX_8748E865D1190EC9 ON commentaire_route');
        $this->addSql('ALTER TABLE commentaire_route DROP user_commentaire_id');
    }
}
