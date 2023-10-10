<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\InputCollection;
use DavidLienhard\InputWrapper\InputCollectionInterface;
use PHPUnit\Framework\TestCase;

class InputCollectionTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testCannotBeCreatedWithoutParameters(): void
    {
        $this->expectException(\ArgumentCountError::class);
        // phpcs:ignore
        $collection = new InputCollection;
    }
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testCanBeCreated(): void
    {
        $collection = new InputCollection([]);
        $this->assertInstanceOf(InputCollection::class, $collection);
        $this->assertInstanceOf(InputCollectionInterface::class, $collection);
    }
}
