<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property int $aura
 * @property string $hierarchy
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Human extends Model
{
    use HasFactory;

    public const COMMON_HIERARCHY = 'común';

    public const MODERATE_HIERARCHY = 'moderado';

    public const LEGENDARY_HIERARCHY = 'legendario';

    public const HIERARCHIES = [
        self::COMMON_HIERARCHY,
        self::MODERATE_HIERARCHY,
        self::LEGENDARY_HIERARCHY,
    ];

    public $timestamps = true;

    protected $fillable = [
        'name',
        'aura',
        'hierarchy',
    ];

    protected $guarded = [
        'id',
    ];

    public function getId(): int
    {
        return (int) $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getAura(): int
    {
        return (int) $this->attributes['aura'];
    }

    public function setAura(int $aura): void
    {
        $this->attributes['aura'] = $aura;
    }

    public function getHierarchy(): string
    {
        return $this->attributes['hierarchy'];
    }

    public function setHierarchy(string $hierarchy): void
    {
        $this->attributes['hierarchy'] = $hierarchy;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->getAttribute('created_at');
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->getAttribute('updated_at');
    }

    protected function casts(): array
    {
        return [
            'aura' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
