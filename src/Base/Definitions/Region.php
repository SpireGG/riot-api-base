<?php

/**
 * Copyright (C) 2016-2020  Daniel Dolejška
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace RiotAPI\Base\Definitions;

use RiotAPI\Base\Exceptions\GeneralException;


/**
 *   Class Region
 *
 * @package RiotAPI\LeagueAPI\Definitions
 */
class Region implements IRegion
{
    // ==================================================================dd=
    //     Standard game regions (servers)
    // ==================================================================dd=

    public const NORTH_AMERICA = 'na';
    public const EUROPE_WEST = 'euw';
    public const EUROPE_EAST = 'eune';
    public const LAMERICA_SOUTH = 'las';
    public const LAMERICA_NORTH = 'lan';
    public const BRASIL = 'br';
    public const RUSSIA = 'ru';
    public const TURKEY = 'tr';
    public const OCEANIA = 'oce';
    public const KOREA = 'kr';
    public const JAPAN = 'jp';
    public const PHILIPPINES = 'ph';
    public const SINGAPORE = 'sg';
    public const TAIWAN = 'tw';
    public const THAILAND = 'th';
    public const VIETNAM = 'vn';

    public static array $list = [
        self::NORTH_AMERICA => self::NORTH_AMERICA,
        self::EUROPE => self::EUROPE,
        self::EUROPE_WEST => self::EUROPE_WEST,
        self::EUROPE_EAST => self::EUROPE_EAST,
        self::LAMERICA_SOUTH => self::LAMERICA_SOUTH,
        self::LAMERICA_NORTH => self::LAMERICA_NORTH,
        self::BRASIL => self::BRASIL,
        self::RUSSIA => self::RUSSIA,
        self::TURKEY => self::TURKEY,
        self::OCEANIA => self::OCEANIA,
        self::ASIA => self::ASIA,
        self::KOREA => self::KOREA,
        self::JAPAN => self::JAPAN,
        self::AMERICAS => self::AMERICAS,
        self::SEA => self::SEA,
        self::PHILIPPINES => self::PHILIPPINES,
        self::SINGAPORE => self::SINGAPORE,
        self::TAIWAN => self::TAIWAN,
        self::THAILAND => self::THAILAND,
        self::VIETNAM => self::VIETNAM,
    ];


    // ==================================================================dd=
    //     Control functions
    // ==================================================================dd=

    public function getList(): array
    {
        return $this::$list;
    }

    /**
     * @throws GeneralException
     */
    public function getRegionName($region): string
    {
        $region = strtolower($region);
        if (!isset($this::$list[$region])) {
            throw new GeneralException('Invalid region provided. Can not find requested region.');
        }

        return self::$list[$region];
    }
}
