@extends('layouts.app')

@section('content')
	@if (Session::has('success'))
		<div class="alert alert-success mt-2" role="alert">
			<strong>Success:</strong> {{ Session::get('success') }}
		</div>
	@endif 
	<div class="row text-center">
		<div class="col-md-12">
			<h1 class="jumbotron-heading" style="font-size: 6em; font-weight:bold;">The Price of Smoking</h1>
			<span class="lead text-muted ">How many cigaretts do you smoke per day?</span>
			<input type="number" id="input" v-model="number">
			<h3 class="mt-4">In one year, smoking costs you:</h3>
			<h2>$@{{ formatPrice(multiply) }}</h2>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card bg-light mt-5">
				<div class="card-body">
					<form method="POST" action="{{route('pledge.store')}}" class="justify-content-center">
						@csrf
						<div class="row">
							<div class="col-md-12 text-center">
								<h3>Make your pledge to quite today!</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="sr-only">Name</label>
									<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="name" value="{{ old('name') }}">
									@if ($errors->has('name'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="text" class="form-control" name="email" id="email" placeholder="email">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="savings" class="sr-only">Save Per Year</label>
									<input type="text" class="form-control" readonly="readonly" name="savings" id="savings" :placeholder="formatPrice(multiply)" v-model="formatPrice(multiply)">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="date" class="sr-only">Today's Date</label>
									<input type="text" class="form-control" readonly="readonly" name="date" id="date" placeholder={{ Carbon\Carbon::now()->format('m/d/Y') }} value={{ Carbon\Carbon::now()->format('m/d/Y') }}>
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-secondary">Submit Pledge</button>
							</div>
						</div>
					</form>	
					<span class="text-center" style="font-style:italic;">*Email is optional and is only used to send you progress reminders.</span>
				</div>
			</div>
		</div>
	</div>
<br>
	<div class="row">
		@foreach ($pledges as $pledge)
			<div class="col-sm-6 col-md-4 col-lg-2 mb-2">
				<div class="card" style="color:#202020;">
					<div class="card-body">
						<h3 class="card-title">{{ $pledge->name }} <span class="badge badge-success">{{ Carbon\Carbon::parse($pledge->date)->diffInDays(Carbon\Carbon::now()) }} days</span></h3>
						<p class="card-text">Saving ${{ $pledge->savings }}</p>
						
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection