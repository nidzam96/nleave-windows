@extends('admin.layout')

@section('pagetitle','Claim')

@section('section')
    <div class="section-2">    

        <!-- <div class="tab-content">
            <div class="col-md-12">
                <div class="row">
                	
                	<div class="col-md-3">
                		<img src="{{ asset('/images/images.jpeg') }}" alt="testing" class="img-responsive" >
                	</div>
                </div>
            </div>
        </div> -->

        <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#claim" role="tab" data-toggle="tab" aria-controls="claim" id="tabClaim">
                        Claim
                    </a>
                </li>
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#claim_App" role="tab" data-toggle="tab" aria-controls="claim_App" id="tabclaim_App">
                        View Claim
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">

        	<div class="tab-pane active" id="claim" role="tabpanel">
                
                @if ($errors->normal->all() )
                    <div class="alert alert-danger" role="alert">
                        <p>Validation error.</p>
                        <ul>
                            @foreach ($errors->normal->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($errors->entertainment->all() )
                    <div class="alert alert-danger" role="alert">
                        <p>Validation error.</p>
                        <ul>
                            @foreach ($errors->entertainment->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($errors->travel->all() )
                    <div class="alert alert-danger" role="alert">
                        <p>Validation error.</p>
                        <ul>
                            @foreach ($errors->travel->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        		<section class="section-secondary section-team">
					<div class="section-body" style="margin-top: 20px">
    					<div class="panel panel-primary">	
                            <div class="panel-heading">
                                <span class="fa fa-plus fa-fw"></span>
                                New Claim
                            </div>

                            <div class="panel-body">       
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <canvas id="barClaim" width="400" height="400"></canvas>
                                    </div>

                                    <div class="col-md-5 col-md-offset-1 top20">
                                        <form method="POST" action="{{ route('claim.create') }}">
                                            {{ csrf_field() }}

                                            <div class="row">
                                                <label>Claim for month :</label>
                                                <input type="month" id="c_month" name="c_month" style="border-radius: 5px">
                                            </div>

                                            <div class="row top20">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label>Claim Type</label>
                                                        <select id="c_type" name="c_type" class="form-control" required="required">
                                                            <option value="">Please select type</option>
                                                            @foreach ($claim as $claims)
                                                                <option value="{{ $claims->id }}">{{ $claims->claim_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="row top20">
                                                        <label>Date</label>
                                                        <input type="date" id="c_date" name="c_date" class="form-control" required="required">
                                                    </div>
                                                    
                                                    <div id="normal-claim">
                                                        <div class="row top20">
                                                            <label>Particular</label>
                                                            <input type="text" name="c_particular" class="form-control" placeholder="*Your particular here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Business Reg. No</label>
                                                            <input type="text" name="c_brn" class="form-control" placeholder="*Business Registeration Number Here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>GST No</label>
                                                            <input type="text" name="c_gstno" class="form-control" placeholder="*GST Number Here">
                                                        </div>

                                                        <div id="normal-amount" class="row top20">
                                                            <label>Amount</label>
                                                            <input type="text" name="c_namount" class="form-control" placeholder="*Claim amount Here">
                                                        </div>

                                                        <div id="entertainment-amount">
                                                            <div class="row top20">
                                                                <label>Existing Client</label>
                                                                <input type="text" name="exsclient_amount" class="form-control" placeholder="*Amount spent on existing client">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Potential Client</label>
                                                                <input type="text" name="potclient_amount" class="form-control" placeholder="*Amount spent on potential client">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Supplier</label>
                                                                <input type="text" name="suplier_amount" class="form-control" placeholder="*Amount spent on supplier">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Amount</label>
                                                                <input type="text" name="c_eamount" class="form-control" placeholder="*Claim amount here">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="travel-claim">
                                                        <div class="row top20">
                                                            <label>Client</label>
                                                            <input type="text" name="client_name" class="form-control" placeholder="*Client name here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Destination</label>
                                                            <input type="text" name="destination" class="form-control" placeholder="*Destination here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Toll</label>
                                                            <input type="text" name="toll" class="form-control" placeholder="*Total amount for toll here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Parking Total</label>
                                                            <input type="text" name="parking" class="form-control" placeholder="*Total amount for parking here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Accomodation Total</label>
                                                            <input type="text" name="accomodation" class="form-control" placeholder="*Total amount for accomodation here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Allowance</label>
                                                            <input type="text" name="allowance" class="form-control" placeholder="*Allowance here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Mileage | KM</label>
                                                            <input type="text" name="mileage" class="form-control" placeholder="*Total travel here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Amount</label>
                                                            <input type="text" name="amount" class="form-control" placeholder="*Claim amount here">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row top20">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                      
                            </div>
                        </div>
					</div>
				</section>
        	</div>

        	<div class="tab-pane" id="claim_App" role="tabpanel">
                <section class="section-secondary section-team">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="top20">
                                <h2 class="title">Claim Summary</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-body" style="margin-top: 20px">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="claimTable">
                                <thead>
                                    <tr>
                                        @if (Auth::user()->position == 'HR')
                                            <th>Employee</th>
                                            <th>Position</th>
                                        @endif
                                            <th>Application Date</th>
                                            <th>Claim Type</th>
                                            <th>Claim for Month</th>
                                            <th>Particular</th>
                                            <th>Bus. Reg. Np</th>
                                            <th>GST No</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                    </tr>
                                </thead>

                                @foreach ($claim_app as $claim)
                                    <tbody>
                                        <tr>
                                            @if (Auth::user()->position == 'HR')
                                                <td>{{ $claim->user->name }}</td>
                                                <td>{{ $claim->user->position }}</td>
                                            @endif
                                                <td>{{ $claim->date }}</td>
                                                <td>{{ $claim->claim->claim_name }}</td>
                                                <td>{{ $claim->month }}</td>
                                                <td>{{ $claim->particular }}</td>
                                                <td>{{ $claim->brn }}</td>
                                                <td>{{ $claim->gstno }}</td>
                                                <td>{{ $claim->total_amount }}</td>
                                                
                                            @if (Auth()->user()->position == 'HR')
                                                    <td>
                                                        <h2 class="btn btn-info">{{ $claim->status }}</h2>
                                                        
                                                        @if ($claim->status == 'Pending')

                                                        <br>
                                                        <br>

                                                        <a href="{{ route('claim.approve', $claim->id) }}" type="button" class="btn btn-default">Approve</a>

                                                        <button class="btn btn-danger">
                                                            Reject
                                                        </button>
                                                    </td>
                                                @endif
                                            @else
                                                <td>{{ $claim->status }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                                
                                {{ $claim_app->appends(Request::except('page'))->links() }}

                            </table>

                            {{ $claim_app->appends(Request::except('page'))->links() }}

                        </div>
                    </div>
                </section>
        	</div>

        </div>

    </div>
@endsection

@section ('extrascripts')
    <script type="text/javascript">

        //create bar chart for claim application
        var data_amount = <?php echo $amount; ?>;
        var data_month  = <?php echo $month; ?>;
        console.log(data_amount, data_month)

        var barChartData = {
            labels: data_month,
            datasets: [{
              label: 'Amount claim this month',
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(48, 57, 217, 0.5)',
                  'rgba(255, 126, 87, 0.5)',
                  'rgba(255, 235, 87, 0.5)',
                  'rgba(87, 255, 252, 0.5)',
                  'rgba(255, 97, 208, 0.5)',
                  'rgba(98, 243, 152, 0.5)',
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(48, 57, 217, 1)',
                  'rgba(255, 126, 87, 1)',
                  'rgba(255, 235, 87, 1)',
                  'rgba(87, 255, 252, 1)',
                  'rgba(255, 97, 208, 1)',
                  'rgba(98, 243, 152, 1)'
              ],
              borderWidth: 1,
              data: data_amount
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("barClaim");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    responsive: true,
                }
            });
        };
    </script>
@endsection
