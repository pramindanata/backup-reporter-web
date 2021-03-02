<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $variant;
    public bool $dismissable;
    public ?string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $variant, ?string $title = null, bool $dismissable = false)
    {
        //
        $this->variant = $variant;
        $this->title = $title;
        $this->dismissable = $dismissable;
    }

    public function getDismissClass()
    {
        if ($this->dismissable) {
            return 'fade show alert-dismissible';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.base.alert');
    }
}
