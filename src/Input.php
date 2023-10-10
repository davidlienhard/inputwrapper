<?php declare(strict_types=1);

/**
 * wrapper for superglobals like post & get
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\InputWrapper;

use DavidLienhard\InputWrapper\InputCollection;
use DavidLienhard\InputWrapper\InputCollectionInterface;
use DavidLienhard\InputWrapper\InputInterface;

/**
 * wraps superglobals into an object
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class Input implements InputInterface
{
    /** contents of get superglobal */
    private InputCollectionInterface $get;

    /** contents of post superglobal */
    private InputCollectionInterface $post;


    /**
     * store contents of superglobals in this object
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function __construct()
    {
        $this->get = new InputCollection($_GET);
        $this->post = new InputCollection($_POST);
    }

    public function get() : InputCollectionInterface
    {
        return $this->get;
    }

    public function post() : InputCollectionInterface
    {
        return $this->post;
    }
}
