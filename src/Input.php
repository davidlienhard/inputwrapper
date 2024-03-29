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


    /** contents of files superglobal */
    private InputCollectionInterface $files;


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
        $this->files = new InputCollection($_FILES);
    }

    /**
     * returns the contents of the _GET superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function get() : InputCollectionInterface
    {
        return $this->get;
    }

    /**
     * returns the contents of the _POST superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function post() : InputCollectionInterface
    {
        return $this->post;
    }

    /**
     * returns the contents of the _FILES superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function files() : InputCollectionInterface
    {
        return $this->files;
    }
}
