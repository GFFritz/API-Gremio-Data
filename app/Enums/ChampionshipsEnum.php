<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ChampionshipsEnum extends Enum
{

    const NATIONAL_LEAGUE_A = 1;
    const LIBERTADORES = 2;
    const BRASIL_CUP = 3;
    const SULAMERICANA = 4;
    const GAUCHO = 5;
    const RECOPA_GAUCHO = 6;
    const RECOPA_SULAMERICANA = 7;
    const WORLD_CHAMPIONSHIP = 8;
    const NATIONAL_LEAGUE_B = 9;

    static public function getName($championship)
    {
        $championship = [
            self::NATIONAL_LEAGUE_A => 'Campeonato Brasileiro Série A',
            self::LIBERTADORES => 'Copa Libertadores',
            self::BRASIL_CUP => 'Copa do Brasil',
            self::SULAMERICANA => 'Copa Sulamericana',
            self::GAUCHO => 'Gauchão',
            self::RECOPA_GAUCHO => 'Recopa Gaucha',
            self::RECOPA_SULAMERICANA => 'Recopa Sulamericana',
            self::WORLD_CHAMPIONSHIP => 'Mundial de Clubes',
            self::NATIONAL_LEAGUE_B => 'Campeonato Brasileiro Série B',
        ];

        return $championship[$championship];
    }
}
