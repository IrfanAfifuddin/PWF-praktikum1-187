<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $url;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct($url, $name = 'Delete Product')
    {
        $this->url = $url;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-product');
    }
}
