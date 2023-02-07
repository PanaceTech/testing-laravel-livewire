<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Continent;
use App\Models\Country;

class Countries extends Component
{
    public $continent, $country, $capital;

    public function render()
    {
        return view('livewire.countries', [
            'continents' => Continent::orderBy('continent_name', 'asc')->get(),
            'countries' => Country::orderBy('country_name', 'asc')->with('continent:id,continent_name')->get(),
        ]);
    }

    public function openAddCountryModal()
    {
        $this->dispatchBrowserEvent('openAddCountryModal');
    }

    public function save()
    {
        $this->validate([
            'continent' => 'required|exists:continents,id',
            'country' => 'required|string|unique:countries,country_name',
            'capital' => 'required|string',
        ]);

        $data = Country::create([
            'continent_id' => $this->continent,
            'country_name' => $this->country,
            'capital_city' => $this->capital,
        ]);

        if ($data) {
            $this->continent = '';
            $this->country = '';
            $this->capital = '';
            $this->dispatchBrowserEvent('closeAddCountryModal');
        }
    }
}
