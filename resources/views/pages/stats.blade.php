@extends('layouts.app')

@section('content')

    @manager
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <div class="divContainer">
        	<canvas id="chart"></canvas>
        </div>

	    <script type="text/javascript">
	    	let myChart = document.getElementById('chart').getContext('2d');

	    	var consultations = @json($consultations);

	    	console.log(consultations);

        	var months = ["January", "February", "March", "April", "June", "July", "August", "September", "October", "November", "December"];

        	var currentMonth = new Date().getMonth();

        	var orderedMonth = months.slice(currentMonth-6).concat(months.slice(0, currentMonth+1));

        	console.log(orderedMonth);

        	console.log(orderedMonth.map((month)=> {return consultations?.[month]}));

	    	let lineChart = new Chart(myChart, {
	    		type: 'line',
	    		data: {
	    			labels: orderedMonth,
	    			datasets: [{
	    				label: 'Nombre de visites',
	    				data: orderedMonth.map((month)=> {return consultations?.[month]}),
	    				fill: false,
                        borderColor: "rgb(255, 0, 0)",
                        lineTension: 0.1
	    			}]
	    		},
	    		options: {}
	    	});
	    </script>
    @endmanager

@endsection
