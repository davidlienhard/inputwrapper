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
     * @param           int|string          $key         key to use
     */
    public function isset(int|string $key) : bool
    {
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
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist
     */
    public function raw(int|string $key) : int|float|string|bool|array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        return $this->data[$key];
    }

    /**
     * returns one single element as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asInt(int|string $key) : int
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to int");
        }

        return \intval($this->data[$key]);
    }

    /**
     * returns one single element as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableInt(int|string $key) : int|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to int");
        }

        return $this->data[$key] === null
            ? null
            : \intval($this->data[$key]);
    }

    /**
     * returns one single element as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asFloat(int|string $key) : float
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to float");
        }

        return \floatval($this->data[$key]);
    }

    /**
     * returns one single element as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableFloat(int|string $key) : float|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to float");
        }

        return $this->data[$key] === null
            ? null
            : \floatval($this->data[$key]);
    }

    /**
     * returns one single element as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asString(int|string $key) : string
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to string");
        }

        return \strval($this->data[$key]);
    }

    /**
     * returns one single element as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableString(int|string $key) : string|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to string");
        }

        return $this->data[$key] === null
            ? null
            : \strval($this->data[$key]);
    }

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asBool(int|string $key) : bool
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to bool");
        }

        return \boolval($this->data[$key]);
    }

    /**
     * returns one single element as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key cannot be converted
     */
    public function asNullableBool(int|string $key) : bool|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to bool");
        }

        return $this->data[$key] === null
            ? null
            : \boolval($this->data[$key]);
    }

    /**
     * returns one single element as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if key does not exist or cannot be converted
     */
    public function asArray(int|string $key) : array
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (!\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $this->data[$key];
    }

    /**
     * returns one single element as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     */
    public function asNullableArray(int|string $key) : array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            return null;
        }

        if (!\is_array($this->data[$key]) && !\is_null($this->data[$key])) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $this->data[$key];
    }
}
