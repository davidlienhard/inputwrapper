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
class Stub implements InputInterface
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
     * adds payload to get data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       string      $payload        payload to add
     */
    public function addGetPayload(array $payload) : void
    {
        $this->get = new InputCollection($payload);
    }

    /**
     * adds payload to post data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       string      $payload        payload to add
     */
    public function addPostPayload(array $payload) : void
    {
        $this->post = new InputCollection($payload);
    }
}
