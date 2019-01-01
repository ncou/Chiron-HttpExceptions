<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception;

use Chiron\Http\Exception\HttpException;
use PHPUnit\Framework\TestCase;

abstract class HttpExceptionTestCase extends TestCase
{
    protected $defaultHeaders = [];

    public function headerDataProvider()
    {
        return [
            [['X-Test' => 'Test']],
            [['X-Test' => 1]],
            [
                [
                    ['X-Test' => 'Test'],
                    ['X-Test-2' => 'Test-2'],
                ],
            ],
        ];
    }

    public function testHeadersDefault()
    {
        $exception = $this->createException();
        $this->assertSame($this->defaultHeaders, $exception->getHeaders());
    }

    /**
     * @dataProvider headerDataProvider
     */
    public function testHeadersSetter($headers)
    {
        $exception = $this->createException();
        $exception->setHeaders($headers);
        $this->assertSame($headers, $exception->getHeaders());
    }

    public function testPropertiesGetterSetter()
    {
        $exception = $this->createException();

        $exception->setTitle('foo');
        $this->assertSame($exception->getTitle(), 'foo');

        $exception->setDetail('bar');
        $this->assertSame($exception->getDetail(), 'bar');

        $exception->setType('uri:foobar');
        $this->assertSame($exception->getType(), 'uri:foobar');

        $exception->setInstance('uri:foobar');
        $this->assertSame($exception->getInstance(), 'uri:foobar');
    }

    public function testSerialization()
    {
        // first part of the test
        $exception = $this->createException();

        $problem = $exception->toArray();

        $this->assertArrayHasKey('status', $problem);
        $this->assertEquals($exception->getStatusCode(), $problem['status']);

        $this->assertArrayHasKey('title', $problem);
        $this->assertEquals($exception->getTitle(), $problem['title']);

        $this->assertArrayHasKey('detail', $problem);
        $this->assertEquals($exception->getDetail(), $problem['detail']);

        $this->assertArrayHasKey('type', $problem);
        $this->assertEquals($exception->getType(), $problem['type']);

        $this->assertArrayNotHasKey('instance', $problem);

        // second part of the test
        $exception->setInstance('foo:bar');

        $problem = $exception->toArray();

        $this->assertArrayHasKey('instance', $problem);
        $this->assertEquals($exception->getInstance(), $problem['instance']);

        // thrid part of the test
        $exception->setAdditionalData(['foo' => 'bar']);
        $exception->addAdditionalData('foobar', false); // check false or empty value are not removed
        $exception->addAdditionalData('type', ''); // check additional data doesn't overide the default fields

        $problem = $exception->toArray();

        $this->assertArrayHasKey('foo', $problem);
        $this->assertEquals($problem['foo'], 'bar');

        $this->assertArrayHasKey('foobar', $problem);
        $this->assertEquals($problem['foobar'], false);

        $this->assertArrayHasKey('type', $problem);
        $this->assertEquals($exception->getType(), $problem['type']);

        // forth part of the test
        $json = json_encode($exception);
        $this->assertEquals(json_encode($exception->toArray()), $json);
    }

    abstract protected function createException();
}
