<?php

namespace RZT\Taskhub\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ComparisonViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function initializeArguments(): void
    {
        $this->registerArgument('value', 'mixed', 'The value to compare', true);
        $this->registerArgument('comparison', 'string', 'The comparison operator', true);
        $this->registerArgument('compareTo', 'mixed', 'The value to compare with', true);
    }

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $value = $arguments['value'];
        $comparison = $arguments['comparison'];
        $compareTo = $arguments['compareTo'];

        if ($compareTo === 'now') {
            $compareTo = new \DateTime();
        }

        switch ($comparison) {
            case 'lessThan':
                return $value < $compareTo;
            case 'lessThanOrEqual':
                return $value <= $compareTo;
            case 'greaterThan':
                return $value > $compareTo;
            case 'greaterThanOrEqual':
                return $value >= $compareTo;
            case 'equals':
                return $value == $compareTo;
            default:
                throw new \InvalidArgumentException('Invalid comparison operator');
        }
    }
}
