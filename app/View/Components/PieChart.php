<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PieChart extends Component
{
    public $size;
    public $radius;
    public $value;
    public $max;
    public $unit;
    public $title;
    public $colorClass;
    public $strokeClass;
    public $fillClass;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $size = 100,
        $radius = 45,
        $value = 0,
        $max = 100,
        $unit = '',
        $title = '',
        $colorClass = 'purple',
        $strokeClass = 'stroke-purple',
        $fillClass = 'fill-purple'
    ) {
        $this->size = $size;
        $this->radius = $radius;
        $this->value = $value;
        $this->max = $max;
        $this->unit = $unit;
        $this->title = $title;
        $this->colorClass = $colorClass;
        $this->strokeClass = $strokeClass;
        $this->fillClass = $fillClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pie-chart');
    }
}
