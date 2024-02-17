<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionRawTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testRawThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->raw("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testRawReturnsDataInSameFormat(): void
    {
        $testData = [
            1,
            0,
            0.0,
            -5,
            10,
            0.5,
            10.4,
            true,
            false,
            "test",
            [],
            [
                "key"   => 1,
                "value" => "test"
            ],
            [
                "list",
                "to",
                "test"
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case ]);
            $value = $collection->raw("key");
            $this->assertEquals($case, $value);
        }
    }
}
