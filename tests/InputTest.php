<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputInterface.php";
require_once dirname(__DIR__)."/src/Input.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Input;
use DavidLienhard\InputWrapper\InputCollection;
use DavidLienhard\InputWrapper\InputCollectionInterface;
use DavidLienhard\InputWrapper\InputInterface;
use PHPUnit\Framework\TestCase;

class InputTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testCanBeCreated(): void
    {
        $input = new Input;
        $this->assertInstanceOf(Input::class, $input);
        $this->assertInstanceOf(InputInterface::class, $input);
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testGetReturnsCollection(): void
    {
        $input = new Input;

        $get = $input->get();
        $this->assertInstanceOf(InputCollection::class, $get);
        $this->assertInstanceOf(InputCollectionInterface::class, $get);
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testPostReturnsCollection(): void
    {
        $input = new Input;

        $post = $input->post();
        $this->assertInstanceOf(InputCollection::class, $post);
        $this->assertInstanceOf(InputCollectionInterface::class, $post);
    }
}
