<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateModal extends Component
{

   
    public $route;
    public $entity;
   
    /**
     * Create a new component instance.
     */
    public function __construct($route,$entity)
    {
        
        $this->route=$route;
        $this->entity=$entity;
     
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.update-modal');
    }
}
