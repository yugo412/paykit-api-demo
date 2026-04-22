<?php

declare(strict_types=1);

namespace App\Domain\Product;

interface ProductRepository
{
    public function getAll(): array;

    public function getById(int $id): ?Product;
}
