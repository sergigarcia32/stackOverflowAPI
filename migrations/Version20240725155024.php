<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240725155024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE stack_overflow_question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE stack_overflow_question (id INT NOT NULL, tags JSON NOT NULL, owner_acount_id INT NOT NULL, owner_reputation INT NOT NULL, owner_user_id INT NOT NULL, owner_user_type VARCHAR(255) NOT NULL, owner_profile_image VARCHAR(255) NOT NULL, owner_display_name VARCHAR(255) NOT NULL, owner_link VARCHAR(255) NOT NULL, is_answered BOOLEAN NOT NULL, view_count INT NOT NULL, accepted_answered_id INT DEFAULT NULL, answer_count INT NOT NULL, score INT NOT NULL, last_activity_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_edit_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, question_id INT NOT NULL, link VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE stack_overflow_question_id_seq CASCADE');
        $this->addSql('DROP TABLE stack_overflow_question');
    }
}
