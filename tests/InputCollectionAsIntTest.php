<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAsIntTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testIssetExistingValueReturnTrue(): void
    {
        $collection = new InputCollection([ "key" => "value" ]);
        $this->assertTrue($collection->isset("key"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsIntThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->asInt("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsIntReturnsDataAsInt(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => 1
            ],
            [
                "input"    => 0,
                "expected" => 0
            ],
            [
                "input"    => -5,
                "expected" => -5
            ],
            [
                "input"    => 10,
                "expected" => 10
            ],
            [
                "input"    => 0.5,
                "expected" => 0
            ],
            [
                "input"    => 10.4,
                "expected" => 10
            ],
            [
                "input"    => true,
                "expected" => 1
            ],
            [
                "input"    => false,
                "expected" => 0
            ],
            [
                "input"    => null,
                "expected" => 0
            ],
            [
                "input"    => "test",
                "expected" => 0
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asInt("key");
            $this->assertIsInt($value);
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsIntThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asInt("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableIntReturnsNullOnInexistentValue(): void
    {
        $collection = new InputCollection([]);
        $this->assertNull($collection->asNullableInt("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableIntThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asNullableInt("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableIntReturnsDataAsInt(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => 1
            ],
            [
                "input"    => 0,
                "expected" => 0
            ],
            [
                "input"    => -5,
                "expected" => -5
            ],
            [
                "input"    => 10,
                "expected" => 10
            ],
            [
                "input"    => 0.5,
                "expected" => 0
            ],
            [
                "input"    => 10.4,
                "expected" => 10
            ],
            [
                "input"    => true,
                "expected" => 1
            ],
            [
                "input"    => false,
                "expected" => 0
            ],
            [
                "input"    => null,
                "expected" => null
            ],
            [
                "input"    => "test",
                "expected" => 0
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asNullableInt("key");
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }
}
