<?php

namespace App\Types;

enum RoleType{
    case SUPER_ADMIN;
    case FIREFIGHTER;
    case USER;

    public function name(): string
    {
        return match($this) {
            RoleType::SUPER_ADMIN => 'Super Admin',
            RoleType::FIREFIGHTER => 'Fire Fighter',
            RoleType::USER => 'User',
        };
    }
}