<?php

namespace App\Models;

// Dictatorship (Factories): Included use factory
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the remember token
     * $this->attributes['email_verified_at'] - timestamp - contains the email verification date
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */

    // Dictatorship (Mass Assignment): Using arrays for fillable and hidden attributes
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Dictatorship (Encapsulation and Single Access)
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }
}
