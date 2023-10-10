<?php declare(strict_types=1);

/**
 * contains a custom mysql class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

/**
 * Methods for a comfortable use of the {@link http://www.mysql.com mySQL} database
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
interface InputCollectionInterface
{
    /**
     * connects to the database
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           array<(int|string), (int|float|string|bool|array|null)> $data data to store
     */
    public function __construct(array $data);

    /**
     * returns the whole row as an array
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @return          array<(int|string), (int|float|string|bool|null)>
     */
    public function all() : array;

    /**
     * checks if the given key exists
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function isset(int|string $key) : bool;

    /**
     * returns one single element from the row
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function raw(int|string $key) : int|float|string|bool|array|null;

    /**
     * returns one single element from the row as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asInt(int|string $key) : int;

    /**
     * returns one single element from the row as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableInt(int|string $key) : int|null;

    /**
     * returns one single element from the row as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asFloat(int|string $key) : float;

    /**
     * returns one single element from the row as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableFloat(int|string $key) : float|null;

    /**
     * returns one single element from the row as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asString(int|string $key) : string;

    /**
     * returns one single element from the row as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableString(int|string $key) : string|null;

    /**
     * returns one single element from the row as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asBool(int|string $key) : bool;

    /**
     * returns one single element from the row as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableBool(int|string $key) : bool|null;

    /**
     * returns one single element from the row as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asArray(int|string $key) : array;

    /**
     * returns one single element from the row as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableArray(int|string $key) : array|null;
}
