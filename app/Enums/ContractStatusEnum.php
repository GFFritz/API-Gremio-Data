<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusEnum extends Enum
{

    const PENDING_SEND = 1;
    const SENDED = 2;
    const SIGNED_FOR_ALL = 3;
    const CANCELED = 4;
    const WAITING = 5;

    static public function getName($status)
    {
        $statuses = [
            self::PENDING_SEND => 'Pendente',
            self::SENDED => 'Enviado para assinatura',
            self::SIGNED_FOR_ALL => 'Assinato por todas as partes',
            self::CANCELED => 'Cancelado',
            self::WAITING => 'Aguardando Aprovação'
        ];

        return $statuses[$status];
    }
}
