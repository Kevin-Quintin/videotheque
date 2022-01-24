<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124143956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_497DD6348F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurent (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figurent_movie (figurent_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_E0D77E775A370C9A (figurent_id), INDEX IDX_E0D77E778F93B6FC (movie_id), PRIMARY KEY(figurent_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, duration INT NOT NULL, cost DOUBLE PRECISION NOT NULL, only_adult TINYINT(1) NOT NULL, created_at DATE NOT NULL, nb_like INT NOT NULL, image VARCHAR(255) NOT NULL, origin_country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_figurent (role_id INT NOT NULL, figurent_id INT NOT NULL, INDEX IDX_40A45BDFD60322AC (role_id), INDEX IDX_40A45BDF5A370C9A (figurent_id), PRIMARY KEY(role_id, figurent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, address VARCHAR(255) NOT NULL, complement VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, date_birth DATE NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE whishlist (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2E936C6DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6348F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE figurent_movie ADD CONSTRAINT FK_E0D77E775A370C9A FOREIGN KEY (figurent_id) REFERENCES figurent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figurent_movie ADD CONSTRAINT FK_E0D77E778F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_figurent ADD CONSTRAINT FK_40A45BDFD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_figurent ADD CONSTRAINT FK_40A45BDF5A370C9A FOREIGN KEY (figurent_id) REFERENCES figurent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE whishlist ADD CONSTRAINT FK_2E936C6DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE figurent_movie DROP FOREIGN KEY FK_E0D77E775A370C9A');
        $this->addSql('ALTER TABLE role_figurent DROP FOREIGN KEY FK_40A45BDF5A370C9A');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6348F93B6FC');
        $this->addSql('ALTER TABLE figurent_movie DROP FOREIGN KEY FK_E0D77E778F93B6FC');
        $this->addSql('ALTER TABLE role_figurent DROP FOREIGN KEY FK_40A45BDFD60322AC');
        $this->addSql('ALTER TABLE whishlist DROP FOREIGN KEY FK_2E936C6DA76ED395');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE figurent');
        $this->addSql('DROP TABLE figurent_movie');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_figurent');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE whishlist');
    }
}
