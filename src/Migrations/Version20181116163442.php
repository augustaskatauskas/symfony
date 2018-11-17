<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181116163442 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663B7323CB');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A426D518');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A426D518 FOREIGN KEY (computer_id) REFERENCES computer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663B7323CB');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A426D518');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663B7323CB FOREIGN KEY (phone_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A426D518 FOREIGN KEY (computer_id) REFERENCES car (id)');
    }
}
