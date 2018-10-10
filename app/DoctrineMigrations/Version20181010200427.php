<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181010200427 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', position VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('
            INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `birth_date`, `username`, `password`, `roles`, `position`) VALUES
            (1, \'test@test.pl\', \'Test\', \'Testowy\', \'1997-10-01\', \'testuser\', \'test\', \'a:1:{i:0;s:9:\"ROLE_USER\";}\', \'Head Tester\'),
            (2, \'different@mail.com\', \'Jan\', \'Kowalski\', \'1980-03-01\', \'jankowalski\', \'password\', \'a:1:{i:0;s:9:\"ROLE_USER\";}\', \'Head Administrator\'),
            (3, \'pgutofficial@gmail.com\', \'Patryk\', \'Gut\', \'1997-10-01\', \'vender\', \'password\', \'a:1:{i:0;s:9:\"ROLE_USER\";}\', \'PHP Developer\');
        ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
    }
}
