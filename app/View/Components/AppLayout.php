<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        if(Auth::user()->roles[0]->name == 'admin')
        {
            return view('layouts.Admin.app');
        }
        else if(Auth::user()->roles[0]->name == 'Employee')
        {
            return view('layouts.Employee.app');
        }
        else

        
        return view('layouts.app');
    }
}
