(function($) {
    "use strict"


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	var marketChart = function(){
		 var options = {
          series: [{
          name: 'series1',
          data: _ydata
        }, {
          name: 'series2',
          data:_ydatad
        }],
          chart: {
          height: 300,
          type: 'area',
		  toolbar:{
			  show:false
		  }
        },
		colors:["#F9C284","#00ADA3"],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
		  width:3
        },
		legend:{
			show:false
		},
		grid:{
			show:false,
			strokeDashArray: 6,
			borderColor: '#dadada',
		},
		yaxis: {
		  labels: {
			style: {
				colors: '#B5B5C3',
				fontSize: '12px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
			formatter: function (value) {
			  return value + "k";
			}
		  },
		},
        xaxis: {
          categories: _xdata,
		  labels:{
			  style: {
				colors: '#B5B5C3',
				fontSize: '12px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
		  }
        },
		fill:{
			type:'solid',
			opacity:0.05
		},
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#marketChart"), options);
        chart.render();
	}
	var currentChart = function(){
		 var options = {
          series: _type,
          chart: {
          height: 315,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
				startAngle:-90,
			   endAngle: 90,
            dataLabels: {
              name: {
                fontSize: '22px',
              },
              value: {
                fontSize: '50px',
              },
            }
          },
        },
		stroke:{
			 lineCap: 'round',
		},
        labels: [ 'Disponible', 'En attente', 'Archivé','En location'],
		 colors:['#E9C223', '#E1BC95','#F58A03','#F76023'],
        };

        var chart = new ApexCharts(document.querySelector("#currentChart"), options);
        chart.render();
	}
	
	var recentContact = function(){
		jQuery('.testimonial-one').owlCarousel({
			loop:true,
			autoplay:true,
			margin:20,
			nav:false,
			rtl:true,
			dots: false,
			navText: ['', ''],
			responsive:{
				0:{
					items:3
				},
				450:{
					items:4
				},
				600:{
					items:5
				},	
				991:{
					items:5
				},			
				
				1200:{
					items:7
				},
				1601:{
					items:5
				}
			}
		})
	}
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
					marketChart();
					currentChart();
					recentContact();
					
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);