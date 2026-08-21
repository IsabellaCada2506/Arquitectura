<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * COMMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['description'] - string - contains the comment description
     * $this->attributes['product_id'] - int - contains the referenced product id
     * $this->product - Product - contains the associated Product
     * $this->attributes['created_at'] - timestamp - contains the comment creation date
     * $this->attributes['updated_at'] - timestamp - contains the comment update date
     */

    // Dictatorship (Mass Assignment): Defining fillable attributes
    protected $fillable = ['description', 'product_id'];

    // Dictatorship (Encapsulation and Single Access)
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $desc): void
    {
        $this->attributes['description'] = $desc;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $pId): void
    {
        $this->attributes['product_id'] = $pId;
    }

    // Dictatorship (Relations): Getters and setters for relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    // Dictatorship 3 (Typing): Added "Product" type to the parameter
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
}
