<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class Navbar extends Component
{
    public ?string $curFirstRouteSegment;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //
        $firstRouteSegmentIndex = 1;
        $this->curFirstRouteSegment = $request->segment($firstRouteSegmentIndex);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }

    public function getActiveClassBySegment(?string $segment): string
    {
        if ($segment === $this->curFirstRouteSegment) {
            return 'active';
        }

        return '';
    }
}
