<?php

namespace App\Controller;

use App\Repository\StackOverflowQuestionRepository;
use App\Service\RequestValidator;
use App\Service\StackOverflowQuestionManager;
use App\Service\StackOverflowServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class StackOverflowController extends AbstractController
{
    private $requestValidator;
    private $stackOverflowService;
    private $entityManager;
    private $queryResultRepository;

    public function __construct(
        RequestValidator $requestValidator,
        StackOverflowServiceInterface $stackOverflowService,
        StackOverflowQuestionManager $questionManager,
        StackOverflowQuestionRepository $queryResultRepository
    ) {
        $this->requestValidator = $requestValidator;
        $this->stackOverflowService = $stackOverflowService;
        $this->entityManager = $questionManager;
        $this->queryResultRepository = $queryResultRepository;
    }

    /**
     * @Route("/api/stackoverflow/questions", name="api_stackoverflow_questions", methods={"GET"})
     */
    public function getQuestions(Request $request): Response
    {
        try {
            $this->requestValidator->validateTagged($request);
            $tagged = $request->query->get('tagged');
            $order = $request->query->get('order', 'desc');
            $sort = $request->query->get('sort', 'activity');
            $dates = $this->requestValidator->validateDates($request);

            $queryKey = md5(json_encode([
                'tagged' => $tagged,
                'order' => $order,
                'sort' => $sort,
                'fromDate' => $dates['fromDate'],
                'toDate' => $dates['toDate'],
            ]));

            $fromDateTime = $dates['fromDate'] ? new \DateTime($dates['fromDate']) : null;
            $toDateTime = $dates['toDate']? new \DateTime($dates['toDate']) : null;

            $existingResult = $this->queryResultRepository->findAllByQuery($queryKey, $fromDateTime, $toDateTime);
           
            if ($existingResult) {
                $response = [
                    'items' => array_map(function ($result) {
                        return $result->toArray();
                    }, $existingResult)
                ];
                return new JsonResponse($response, Response::HTTP_OK);
            }

            $data = $this->stackOverflowService->fetchQuestions($tagged, $order, $sort, $dates['fromDate'], $dates['toDate']);
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
