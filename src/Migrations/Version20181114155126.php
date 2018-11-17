<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181114155126 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD employee_first_name TINYTEXT NOT NULL, ADD employee_last_name TINYTEXT NOT NULL, ADD employee_born_date INT NOT NULL, ADD employee_phone_number INT NOT NULL, ADD employee_email TINYTEXT NOT NULL, DROP title, DROP body');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD title TINYTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD body LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP employee_first_name, DROP employee_last_name, DROP employee_born_date, DROP employee_phone_number, DROP employee_email');
    }
}
