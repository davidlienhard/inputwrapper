<?php declare(strict_types=1);

/**
 * contains data of a superglobal
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

/**
 * methods to fetch data from a superglobal with a specified type
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
interface InputCollectionInterface
{
    /**
     * inserts data into this collection
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           array<(int|string), (int|float|string|bool|array|null)> $data data to store
     */
    public function __construct(array $data);

    /**
     * checks if the given key exists
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function isset(int|string $key) : bool;

    /**
     * returns the whole data as an array
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @return          array<(int|string), (int|float|string|bool|null)>
     */
    public function all() : array;

    /**
     * returns one single element an the raw/original format
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function raw(int|string $key) : int|float|string|bool|array|null;

    /**
     * returns one single element as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asInt(int|string $key) : int;

    /**
     * returns one single element as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableInt(int|string $key) : int|null;

    /**
     * returns one single element as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asFloat(int|string $key) : float;

    /**
     * returns one single element as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableFloat(int|string $key) : float|null;

    /**
     * returns one single element as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asString(int|string $key) : string;

    /**
     * returns one single element as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableString(int|string $key) : string|null;

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asBool(int|string $key) : bool;

    /**
     * returns one single element as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableBool(int|string $key) : bool|null;

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asArray(int|string $key) : array;

    /**
     * returns one single element as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableArray(int|string $key) : array|null;
}
