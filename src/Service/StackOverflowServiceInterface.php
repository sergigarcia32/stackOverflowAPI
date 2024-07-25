<?php

namespace App\Service;

interface StackOverflowServiceInterface
{
    public function fetchQuestions(string $tagged, string $order, string $sort): array;
}

