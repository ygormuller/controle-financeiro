<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250416215807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE movimentacao (id SERIAL NOT NULL, movimentacao VARCHAR(255) NOT NULL, valor DOUBLE PRECISION NOT NULL, data DATE NOT NULL, tipo VARCHAR(10) NOT NULL, descricao VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        /* $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL); */
        $this->addSql(<<<'SQL'
            DROP TABLE movimentacao
        SQL);
    }
}
