<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class StackOverflowService implements StackOverflowServiceInterface
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchQuestions(string $tagged, string $order, string $sort): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.stackexchange.com/2.3/questions',
            [
                'query' => [
                    'order' => $order,
                    'sort' => $sort,
                    'site' => 'stackoverflow',
                    'tagged' => $tagged
                ]
            ]
        );

        $statusCode = $response->getStatusCode();
        $content = $response->getContent();
        $data = json_decode($content, true);
        
        if ($statusCode !== 200 || !isset($data['items'])) {
            throw new \Exception('Failed to fetch questions from StackOverflow');
        }
        return $data['items'];
    }
}