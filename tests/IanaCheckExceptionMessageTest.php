<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception;

use Chiron\Http\Exception\HttpException;
use DOMDocument;
use DomXPath;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class IanaCheckExceptionMessageTest extends TestCase
{
    private const URL_IANA = 'https://www.iana.org/assignments/http-status-codes/http-status-codes.xml';

    /**
     * @dataProvider ianaCodesReasonPhrasesProvider
     *
     * @param mixed $code
     * @param mixed $reasonPhrase
     */
    public function testExceptionMessageDefaultsAgainstIana($code, $reasonPhrase): void
    {
        //echo $code. " - ". $reasonPhrase;

        if ($code < 400) {
            $this->assertTrue(true);
        } else {
            // generate the class name (should be the same as the error reason without space)
            if ($code >= 400 && $code <= 499) {
                $className = 'Chiron\\Http\\Exception\\Client\\' . $this->generateClasseName($reasonPhrase) . 'HttpException';
            }

            if ($code >= 500 && $code <= 599) {
                $className = 'Chiron\\Http\\Exception\\Server\\' . $this->generateClasseName($reasonPhrase) . 'HttpException';
            }

            $this->assertTrue(is_subclass_of($className, HttpException::class), 'Http Exeption Class "' . $className . '" doesnt exist !!!');

            $this->assertEquals(
                $reasonPhrase,
                $this->getClassConstructorParameters($className)['title'],
                'Expected Exception message for the code (' . $code . ') to return ' . $reasonPhrase
            );
        }
    }

    /**
     * Grab the reason phrase directly from the IANA specs.
     */
    public function ianaCodesReasonPhrasesProvider(): array
    {
        if (! in_array('https', stream_get_wrappers(), true)) {
            $this->markTestSkipped('The "https" wrapper is not available');
        }
        $ianaHttpStatusCodes = new DOMDocument();
        libxml_set_streams_context(stream_context_create([
            'http' => [
                'method'  => 'GET',
                'timeout' => 30,
            ],
        ]));
        $ianaHttpStatusCodes->load(self::URL_IANA);
        if (! $ianaHttpStatusCodes->relaxNGValidate(__DIR__ . '/schema/http-status-codes.rng')) {
            self::fail('Invalid IANA\'s HTTP status code list.');
        }
        $ianaCodesReasonPhrases = [];
        $xpath = new DomXPath($ianaHttpStatusCodes);
        $xpath->registerNamespace('ns', 'http://www.iana.org/assignments');
        $records = $xpath->query('//ns:record');
        foreach ($records as $record) {
            $value = $xpath->query('.//ns:value', $record)->item(0)->nodeValue;
            $description = $xpath->query('.//ns:description', $record)->item(0)->nodeValue;
            if (in_array($description, ['Unassigned', '(Unused)'], true)) {
                continue;
            }
            if (preg_match('/^([0-9]+)\s*\-\s*([0-9]+)$/', $value, $matches)) {
                for ($value = $matches[1]; $value <= $matches[2]; $value++) {
                    $ianaCodesReasonPhrases[] = [$value, $description];
                }
            } else {
                $ianaCodesReasonPhrases[] = [$value, $description];
            }
        }

        return $ianaCodesReasonPhrases;
    }

    /**
     * Return constructor parameters as array.
     *
     * @return array
     */
    private function getClassConstructorParameters(string $className): array
    {
        $ref = new ReflectionClass($className);
        if (! $ref->isInstantiable()) {
            return [];
        }

        $parameters = [];
        $constructor = $ref->getConstructor();
        $params = $constructor->getParameters();

        foreach ($params as $param) {
            $name = $param->getName();
            $parameters[$name] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : 'None';
        }

        return $parameters;
    }

    /**
     * Format a string as a class name (no space + camel case).
     *
     * @return array
     */
    private function generateClasseName(string $nameNotFormatted): string
    {
        $parts = explode(' ', $nameNotFormatted);
        $formatted = array_map(function ($part) {
            return ucwords(strtolower($part));
        }, $parts);

        return implode($formatted);
    }
}
