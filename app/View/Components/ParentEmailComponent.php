<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ParentEmailComponent extends Component
{
    public $parentsEmail;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parentsEmail = User::get()->pluck('email');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.parent-email-component');
    }
}