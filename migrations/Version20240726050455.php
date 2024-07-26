<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726050455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_user_type DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_profile_image DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_display_name DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_link DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_user_type SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_profile_image SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_display_name SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_link SET NOT NULL');
    }
}
