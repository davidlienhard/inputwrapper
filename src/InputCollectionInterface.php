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
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensionl arrays
     */
    public function isset(int|string $key, int|string|null $secondaryKey = null) : bool;

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
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function raw(int|string $key, int|string|null $secondaryKey = null) : int|float|string|bool|array|null;

    /**
     * returns one single element an the raw/original format
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function nullableRaw(int|string $key, int|string|null $secondaryKey = null) : int|float|string|bool|array|null;

    /**
     * returns one single element as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asInt(int|string $key, int|string|null $secondaryKey = null) : int;

    /**
     * returns one single element as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableInt(int|string $key, int|string|null $secondaryKey = null) : int|null;

    /**
     * returns one single element as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asFloat(int|string $key, int|string|null $secondaryKey = null) : float;

    /**
     * returns one single element as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableFloat(int|string $key, int|string|null $secondaryKey = null) : float|null;

    /**
     * returns one single element as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asString(int|string $key, int|string|null $secondaryKey = null) : string;

    /**
     * returns one single element as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableString(int|string $key, int|string|null $secondaryKey = null) : string|null;

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asBool(int|string $key, int|string|null $secondaryKey = null) : bool;

    /**
     * returns one single element as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableBool(int|string $key, int|string|null $secondaryKey = null) : bool|null;

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asArray(int|string $key, int|string|null $secondaryKey = null) : array;

    /**
     * returns one single element as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableArray(int|string $key, int|string|null $secondaryKey = null) : array|null;

    /**
     * returns one single file
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asFile(int|string $key, int|string|null $secondaryKey = null) : array;
}
