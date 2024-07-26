<?php

namespace App\Entity;

use App\Repository\StackOverflowQuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StackOverflowQuestionRepository::class)]
class StackOverflowQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private array $tags = [];

    #[ORM\Column(nullable: true)]
    private ?int $owner_acount_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $owner_reputation = null;

    #[ORM\Column(nullable: true)]
    private ?int $owner_user_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner_user_type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner_profile_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner_display_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner_link = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_answered = null;

    #[ORM\Column(nullable: true)]
    private ?int $view_count = null;

    #[ORM\Column(nullable: true)]
    private ?int $accepted_answered_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $answer_count = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $integer = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $last_activity_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $last_edit_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $question_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $query = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getOwnerAcountId(): ?int
    {
        return $this->owner_acount_id;
    }

    public function setOwnerAcountId(?int $owner_acount_id): static
    {
        $this->owner_acount_id = $owner_acount_id;

        return $this;
    }

    public function getOwnerReputation(): ?int
    {
        return $this->owner_reputation;
    }

    public function setOwnerReputation(?int $owner_reputation): static
    {
        $this->owner_reputation = $owner_reputation;

        return $this;
    }

    public function getOwnerUserId(): ?int
    {
        return $this->owner_user_id;
    }

    public function setOwnerUserId(?int $owner_user_id): static
    {
        $this->owner_user_id = $owner_user_id;

        return $this;
    }

    public function getOwnerUserType(): ?string
    {
        return $this->owner_user_type;
    }

    public function setOwnerUserType(?string $owner_user_type): static
    {
        $this->owner_user_type = $owner_user_type;

        return $this;
    }

    public function getOwnerProfileImage(): ?string
    {
        return $this->owner_profile_image;
    }

    public function setOwnerProfileImage(?string $owner_profile_image): static
    {
        $this->owner_profile_image = $owner_profile_image;

        return $this;
    }

    public function getOwnerDisplayName(): ?string
    {
        return $this->owner_display_name;
    }

    public function setOwnerDisplayName(?string $owner_display_name): static
    {
        $this->owner_display_name = $owner_display_name;

        return $this;
    }

    public function getOwnerLink(): ?string
    {
        return $this->owner_link;
    }

    public function setOwnerLink(?string $owner_link): static
    {
        $this->owner_link = $owner_link;

        return $this;
    }

    public function isAnswered(): ?bool
    {
        return $this->is_answered;
    }

    public function setAnswered(?bool $is_answered): static
    {
        $this->is_answered = $is_answered;

        return $this;
    }

    public function getViewCount(): ?int
    {
        return $this->view_count;
    }

    public function setViewCount(?int $view_count): static
    {
        $this->view_count = $view_count;

        return $this;
    }

    public function getAcceptedAnsweredId(): ?int
    {
        return $this->accepted_answered_id;
    }

    public function setAcceptedAnsweredId(?int $accepted_answered_id): static
    {
        $this->accepted_answered_id = $accepted_answered_id;

        return $this;
    }

    public function getAnswerCount(): ?int
    {
        return $this->answer_count;
    }

    public function setAnswerCount(?int $answer_count): static
    {
        $this->answer_count = $answer_count;

        return $this;
    }

    public function getInteger(): ?string
    {
        return $this->integer;
    }

    public function setInteger(?string $integer): static
    {
        $this->integer = $integer;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getLastActivityDate(): ?\DateTimeInterface
    {
        return $this->last_activity_date;
    }

    public function setLastActivityDate(?\DateTimeInterface $last_activity_date): static
    {
        $this->last_activity_date = $last_activity_date;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(?\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getLastEditDate(): ?\DateTimeInterface
    {
        return $this->last_edit_date;
    }

    public function setLastEditDate(?\DateTimeInterface $last_edit_date): static
    {
        $this->last_edit_date = $last_edit_date;

        return $this;
    }

    public function getQuestionId(): ?int
    {
        return $this->question_id;
    }

    public function setQuestionId(?int $question_id): static
    {
        $this->question_id = $question_id;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }
    public function toArray(): array
    {
        return [
            'tags' => $this->getTags(),
            'owner' => [
                'account_id' => $this->getOwnerAcountId(),
                'reputation' => $this->getOwnerReputation(),
                'user_id' => $this->getOwnerUserId(),
                'user_type' => $this->getOwnerUserType(),
                'profile_image' => $this->getOwnerProfileImage(),
                'display_name' => $this->getOwnerDisplayName(),
                'link' => $this->getOwnerLink(),
            ],
            'is_answered' => $this->isAnswered(),
            'view_count' => $this->getViewCount(),
            'accepted_answer_id' => $this->getAcceptedAnsweredId(),
            'answer_count' => $this->getAnswerCount(),
            'integer' => $this->getInteger(),
            'score' => $this->getScore(),
            'last_activity_date' => $this->getLastActivityDate()->getTimestamp(),
            'creation_date' => $this->getCreationDate()->getTimestamp(),
            'last_edit_date' => $this->getLastEditDate()->getTimestamp(),
            'question_id' => $this->getQuestionId(),
            'link' => $this->getLink(),
            'title' => $this->getTitle(),
        ];
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(string $query): static
    {
        $this->query = $query;

        return $this;
    }

}
