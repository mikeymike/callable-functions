<?php


namespace PhpSchool\CallableFunctionsTest\Exercise;

use PhpSchool\CallableFunctions\Exercise\ArrayWeFilter;
use PhpSchool\PhpWorkshop\Exercise\ExerciseType;
use PhpSchool\PhpWorkshop\Solution\SolutionInterface;
use PhpSchool\PhpWorkshop\ExerciseDispatcher;
use PhpSchool\PhpWorkshop\Check\FunctionRequirementsCheck;
use PHPUnit_Framework_TestCase;

/**
 * Class ArrayWeFilterTest
 * @package PhpSchool\LearnYouPhpTest\Exercise
 */
class ArrayWeFilterTest extends PHPUnit_Framework_TestCase
{
    public function testArrayWeMapExercise()
    {
        $e = new ArrayWeFilter();
        $this->assertEquals('Array we filter!', $e->getName());
        $this->assertEquals('Exercice with array filter', $e->getDescription());
        $this->assertEquals(ExerciseType::CLI, $e->getType());

        $this->assertEquals([1, 2, 3, 4, 5], $e->getArgs());

        $this->assertInstanceOf(SolutionInterface::class, $e->getSolution());
        $this->assertFileExists(realpath($e->getProblem()));
        $this->assertNull($e->tearDown());
    }

    public function testFunctionRequirements()
    {
        $e = new ArrayWeFilter();
        $this->assertEquals(['array_filter'], $e->getRequiredFunctions());
        $this->assertEquals([], $e->getBannedFunctions());
    }

    public function testConfigure()
    {
        $dispatcher = $this->getMockBuilder(ExerciseDispatcher::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dispatcher
            ->expects($this->once())
            ->method('requireCheck')
            ->with(FunctionRequirementsCheck::class);
        $e = new ArrayWeFilter();
        $e->configure($dispatcher);
    }
}
