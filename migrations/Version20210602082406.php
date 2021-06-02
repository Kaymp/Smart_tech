<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602082406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE thema (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE project_id_id project_id_id INT DEFAULT NULL, CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE calender CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD thema_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EED660E3D0 FOREIGN KEY (thema_id) REFERENCES thema (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EED660E3D0 ON project (thema_id)');
        $this->addSql('ALTER TABLE statictext CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EED660E3D0');
        $this->addSql('DROP TABLE thema');
        $this->addSql('ALTER TABLE blog CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE project_id_id project_id_id INT DEFAULT NULL, CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE calender CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_2FB3D0EED660E3D0 ON project');
        $this->addSql('ALTER TABLE project DROP thema_id');
        $this->addSql('ALTER TABLE statictext CHANGE user_id_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
