<?php declare(strict_types=1);

/**
 * wrapper for superglobals like post & get
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

use DavidLienhard\InputWrapper\InputCollectionInterface;

/**
 * wraps superglobals into an object
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


    /**
     * returns the contents of the _GET superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function get() : InputCollectionInterface;


    /**
     * returns the contents of the _POST superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function post() : InputCollectionInterface;


    /**
     * returns the contents of the _FILES superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function files() : InputCollectionInterface;
}
