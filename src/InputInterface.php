<?php declare(strict_types=1);

/**
 * contains a custom mysql class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

use DavidLienhard\InputWrapper\InputCollectionInterface;

/**
 * Methods for a comfortable use of the {@link http://www.mysql.com mySQL} database
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
interface InputInterface
{
    /**
     * store contents of superglobals in this object
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function __construct();

    public function get() : InputCollectionInterface;

    public function post() : InputCollectionInterface;
}
