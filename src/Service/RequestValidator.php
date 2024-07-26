<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class RequestValidator
{
    public function validateTagged(Request $request): void
    {
        if (!$request->query->get('tagged')) {
            throw new \InvalidArgumentException('El parámetro "tagged" es obligatorio.');
        }
    }

    public function validateDates(Request $request): array
    {
        $fromDate = $request->query->get('fromDate');
        $toDate = $request->query->get('toDate');
        
        return [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ];
    }
}
