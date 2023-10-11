<?php declare(strict_types=1);

namespace DavidLienhard;

require_once dirname(__DIR__)."/src/InputCollectionInterface.php";
require_once dirname(__DIR__)."/src/InputCollection.php";

use DavidLienhard\InputWrapper\InputCollection;
use PHPUnit\Framework\TestCase;

class InputCollectionAllTest extends TestCase
{
    /**
     * @covers \DavidLienhard\InputWrapper\InputCollection
     * @test
    */
    public function testAllReturnsDataInSameFormat(): void
    {
        $testDataNum = [
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

        $collection = new InputCollection($testDataNum);
        $value = $collection->all();
        $this->assertEquals($testDataNum, $value);


        $testDataAssoc = [
            "int1"         => 1,
            "int2"         => 0,
            "float1"       => 0.0,
            "negativeInt"  => -5,
            "postitiveInt" => 10,
            "float2"       => 0.5,
            "float3"       => 10.4,
            "boolTrue"     => true,
            "boolFalse"    => false,
            "null"         => null,
            "string"       => "test",
            "array1"       => [],
            "array2"       => [
                "key"   => 1,
                "value" => "test"
            ],
            "array3"       => [
                "list",
                "to",
                "test"
            ]
        ];

        $collection = new InputCollection($testDataAssoc);
        $value = $collection->all();
        $this->assertEquals($testDataAssoc, $value);
    }
}
