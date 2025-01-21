<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case IsCanceled = 'is_canceled';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::InProgress => 'In Progress',
            self::IsCanceled => 'Canceled',
            self::Completed => 'Completed',
        };
    }
}
