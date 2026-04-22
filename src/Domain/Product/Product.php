<?php

namespace App\Domain\Product;

use JsonSerializable;
use ReturnTypeWillChange;

class Product implements JsonSerializable
{
    public function __construct(
        private ?int $id,
        private string $name,
        private string $description,
        private float $price,
        private string $imageUrl,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    #[ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
        ];
    }
}
