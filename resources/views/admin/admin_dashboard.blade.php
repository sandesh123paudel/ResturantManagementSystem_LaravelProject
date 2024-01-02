@extends('admin.layouts.app')

@section('content')
	

<section class="content-header">					
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Silver Point Restaurant</h1>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-6">                            
				<div class="small-box card">
					<div class="inner">
						<h3>{{ $totalOrders }}</h3>
						<p>Total Orders</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="{{ route('admin.orders') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-4 col-6">                            
				<div class="small-box card">
					<div class="inner">
						<h3>{{ $totalUsers }}</h3>
						<p>Total Customers</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="{{ route('admin.users') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-4 col-6">                            
				<div class="small-box card">
					<div class="inner">
						<h3>Rs.{{ $totalAmountEarned }}</h3>
						<p>Total Sales</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="{{ route('admin.orders') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>

					
					
				</div>
			</div>

			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<canvas id="dailyDataChart" width="400" height="200"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	<!-- /.card -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<canvas id="dailyOrdersChart" width="400" height="200"></canvas>
	<script>
        // Assuming you have a variable $dailyData containing daily orders and earnings for the month
        var dailyData = {!! json_encode($dailyData) !!};

        // Chart configuration
        var ctx = document.getElementById('dailyDataChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dailyData.labels, // Array of labels (dates)
                datasets: [{
                    label: 'Daily Orders',
                    data: dailyData.ordersData, // Array of daily orders count
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Earned Amount',
                    data: dailyData.earnedData, // Array of daily earnings
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</section>

@endsection


