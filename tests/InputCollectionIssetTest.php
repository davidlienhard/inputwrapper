<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionIssetTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testIssetInexistentValueReturnFalse(): void
    {
        $collection = new InputCollection([]);
        $this->assertFalse($collection->isset("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testIssetExistingValueReturnTrue(): void
    {
        $collection = new InputCollection([ "key" => "value" ]);
        $this->assertTrue($collection->isset("key"));
    }
}
