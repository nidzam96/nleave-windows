<html>
<head>
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}

	
</head>
<body>

<p>Hello HR,<br>
   Please approve {{ Auth::user()->name }}’s claim.</p>

<p>{{ Auth::user()->name }} has applied for claim with the corresponding details.</p>

<br>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Month</th>
				<th>Claim Type</th>
				<th>Date Application</th>

				@if ($namount)

					<th>Particular</th>
					<th>Bus. Reg. No.</th>
					<th>GST No.</th>
					<th>Amount</th>

				@elseif ($eamount)

					<th>Particular</th>
					<th>Bus. Reg. No.</th>
					<th>GST No.</th>
					<th>Existing Client Amount</th>
					<th>Potential Client Amount</th>
					<th>Supplier Amount</th>
					<th>Amount</th>

				@else

					<th>Client Name</th>
					<th>Destination</th>
					<th>Toll</th>
					<th>Parking Amount</th>
					<th>Accomodation Amount</th>
					<th>Allowance</th>
					<th>Mileage</th>
					<th>Amount</th>

				@endif
			</tr>	
		</thead>

		<tbody>
			<tr>
				<td> {{ $month }} </td>
				<td> {{ $type }} </td>
				<td> {{ $date }} </td>

				@if ($namount)

					<td> {{ $particular }} </td>
					<td> {{ $brn }} </td>
					<td> {{ $gstno }} </td>
					<td> {{ $namount }} </td>

				@elseif ($eamount)

					<td> {{ $particular }} </td>
					<td> {{ $brn }} </td>
					<td> {{ $gstno }} </td>
					<td> {{ $exsclient }} </td>
					<td> {{ $potclient }} </td>
					<td> {{ $suplier }} </td>
					<td> {{ $eamount }} </td>

				@else

					<td> {{ $client_name }} </td>
					<td> {{ $destination }} </td>
					<td> {{ $toll }} </td>
					<td> {{ $parking }} </td>
					<td> {{ $accomodation }} </td>
					<td> {{ $allowance }} </td>
					<td> {{ $mileage }} </td>
					<td> {{ $tramount }} </td>

				@endif
			</tr>
		</tbody>
	</table>
</div>

<p>The approval for this application belongs to you, so do keep this e-mail safe.</p>

  {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
  {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
	
</body>

</html>