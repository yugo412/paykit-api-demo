<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use App\Application\Actions\Action;
use App\Domain\Product\ProductRepository;
use Psr\Log\LoggerInterface;

abstract class ProductAction extends Action
{
    public function __construct(
        LoggerInterface $logger,
        protected readonly ProductRepository $productRepository,
    ) {
        parent::__construct($logger);
    }
}
