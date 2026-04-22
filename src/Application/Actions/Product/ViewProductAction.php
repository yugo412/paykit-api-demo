<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface;

class ViewProductAction extends ProductAction
{
    public function action(): ResponseInterface
    {
        $id = (int) $this->resolveArg('id');
        $product = $this->productRepository->getById($id);

        return $this->respondWithData($product);
    }
}
