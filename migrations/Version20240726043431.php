<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726043431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stack_overflow_question ALTER tags DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_acount_id DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_reputation DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_user_id DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER is_answered DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER view_count DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER answer_count DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER score DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER question_id DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER link DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER title DROP NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER query DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER tags SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_acount_id SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_reputation SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER owner_user_id SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER is_answered SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER view_count SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER answer_count SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER score SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER question_id SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER link SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER title SET NOT NULL');
        $this->addSql('ALTER TABLE stack_overflow_question ALTER query SET NOT NULL');
    }
}
