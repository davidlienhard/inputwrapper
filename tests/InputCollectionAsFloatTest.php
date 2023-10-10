<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAsFloatTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsFloatThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->asFloat("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsFloatReturnsDataAsFloat(): void
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
                "input"    => 0.0,
                "expected" => 0.0
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
                "expected" => 0.5
            ],
            [
                "input"    => 10.4,
                "expected" => 10.4
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
            $value = $collection->asFloat("key");
            $this->assertIsFloat($value);
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsFloatThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asFloat("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableFloatReturnsNullOnInexistentValue(): void
    {
        $collection = new InputCollection([]);
        $this->assertNull($collection->asNullableFloat("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableFloatThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asNullableFloat("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableFloatReturnsDataAsFloat(): void
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
                "input"    => 0.0,
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
                "expected" => 0.5
            ],
            [
                "input"    => 10.4,
                "expected" => 10.4
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
            $value = $collection->asNullableFloat("key");
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }
}
