<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/Exception.php";
require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\Exception as InputWrapperException;
use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAsBoolTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsBoolThrowsOnInexistentValue(): void
    {
        $collection = new InputCollection([]);

        $this->expectException(InputWrapperException::class);
        $collection->asBool("doesnotexist");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsBoolReturnsDataAsBool(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => true
            ],
            [
                "input"    => 0,
                "expected" => false
            ],
            [
                "input"    => 0.0,
                "expected" => false
            ],
            [
                "input"    => -5,
                "expected" => true
            ],
            [
                "input"    => 10,
                "expected" => true
            ],
            [
                "input"    => 0.5,
                "expected" => false
            ],
            [
                "input"    => 10.4,
                "expected" => true
            ],
            [
                "input"    => true,
                "expected" => true
            ],
            [
                "input"    => false,
                "expected" => false
            ],
            [
                "input"    => null,
                "expected" => false
            ],
            [
                "input"    => "test",
                "expected" => true
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asBool("key");
            $this->assertIsBool($value);
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsBoolThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asBool("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableBoolReturnsNullOnInexistentValue(): void
    {
        $collection = new InputCollection([]);
        $this->assertNull($collection->asNullableBool("doesnotexist"));
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableBoolThrowsOnArray(): void
    {
        $collection = new InputCollection([ "key" => []]);
        $this->expectException(InputWrapperException::class);
        $collection->asNullableBool("key");
    }

    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAsNullableBoolReturnsDataAsBool(): void
    {
        $testData = [
            [
                "input"    => 1,
                "expected" => true
            ],
            [
                "input"    => 0,
                "expected" => false
            ],
            [
                "input"    => 0.0,
                "expected" => false
            ],
            [
                "input"    => -5,
                "expected" => true
            ],
            [
                "input"    => 10,
                "expected" => true
            ],
            [
                "input"    => 0.5,
                "expected" => false
            ],
            [
                "input"    => 10.4,
                "expected" => true
            ],
            [
                "input"    => true,
                "expected" => true
            ],
            [
                "input"    => false,
                "expected" => false
            ],
            [
                "input"    => null,
                "expected" => null
            ],
            [
                "input"    => "test",
                "expected" => true
            ]
        ];

        foreach ($testData as $case) {
            $collection = new InputCollection([ "key" => $case['input'] ]);
            $value = $collection->asNullableBool("key");
            $this->assertEquals($case['expected'], $value, "given input: ".$case['input']);
        }
    }
}
