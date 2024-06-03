<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class datatabel extends Component
{
    /**
     * Create a new component instance.
     */
     public $id;
    public $columns;
    
    public function __construct(string $id,array $columns)
    {

     $this->id= $id;
     $this->columns=$columns;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatabel');
    }
}
