<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Post;
use Livewire\Component;
use Tenancy\Facades\Tenancy;

use Illuminate\Routing\Route;
use Illuminate\Contracts\Container\Container;

class Posts extends Component
{

    private ?Company $company = null;

    public $companies;

    protected $listeners = ['companyChanged' => 'changeCompany'];

    public function changeCompany($companyID)
    {
        $this->company = Company::findOrFail($companyID);
    }

    public function mount($company = null)
    {
        if(!is_null($company))
            $this->company = Company::findOrFail($company);

        $this->companies = Company::all();
    }

    public function render()
    {
        if(is_null($this->company))
            return view('livewire.posts', ['posts' => [], 'companies' => $this->companies]);

        Tenancy::setTenant($this->company);
        $posts = Post::all();
        return view('livewire.posts', ['posts' => $posts, 'companies' => $this->companies]);
    }
}
