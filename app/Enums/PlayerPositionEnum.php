<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PlayerPositionEnum extends Enum
{

    const CA = 1;
    const SA = 2;
    const PD = 3;
    const PE = 4;
    const ME = 5;
    const MD = 6;
    const MEI =7;
    const MC = 8;
    const VOL = 9;
    const LAT_D = 10;
    const LAT_E = 11;
    const ZAG = 12;
    const GOL = 13;

    static public function getName($championship)
    {
        $championship = [
            self::CA => 'Centroavante',
            self::SA => 'Segundo Atacante',
            self::PD => 'Ponta Direita',
            self::PE => 'Ponta Esquerda',
            self::ME => 'Meia Esquerda',
            self::MD => 'Meia Direita',
            self::ME => 'Meia Armador',
            self::MC => 'Meia Campista',
            self::VOL => 'Volante',
            self::LAT_D => 'Lateral Direito',
            self::LAT_E => 'Lateral Esquerdo',
            self::ZAG => 'Zagueiro',
            self::GOL => 'Goleiro',
        ];

        return $championship[$championship];
    }
}
