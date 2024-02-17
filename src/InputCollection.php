<?php declare(strict_types=1);

/**
 * contains data of a superglobal
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollectionInterface;

/**
 * methods to fetch data from a superglobal with a specified type
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class InputCollection implements InputCollectionInterface
{
    /**
     * inserts data into this collection
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           array<(int|string), (int|float|string|bool|array|null)> $data data to store
     */
    public function __construct(private array $data)
    {
        // do nothing
    }

    /**
     * checks if the given key exists
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function isset(int|string $key, int|string|null $secondaryKey = null) : bool
    {
        if ($secondaryKey !== null) {
            return \array_key_exists($key, $this->data)
                && \is_array($this->data[$key])
                && \array_key_exists($secondaryKey, $this->data[$key]);
        }

        return \array_key_exists($key, $this->data);
    }

    /**
     * returns the whole data as an array
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @return          array<(int|string), (int|float|string|bool|array|null)>
     */
    public function all() : array
    {
        return $this->data;
    }

    /**
     * returns one single element an the raw/original format
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist
     */
    public function raw(int|string $key, int|string|null $secondaryKey = null) : int|float|string|bool|array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if ($secondaryKey !== null && \is_array($this->data[$key])) {
            if (!\array_key_exists($secondaryKey, $this->data[$key])) {
                throw new InputWrapperException("secondary key '".$secondaryKey."' does not exist");
            }

            return $this->data[$key][$secondaryKey];
        }

        return $this->data[$key];
    }

    /**
     * returns one single element an the raw/original format
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist
     */
    public function nullableRaw(int|string $key, int|string|null $secondaryKey = null) : int|float|string|bool|array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if ($secondaryKey !== null && \is_array($this->data[$key])) {
            if (!\array_key_exists($secondaryKey, $this->data[$key])) {
                return null;
            }

            return $this->data[$key][$secondaryKey];
        }

        return $this->data[$key];
    }

    /**
     * returns one single element as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asInt(int|string $key, int|string|null $secondaryKey = null) : int
    {
        $raw = $this->raw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to int");
        }

        return \intval($raw);
    }

    /**
     * returns one single element as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableInt(int|string $key, int|string|null $secondaryKey = null) : int|null
    {
        $raw = $this->nullableRaw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to int");
        }

        return $raw === null
            ? null
            : \intval($raw);
    }

    /**
     * returns one single element as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asFloat(int|string $key, int|string|null $secondaryKey = null) : float
    {
        $raw = $this->raw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to float");
        }

        return \floatval($raw);
    }

    /**
     * returns one single element as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableFloat(int|string $key, int|string|null $secondaryKey = null) : float|null
    {
        $raw = $this->nullableRaw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to float");
        }

        return $raw === null
            ? null
            : \floatval($raw);
    }

    /**
     * returns one single element as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asString(int|string $key, int|string|null $secondaryKey = null) : string
    {
        $raw = $this->raw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to string");
        }

        return \strval($raw);
    }

    /**
     * returns one single element as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableString(int|string $key, int|string|null $secondaryKey = null) : string|null
    {
        $raw = $this->nullableRaw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to string");
        }

        return $raw === null
            ? null
            : \strval($raw);
    }

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asBool(int|string $key, int|string|null $secondaryKey = null) : bool
    {
        $raw = $this->raw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to bool");
        }

        return \boolval($raw);
    }

    /**
     * returns one single element as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableBool(int|string $key, int|string|null $secondaryKey = null) : bool|null
    {
        $raw = $this->nullableRaw($key, $secondaryKey);

        if (\is_array($raw)) {
            throw new InputWrapperException("cannot convert array to bool");
        }

        return $raw === null
            ? null
            : \boolval($raw);
    }

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asArray(int|string $key, int|string|null $secondaryKey = null) : array
    {
        $raw = $this->raw($key, $secondaryKey);

        if (!\is_array($raw)) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $raw;
    }

    /**
     * returns one single element as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asNullableArray(int|string $key, int|string|null $secondaryKey = null) : array|null
    {
        $raw = $this->nullableRaw($key, $secondaryKey);

        if (!\is_array($raw) && !\is_null($raw)) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $raw;
    }

    /**
     * returns one file
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key            key to use
     * @param           int|string|null     $secondaryKey   optional secondary key for multidimensional arrays
     */
    public function asFile(int|string $key, int|string|null $secondaryKey = null) : array
    {
        $raw = $this->raw($key, $secondaryKey);

        if (!\is_array($raw)) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $raw;
    }
}
