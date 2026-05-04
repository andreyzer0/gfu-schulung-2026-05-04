<?php

namespace App\Enums;

enum EventType:string
{
    case OnSite = 'onsite';
    case OnLine = 'online';
    case Hybrid = 'hybrid';

    public function label(): string
    {
     return match ($this) {
         self::OnSite => 'Presence Training',
         self::OnLine => 'Online Course',
         self::Hybrid => 'Hybrid Course',
     };
    }
}


