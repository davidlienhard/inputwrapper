<?php declare(strict_types=1);

/**
 * contains a custom mysql class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollectionInterface;

/**
 * Methods for a comfortable use of the {@link http://www.mysql.com mySQL} database
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class InputCollection implements InputCollectionInterface
{
    /**
     * connects to the database
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
     * @return          array<(int|string), (int|float|string|bool|array|null)>
     */
    public function isset(int|string $key) : bool
    {
        return \array_key_exists($key, $this->data);
    }

    /**
     * returns the whole row as an array
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
     * returns one single element from the row
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function raw(int|string $key) : int|float|string|bool|array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        return $this->data[$key];
    }

    /**
     * returns one single element from the row as an int
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
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
     * returns one single element from the row as an int or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableInt(int|string $key) : int|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to int");
        }

        return $this->data[$key] === null
            ? null
            : \intval($this->data[$key]);
    }

    /**
     * returns one single element from the row as a float
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
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
     * returns one single element from the row as a float or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableFloat(int|string $key) : float|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to float");
        }

        return $this->data[$key] === null
            ? null
            : \floatval($this->data[$key]);
    }

    /**
     * returns one single element from the row as a string
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
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
     * returns one single element from the row as a string or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableString(int|string $key) : string|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to string");
        }

        return $this->data[$key] === null
            ? null
            : \strval($this->data[$key]);
    }

    /**
     * returns one single element from the row as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
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
     * returns one single element from the row as a bool or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableBool(int|string $key) : bool|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (\is_array($this->data[$key])) {
            throw new InputWrapperException("cannot convert array to bool");
        }

        return $this->data[$key] === null
            ? null
            : \boolval($this->data[$key]);
    }

    /**
     * returns one single element from the row as a bool
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
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
     * returns one single element from the row as a array or null
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int|string          $key         key to use
     * @throws          \DavidLienhard\InputWrapper\Exception if any mysqli function failed
     */
    public function asNullableArray(int|string $key) : array|null
    {
        if (!\array_key_exists($key, $this->data)) {
            throw new InputWrapperException("key '".$key."' does not exist");
        }

        if (!\is_array($this->data[$key]) && !\is_null($this->data[$key])) {
            throw new InputWrapperException("cannot convert to array");
        }

        return $this->data[$key];
    }
}
