<?php

namespace RZT\Taskhub\Tests\Unit\ViewHelpers;

use RZT\Taskhub\ViewHelpers\ComparisonViewHelper;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContext;

class ComparisonViewHelperTest extends UnitTestCase
{
    /**
     * @var ComparisonViewHelper
     */
    protected $viewHelper;

    /**
     * Set up the test case
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->viewHelper = new ComparisonViewHelper();
    }

    /**
     * @test
     */
    public function viewHelperComparesLessThanCorrectly()
    {
        $arguments = [
            'value' => 5,
            'comparison' => 'lessThan',
            'compareTo' => 10,
        ];

        $result = ComparisonViewHelper::renderStatic(
            $arguments,
            function () {},
            $this->getMockBuilder(RenderingContext::class)->disableOriginalConstructor()->getMock()
        );

        static::assertTrue($result);
    }

    /**
     * @test
     */
    public function viewHelperComparesGreaterThanCorrectly()
    {
        $arguments = [
            'value' => 15,
            'comparison' => 'greaterThan',
            'compareTo' => 10,
        ];

        $result = ComparisonViewHelper::renderStatic(
            $arguments,
            function () {},
            $this->getMockBuilder(RenderingContext::class)->disableOriginalConstructor()->getMock()
        );

        static::assertTrue($result);
    }

    /**
     * @test
     */
    public function viewHelperComparesEqualCorrectly()
    {
        $arguments = [
            'value' => 10,
            'comparison' => 'equals',
            'compareTo' => 10,
        ];

        $result = ComparisonViewHelper::renderStatic(
            $arguments,
            function () {},
            $this->getMockBuilder(RenderingContext::class)->disableOriginalConstructor()->getMock()
        );

        static::assertTrue($result);
    }

    /**
     * @test
     */
    public function viewHelperComparesWithNowCorrectly()
    {
        $now = new \DateTime();
        $pastDate = (new \DateTime())->modify('-1 day');

        $arguments = [
            'value' => $pastDate,
            'comparison' => 'lessThan',
            'compareTo' => 'now',
        ];

        $result = ComparisonViewHelper::renderStatic(
            $arguments,
            function () {},
            $this->getMockBuilder(RenderingContext::class)->disableOriginalConstructor()->getMock()
        );

        static::assertTrue($result);
    }

    /**
     * @test
     */
    public function viewHelperThrowsExceptionForInvalidComparison()
    {
        $this->expectException(\InvalidArgumentException::class);

        $arguments = [
            'value' => 5,
            'comparison' => 'invalidComparison',
            'compareTo' => 10,
        ];

        ComparisonViewHelper::renderStatic(
            $arguments,
            function () {},
            $this->getMockBuilder(RenderingContext::class)->disableOriginalConstructor()->getMock()
        );
    }
}
