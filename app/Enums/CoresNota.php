<?php

namespace App\Enums;

enum CoresNota: int
{
    case BRANCO = 0;
    case AZUL = 1;
    case VERDE = 2;
    case AMARELO = 3;
    case VERMELHO = 4;
    case ROSA = 5;
    case AZUL_CLARO = 6;
    case ROXO = 7;
    case VERDE_CLARO = 8;
    case LARANJA = 9;
    case CINZA = 10;
    case CINZA_ESCURO = 11;
    case MARROM = 12;

    public function getCor(): string
    {
        return match ($this) {
            self::BRANCO => '#FFF',
            self::AZUL => '#BAE2FF',
            self::VERDE => '#B9FFDD',
            self::AMARELO => '#FFE8AC',
            self::VERMELHO => '#FFCAB9',
            self::ROSA => '#F99494',
            self::AZUL_CLARO => '#9DD6FF',
            self::ROXO => '#ECA1FF',
            self::VERDE_CLARO => '#DAFF8B',
            self::LARANJA => '#FFA285',
            self::CINZA => '#CDCDCD',
            self::CINZA_ESCURO => '#979797',
            self::MARROM => '#A99A7C',
        };
    }

    public static function getAllColors(): array
    {
        $colors = [];
        foreach (self::cases() as $case) {
            $colors[$case->name] = $case->getCor();
        }

        return $colors;
    }

    public static function getNumberByHex(string $hex): ?self
    {
        return match ($hex) {
            '#FFF' => self::BRANCO,
            '#BAE2FF' => self::AZUL,
            '#B9FFDD' => self::VERDE,
            '#FFE8AC' => self::AMARELO,
            '#FFCAB9' => self::VERMELHO,
            '#F99494' => self::ROSA,
            '#9DD6FF' => self::AZUL_CLARO,
            '#ECA1FF' => self::ROXO,
            '#DAFF8B' => self::VERDE_CLARO,
            '#FFA285' => self::LARANJA,
            '#CDCDCD' => self::CINZA,
            '#979797' => self::CINZA_ESCURO,
            '#A99A7C' => self::MARROM,
        };
    }
}
?>
        