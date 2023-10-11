<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAsArrayTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsArrayThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->asArray("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsArrayThrowsOnNonArrayInput(): void
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
            null,
            "test"
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case ]);

            $this->expectException(InputWrapperException::class);
            $collection->asArray("key");
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsArrayReturnsDataAsArray(): void
    {
        $testData = [
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
            $value = $collection->asArray("key");
            $this->assertIsArray($value);
            $this->assertEquals($case, $value);
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableArrayReturnsNullOnInexistentValue(): void
    {
        $collection = new InputCollection([]);
        $this->assertNull($collection->asNullableArray("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableArrayThrowsOnNonArrayInput(): void
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
            "test"
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case ]);

            $this->expectException(InputWrapperException::class);
            $collection->asNullableArray("key");
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableArrayReturnsDataAsArrayOrNull(): void
    {
        $testData = [
            [],
            [
                "key"   => 1,
                "value" => "test"
            ],
            [
                "list",
                "to",
                "test"
            ],
            null
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case ]);
            $value = $collection->asNullableArray("key");
            $this->assertEquals($case, $value);
        }
    }
}
