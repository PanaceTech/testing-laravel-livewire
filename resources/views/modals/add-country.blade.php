<div class="modal fade addCountry" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" wire:submit.prevent="save">
					<div class="form-group">
						<label for="">Continent</label>
						<select class="form-control" wire:model="continent">
							<option value="">Select Continent</option>
							@foreach($continents as $continent)
							<option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
							@endforeach
						</select>
						<span class="text-danger">@error('continent') {{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label for="">Country Name</label>
						<input type="text" class="form-control" name="" placeholder="Country Name" wire:model="country">
						<span class="text-danger">@error('country') {{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Capital City</label>
						<input type="text" class="form-control" name="" placeholder="Capital City" wire:model="capital">
						<span class="text-danger">@error('capital') {{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>