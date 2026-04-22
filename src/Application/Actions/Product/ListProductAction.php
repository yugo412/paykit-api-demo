<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface;

class ListProductAction extends ProductAction
{
    public function action(): ResponseInterface
    {
        return $this->respondWithData($this->productRepository->getAll());
    }
}
