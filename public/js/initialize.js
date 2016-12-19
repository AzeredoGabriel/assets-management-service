
/**
 * Javascript responsável por toda a inicialização de plugins customizados.
 */

(function($) {
	'use strict'; 


	// select2
	$('.select2').select2();

	// data tables 
	$('#projects-table').DataTable();


	var ctx = $("#projects-consum-graphic");

	//dados falsos
	var data = {
	    labels: [
	        "Inforce",
	        "Nova Época",
	        "Podium"
	    ],
	    datasets: [
	        {
	            data: [300, 50, 100],
	            backgroundColor: [
	                "#a0c717",
	                "#e56600",
	                "#e60000"
	            ],
	            hoverBackgroundColor: [
	                "#668206",
	                "#172e60",
	                "#d23d3d"
	            ]
	        }]
	};

	// piechats - chatsJS
	var myPieChart = new Chart(ctx,{
	    type: 'doughnut',
	    data: data, 
	    options: {
	    	fontSize: 15,
	    	display: true,
	    	responsive: true, 
	    	maintainAspectRatio: false,

	    }
	});

})(jQuery); 