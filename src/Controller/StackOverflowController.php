<?php

namespace App\Controller;

use App\Repository\StackOverflowQuestionRepository;
use App\Service\StackOverflowQuestionManager;
use App\Service\StackOverflowServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class StackOverflowController extends AbstractController
{
    private $stackOverflowService;
    private $entityManager;
    private $queryResultRepository;

    public function __construct(StackOverflowServiceInterface $stackOverflowService, StackOverflowQuestionManager $questionManager, StackOverflowQuestionRepository $queryResultRepository)
    {
        $this->stackOverflowService = $stackOverflowService;
        $this->entityManager = $questionManager;
        $this->queryResultRepository = $queryResultRepository;
    }

    /**
     * @Route("/api/stackoverflow/questions", name="api_stackoverflow_questions", methods={"GET"})
     */
    public function getQuestions(Request $request): Response
    {
        $tagged = $request->query->get('tagged');
        $order = $request->query->get('order', 'desc');
        $sort = $request->query->get('sort', 'activity');
        $fromDate = $request->query->get('fromDate');
        $toDate = $request->query->get('toDate');

        if (!$tagged) {
            return new JsonResponse(['error' => 'El parámetro "tagged" es obligatorio.'], Response::HTTP_BAD_REQUEST);
        }
        try {
            $queryKey = md5(json_encode([
                'tagged' => $tagged,
                'order' => $order,
                'sort' => $sort,
                'fromDate' => $fromDate,
                'toDate' => $toDate
            ]));

            $fromDateTime = $fromDate ? new \DateTime($fromDate) : null;
            $toDateTime = $toDate ? new \DateTime($toDate) : null;

            $existingResult = $this->queryResultRepository->findAllByQuery($queryKey, $fromDateTime, $toDateTime);

            if ($existingResult) {
                $response = [
                    'items' => array_map(function ($result) {
                        return $result->toArray();
                    }, $existingResult)
                ];
                return new JsonResponse($response, Response::HTTP_OK);
            }

            $data = $this->stackOverflowService->fetchQuestions($tagged, $order, $sort, $fromDate, $toDate);
            if (empty($data)) {
                return new JsonResponse(['error' => 'No se encontraron preguntas para los criterios especificados.'], Response::HTTP_NOT_FOUND);
            }

            $this->entityManager->saveQuestions($data, $queryKey, $tagged);

            return new JsonResponse($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Ocurrió un error interno del servidor.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
