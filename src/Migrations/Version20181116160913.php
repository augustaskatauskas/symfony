<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181116160913 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD computer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A426D518 FOREIGN KEY (computer_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66A426D518 ON article (computer_id)');
        $this->addSql('ALTER TABLE computer ADD computer_make TINYTEXT NOT NULL, ADD computer_model TINYTEXT NOT NULL, ADD computer_years INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A426D518');
        $this->addSql('DROP INDEX IDX_23A0E66A426D518 ON article');
        $this->addSql('ALTER TABLE article DROP computer_id');
        $this->addSql('ALTER TABLE computer DROP computer_make, DROP computer_model, DROP computer_years');
    }
}
