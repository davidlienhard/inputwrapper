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

    public function get() : InputCollectionInterface;

    public function post() : InputCollectionInterface;
}
