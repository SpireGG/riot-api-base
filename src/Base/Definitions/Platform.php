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
 *   Class Platform
 *
 * @package RiotAPI\LeagueAPI\Definitions
 */
class Platform implements IPlatform
{
    // ==================================================================dd=
    //     Standard regional platforms
    // ==================================================================dd=

    public const NORTH_AMERICA = 'na1';
    public const EUROPE_WEST = 'euw1';
    public const EUROPE_EAST = 'eun1';
    public const LAMERICA_SOUTH = 'la2';
    public const LAMERICA_NORTH = 'la1';
    public const BRASIL = 'br1';
    public const RUSSIA = 'ru';
    public const TURKEY = 'tr1';
    public const OCEANIA = 'oc1';
    public const KOREA = 'kr';
    public const JAPAN = 'jp1';
    public const PHILIPPINES = 'ph2';
    public const SINGAPORE = 'sg2';
    public const TAIWAN = 'tw2';
    public const THAILAND = 'th2';
    public const VIETNAM = 'vn2';

    public const AMERICAS = 'americas';
    public const EUROPE = 'europe';
    public const ASIA = 'asia';
    public const SEA = 'sea';

    public static array $list = array(
        IRegion::EUROPE => self::EUROPE,
        IRegion::AMERICAS => self::AMERICAS,
        IRegion::ASIA => self::ASIA,
        IRegion::SEA => self::SEA,
        Region::NORTH_AMERICA => self::NORTH_AMERICA,
        Region::EUROPE_WEST => self::EUROPE_WEST,
        Region::EUROPE_EAST => self::EUROPE_EAST,
        Region::LAMERICA_SOUTH => self::LAMERICA_SOUTH,
        Region::LAMERICA_NORTH => self::LAMERICA_NORTH,
        Region::BRASIL => self::BRASIL,
        Region::RUSSIA => self::RUSSIA,
        Region::TURKEY => self::TURKEY,
        Region::OCEANIA => self::OCEANIA,
        Region::KOREA => self::KOREA,
        Region::JAPAN => self::JAPAN,
        Region::PHILIPPINES => self::PHILIPPINES,
        Region::SINGAPORE => self::SINGAPORE,
        Region::TAIWAN => self::TAIWAN,
        Region::THAILAND => self::THAILAND,
        Region::VIETNAM => self::VIETNAM,
    );

    public static array $continentalRegions = [
        self::AMERICAS,
        self::EUROPE,
        self::ASIA,
        self::SEA,
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
    public function getPlatformNameOfRegion($region): string
    {
        if (!isset($this::$list[$region])) {
            throw new GeneralException('Invalid region provided. Can not find requested platform.');
        }

        return self::$list[$region];
    }

    /**
     * @throws GeneralException
     */
    public function getCorrespondingContinentRegion($region): string
    {
        return match ($this->getPlatformNameOfRegion($region)) {
            self::EUROPE_WEST, self::EUROPE_EAST, self::TURKEY, self::RUSSIA => IRegion::EUROPE,
            self::NORTH_AMERICA, self::LAMERICA_NORTH, self::LAMERICA_SOUTH, self::BRASIL, self::OCEANIA => IRegion::AMERICAS,
            self::KOREA, self::JAPAN => IRegion::ASIA,
            self::PHILIPPINES, self::SINGAPORE, self::TAIWAN, self::THAILAND, self::VIETNAM => IRegion::SEA,
            default => throw new GeneralException("Unable to convert '$region' platform ID to corresponding continent region."),
        };
    }
}
