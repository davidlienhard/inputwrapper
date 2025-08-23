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

    /** contents of files superglobal */
    private InputCollectionInterface $files;

    /** contents of server superglobal */
    private InputCollectionInterface $server;

    /** contents of session superglobal */
    private InputCollectionInterface $session;


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
        $this->server = new InputCollection($_SERVER);
        $this->session = new InputCollection($_SESSION ?? []);
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

    /**
     * returns the contents of the _SERVER superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function server() : InputCollectionInterface
    {
        return $this->server;
    }

    /**
     * returns the contents of the _SESSION superglobal as an InputCollectionInterface
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     */
    public function session() : InputCollectionInterface
    {
        return $this->session;
    }

    /**
     * adds payload to get data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       array      $payload        payload to add
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
     * @param       array      $payload        payload to add
     */
    public function addPostPayload(array $payload) : void
    {
        $this->post = new InputCollection($payload);
    }

    /**
     * adds payload to files data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       array      $payload        payload to add
     */
    public function addFilesPayload(array $payload) : void
    {
        $this->files = new InputCollection($payload);
    }

    /**
     * adds payload to server data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       array      $payload        payload to add
     */
    public function addServerPayload(array $payload) : void
    {
        $this->server = new InputCollection($payload);
    }

    /**
     * adds payload to session data
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param       array      $payload        payload to add
     */
    public function addSessionPayload(array $payload) : void
    {
        $this->session = new InputCollection($payload);
    }
}
