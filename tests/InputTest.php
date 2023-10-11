<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputInterface.php";
require_once dirname(__DIR__)."/src/Input.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Input;
use DavidLienhard\InputWrapper\InputInterface;
use DavidLienhard\InputWrapper\InputCollection;
use DavidLienhard\InputWrapper\InputCollectionInterface;
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
        $this->assertInstanceOf(Input::class, $collection);
        $this->assertInstanceOf(InputInterface::class, $collection);
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testGetReturnsCollection(): void
    {
        $input = new Input;

        $get = $input->get();
        $this->assertInstanceOf(InputCollection::class, $collection);
        $this->assertInstanceOf(InputCollectionInterface::class, $collection);
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testPostReturnsCollection(): void
    {
        $input = new Input;

        $get = $input->post();
        $this->assertInstanceOf(InputCollection::class, $collection);
        $this->assertInstanceOf(InputCollectionInterface::class, $collection);
    }
}
