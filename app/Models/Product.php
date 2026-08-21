<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
// Dictatorship (Factories): Included use factory
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
     * $this->comments - Comment[] - contains the associated comments
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     */

    // Dictatorship (Mass Assignment): Defining fillable attributes
    protected $fillable = ['name', 'price'];

    // Dictatorship (Encapsulation and Single Access)
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    // Dictatorship 3 (Typing): Added "int" type to the parameter
    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    // Dictatorship 3 (Typing): Added "string" type to the parameter
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    // Dictatorship 3 (Typing): Added "int" type to the parameter
    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    // Dictatorship (Relations): Getters and setters for relationships
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments;
    }
}
