<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\StackOverflowQuestion;

class StackOverflowQuestionManager
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveQuestions(array $data, string $queryKey, string $tagged): void
    {
        foreach ($data as $item) {
            $queryResult = new StackOverflowQuestion();

            $queryResult->setTags(explode(',', $tagged));
            $queryResult->setQuery($queryKey);
            $queryResult->setOwnerAcountId($item['owner']['account_id'] ?? null);
            $queryResult->setOwnerReputation($item['owner']['reputation'] ?? null);
            $queryResult->setOwnerUserId($item['owner']['user_id'] ?? null);
            $queryResult->setOwnerUserType($item['owner']['user_type'] ?? null);
            $queryResult->setOwnerProfileImage($item['owner']['profile_image'] ?? null);
            $queryResult->setOwnerDisplayName($item['owner']['display_name'] ?? null);
            $queryResult->setOwnerLink($item['owner']['link'] ?? null);
            $queryResult->setAnswered($item['is_answered'] ?? false);
            $queryResult->setViewCount($item['view_count'] ?? 0);
            $queryResult->setAcceptedAnsweredId($item['accepted_answer_id'] ?? null);
            $queryResult->setAnswerCount($item['answer_count'] ?? 0);
            $queryResult->setScore($item['score'] ?? 0);
            $queryResult->setLastActivityDate(new \DateTime('@' . $item['last_activity_date']));
            $queryResult->setCreationDate(new \DateTime('@' . $item['creation_date']));
            if (isset($question['last_edit_date'])) {
                $queryResult->setLastEditDate(new \DateTime('@' . $question['last_edit_date']));
            } else {
                $queryResult->setLastEditDate(new \DateTime());
            }
            $queryResult->setQuestionId($item['question_id']);
            $queryResult->setLink($item['link']);
            $queryResult->setTitle($item['title']);
            $this->entityManager->persist($queryResult);
        }
        $this->entityManager->flush();
    }
}
