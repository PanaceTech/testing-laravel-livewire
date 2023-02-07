<div>
    <button class="btn btn-primary btn-sm mb-3" wire:click="openAddCountryModal()">Add New Country</button>
    <table class="table table-striped table-inverse table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Country</th>
                <th scope="col">Capital City</th>
                <th scope="col">Continent</th>
            </tr>
        </thead>
        <tbody>
            
            @forelse($countries as $country)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $country->country_name }}</td>
                <td>{{ $country->capital_city }}</td>
                <td>{{ $country->continent->continent_name }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No country found!</td>
            </tr>
            @endforelse

        </tbody>
    </table>


    @include('modals.add-country')
</div>
