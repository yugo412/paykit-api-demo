<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductNotFoundException;
use App\Domain\Product\ProductRepository;

class ArrayProductRepository implements ProductRepository
{
    private array $products = [];

    public function __construct()
    {
        $this->products = [
            1 => new Product(1, 'Apple iPhone 17 Pro Max', 'Latest model from Apple', 24000000, 'https://placehold.net/600x600.png'),
            2 => new Product(2, 'Samsung Galaxy S25 Ultra', 'Flagship Samsung dengan kamera canggih', 22000000, 'https://placehold.net/600x600.png'),
            3 => new Product(3, 'Google Pixel 9 Pro', 'Android pure dengan AI terbaru', 18000000, 'https://placehold.net/600x600.png'),
            4 => new Product(4, 'Xiaomi 15 Pro', 'Performa tinggi harga kompetitif', 12000000, 'https://placehold.net/600x600.png'),
            5 => new Product(5, 'OnePlus 13', 'Fast and smooth experience', 14000000, 'https://placehold.net/600x600.png'),
            6 => new Product(6, 'ASUS ROG Phone 9', 'Gaming phone dengan performa ekstrem', 16000000, 'https://placehold.net/600x600.png'),
            7 => new Product(7, 'Sony WH-1000XM6', 'Headphone noise cancelling terbaik', 5500000, 'https://placehold.net/600x600.png'),
            8 => new Product(8, 'Apple MacBook Air M4', 'Laptop tipis dengan performa tinggi', 21000000, 'https://placehold.net/600x600.png'),
            9 => new Product(9, 'iPad Pro M4 11-inch', 'Tablet powerful untuk produktivitas', 17000000, 'https://placehold.net/600x600.png'),
            10 => new Product(10, 'Logitech MX Master 4', 'Mouse premium untuk produktivitas', 1800000, 'https://placehold.net/600x600.png'),
        ];
    }

    public function getAll(): array
    {
        return array_values($this->products);
    }

    public function getById(int $id): ?Product
    {
        if (! isset($this->products[$id])) {
            throw new ProductNotFoundException;
        }

        return $this->products[$id] ?? null;
    }
}
