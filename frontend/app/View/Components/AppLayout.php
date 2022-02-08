<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Page title 
     */
    public string $title;

    /**
     * Header
     */
    public string $header;

    public function __construct(string $title = '')
    {
        $this->header = $title;
        $this->title = $title ? $title . ' • ' . config('app.name') : config('app.name');
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
