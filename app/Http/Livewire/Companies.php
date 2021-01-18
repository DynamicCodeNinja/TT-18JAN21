<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
    public function render()
    {
        $companies = Company::all();
        return view('livewire.companies', ['companies' => $companies]);
    }
}
