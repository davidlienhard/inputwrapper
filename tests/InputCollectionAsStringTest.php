<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAsStringTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsStringThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->asString("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsStringReturnsDataAsString(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => "1"
            ],
            [
                "input"    => 0,
                "expected" => "0"
            ],
            [
                "input"    => 0.0,
                "expected" => "0"
            ],
            [
                "input"    => -5,
                "expected" => "-5"
            ],
            [
                "input"    => 10,
                "expected" => "10"
            ],
            [
                "input"    => 0.5,
                "expected" => "0.5"
            ],
            [
                "input"    => 10.4,
                "expected" => "10.4"
            ],
            [
                "input"    => true,
                "expected" => "1"
            ],
            [
                "input"    => false,
                "expected" => "0"
            ],
            [
                "input"    => null,
                "expected" => ""
            ],
            [
                "input"    => "test",
                "expected" => "test"
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asString("key");
            $this->assertIsString($value);
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsStringThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asString("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableStringReturnsNullOnInexistentValue(): void
    {
        $collection = new InputCollection([]);
        $this->assertNull($collection->asNullableString("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableStringThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asNullableString("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableStringReturnsDataAsString(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => "1"
            ],
            [
                "input"    => 0,
                "expected" => "0"
            ],
            [
                "input"    => 0.0,
                "expected" => "0"
            ],
            [
                "input"    => -5,
                "expected" => "-5"
            ],
            [
                "input"    => 10,
                "expected" => "10"
            ],
            [
                "input"    => 0.5,
                "expected" => "0.5"
            ],
            [
                "input"    => 10.4,
                "expected" => "10.4"
            ],
            [
                "input"    => true,
                "expected" => "1"
            ],
            [
                "input"    => false,
                "expected" => "0"
            ],
            [
                "input"    => null,
                "expected" => null
            ],
            [
                "input"    => "test",
                "expected" => "test"
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asNullableString("key");
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }
}
