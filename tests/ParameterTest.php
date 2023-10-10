<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/InputCollection.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";

use DavidLienhard\Database\InputCollection;
use DavidLienhard\Database\InputCollectionInterface;
use PHPUnit\Framework\TestCase;

class InputCollectionTest extends TestCase
{
    /**
     * @covers \DavidLienhard\Database\InputCollection
     * @test
    */
    public function testCannotBeCreatedWithoutParameters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $collection = new InputCollection;
    }
    /**
     * @covers \DavidLienhard\Database\InputCollection
     * @test
    */
    public function testCanBeCreated(): void
    {
        $collection = new InputCollection([ ]);
        $this->assertInstanceOf(InputCollection::class, $collection);
        $this->assertInstanceOf(InputCollectionInterface::class, $collection);
    }
}
