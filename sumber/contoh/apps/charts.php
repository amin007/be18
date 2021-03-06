<?php include '_atas2.php'; ?>  
<body id="bootcards">
<?php include '_menubar2.php'; ?>  
  <div class="container bootcards-container" id="main">
    
<div class="row">

	<div class="bootcards-cards">	
	
		<div class="col-sm-6">

			<div>
			
				<div class="panel panel-default bootcards-chart">
					
					<div class="panel-heading">
						<h3 class="panel-title">Closed sales by team member - $000s (December)</h3>					
					</div>
			
					<div>
			
						<!--bar chart-->
						<div class="bootcards-chart-canvas" id="chartClosedSales"></div>
			
						<div class="panel-footer">
							<button class="btn btn-default btn-block"
								onClick="toggleChartData(event)">
								<i class="fa fa-table"></i>
								Show Data
							</button>				
						</div>
					</div>
					
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Chart Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/chart"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>					
			
				</div>		
			
				<!-- Table Card data -->
				<div class="panel panel-default bootcards-table" style="display:none">
					<div class="panel-heading">
						<h3 class="panel-title">Closed sales by team member - $000s (December)</h3>							
					</div>	
					<table class="table table-hover">
						<thead>				
							<tr class="active"><th>Name</th><th class="text-right">Sales value</th></tr>
						</thead>
						<tbody>
							<tr><td>Guy Bardsley</td><td class="text-right">$ 550</td></tr>
							<tr><td>Adam Callahan</td><td class="text-right">$ 1,500</td></tr>
							<tr><td>Arlo Geist</td><td class="text-right">$ 3,750</td></tr>
							<tr><td>Sheila Hutchins</td><td class="text-right">$ 3,500</td></tr>
							<tr><td>Jeanette Quijano</td><td class="text-right">$ 1,250</td></tr>
							<tr><td>Simon Sweet</td><td class="text-right">$ 5,250</td></tr>
							<tr><td><strong>Total</strong></td><td class="text-right"><strong>$ 15,800</strong></td></tr>
						</tbody>
					</table>
					<div class="panel-footer">
						<button class="btn btn-default btn-block" onClick="toggleChartData(event, closedSalesChart)">
							<i class="fa fa-bar-chart-o"></i>
							Show Chart
						</button>				
					</div>
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Table Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/table"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>													
				</div>
			
			</div>
			
			<script type="text/javascript">
			
			/*
			 * Clear the target DOM element and draw the sample charts
			 * Samples come from the morris.js site at http://www.oesmith.co.uk/morris.js/
			 */
			var closedSalesChart = null;
			
			var drawChartClosedSales = function() {
			
				$("#chartClosedSales").empty();
			
				//create custom Donut function with click event on the segments
				var myDonut = Morris.Donut;
			
				myDonut.prototype.redraw = function() {
			
					var C, cx, cy, i, idx, last, max_value, min, next, seg, total, value, w, _i, _j, _k, _len, _len1, _len2, _ref, _ref1, _ref2, _results;
			      this.raphael.clear();
			      cx = this.el.width() / 2;
			      cy = this.el.height() / 2;
			      w = (Math.min(cx, cy) - 10) / 3;
			      total = 0;
			      _ref = this.values;
			      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
			        value = _ref[_i];
			        total += value;
			      }
			      min = 5 / (2 * w);
			      C = 1.9999 * Math.PI - min * this.data.length;
			      last = 0;
			      idx = 0;
			      this.segments = [];
			      _ref1 = this.values;
			      for (i = _j = 0, _len1 = _ref1.length; _j < _len1; i = ++_j) {
			        value = _ref1[i];
			        next = last + min + C * (value / total);
			        seg = new Morris.DonutSegment(cx, cy, w * 2, w, last, next, this.data[i].color || this.options.colors[idx % this.options.colors.length], this.options.backgroundColor, idx, this.raphael);
			        seg.render();
			        this.segments.push(seg);
			        seg.on('hover', this.select);
			        seg.on('click', this.select);
			        last = next;
			        idx += 1;
			      }
			      this.text1 = this.drawEmptyDonutLabel(cx, cy - 10, this.options.labelColor, 15, 800);
			      this.text2 = this.drawEmptyDonutLabel(cx, cy + 10, this.options.labelColor, 14);
			      max_value = Math.max.apply(Math, this.values);
			      idx = 0;
			      _ref2 = this.values;
			      _results = [];
			      for (_k = 0, _len2 = _ref2.length; _k < _len2; _k++) {
			        value = _ref2[_k];
			        if (value === max_value) {
			          this.select(idx);
			          break;
			        }
			        _results.push(idx += 1);
			      }
			      return _results;
				};
			
				closedSalesChart = myDonut({
				    element: 'chartClosedSales',
				    data: [
				      {label: 'Guy Bardsley', value: 550 },
				      {label: 'Adam Callahan', value: 1500 },
				      {label: 'Arlo Geist', value: 3750 },
				      {label: 'Sheila Hutchins', value: 3500 },
				      {label: 'Jeanette Quijano', value: 1250 },
				      {label: 'Simon Sweet', value: 5250 }
				    ],
				    formatter: function (y, data) { 
				    	//prefixes the values by an $ sign, adds thousands seperators
			
						nStr = y + '';
						x = nStr.split('.');
						x1 = x[0];
						x2 = x.length > 1 ? '.' + x[1] : '';
						var rgx = /(\d+)(\d{3})/;
						while (rgx.test(x1)) {
							x1 = x1.replace(rgx, '$1' + ',' + '$2');
						}
						return '$ ' + x1 + x2;
				    }
				  });
			
			};
			
			//draw the charts when the DOM is ready
			$(document).ready( function() {
				drawChartClosedSales();
			});
			
			//on resize of the page: redraw the charts
			$(window)
				.on('resize', function() {
					window.setTimeout( function() {
						if (closedSalesChart !== null) { closedSalesChart.redraw(); }
					}, 250);
				});
			
			</script>
			<div>
			
				<div class="panel panel-default bootcards-chart">
					
					<div class="panel-heading">
						<h3 class="panel-title">Sales by product type - $m</h3>					
					</div>
			
					<div>
			
						<!--bar chart-->
						<div class="bootcards-chart-canvas" id="chartSalesProductType"></div>
			
						<div class="panel-footer">
							<button class="btn btn-default btn-block"
								onClick="toggleChartData(event)">
								<i class="fa fa-table"></i>
								Show Data
							</button>				
						</div>
					</div>
					
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Chart Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/chart"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>					
			
				</div>		
			
				<!-- Table Card data -->
				<div class="panel panel-default bootcards-table" style="display:none">
					<div class="panel-heading">
						<h3 class="panel-title">Sales by product type - $m</h3>							
					</div>	
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>				
								<tr class="active"><th></th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th><th>Total</th></tr>
							</thead>
							<tbody>
								<tr><td>Stingray</td><td>4.3</td><td>6.5</td><td>10.2</td><td>5.9</td><td>26.9</td></tr>
								<tr><td>Barracuda</td><td>15.1</td><td>25.5</td><td>35.7</td><td>20.3</td><td>96.6</td></tr>
								<tr><td>Mako</td><td>5.9</td><td>13.7</td><td>20.6</td><td>10.5</td><td>50.7</td></tr>
								<tr><td>Sailfish</td><td>2.1</td><td>5</td><td>9.6</td><td>14.4</td><td>31.1</td></tr>
								<tr><td><strong>Total</strong></td><td><strong>27.4</strong></td><td><strong>50.7</strong></td><td><strong>76.1</strong></td><td><strong>51.1</strong></td><td><strong>205.3</strong></td></tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default btn-block" onClick="toggleChartData(event, chartSalesProductType)">
							<i class="fa fa-bar-chart-o"></i>
							Show Chart
						</button>				
					</div>	
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Table Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/table"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>												
				</div>	
			
			</div>
			
			<script type="text/javascript">
			
			/*
			 * Clear the target DOM element and draw the sample charts
			 * Samples come from the morris.js site at http://www.oesmith.co.uk/morris.js/
			 */
			var chartSalesProductType = null;
			
			var drawChartSalesProductType = function() {
			
				$("#chartSalesProductType").empty();
			
				var sales = [
			       {"period": "2014 Q1", "stingray": 4.3, "barracuda": 15.1, "mako" : 5.9, "sailfish": 2.1 },
			       {"period": "2014 Q2", "stingray": 6.5, "barracuda": 25.5, "mako" : 13.7, "sailfish": 5 },
			       {"period": "2014 Q3", "stingray": 10.2, "barracuda": 35.7, "mako" : 20.6, "sailfish": 9.6 },
			       {"period": "2014 Q4", "stingray": 5.9, "barracuda": 20.3, "mako" : 10.5, "sailfish": 14.4 }
			  ];
			  chartSalesProductType = Morris.Line({
			    element: 'chartSalesProductType',
			    data: sales,
			    xkey: 'period',
			    ykeys: ['stingray', 'barracuda', 'mako', 'sailfish'],
			    labels: ['Stingray', 'Barracuda', 'Mako', 'Sailfish']
			  });
			
			};
			
			//draw the charts when the DOM is ready
			$(document).ready( function() {
				drawChartSalesProductType();
			});
			
			//on resize of the page: redraw the charts
			$(window)
				.on('resize', function() {
					window.setTimeout( function() {
						if (chartSalesProductType !== null) { chartSalesProductType.redraw(); }
					}, 250);
				});
			
			</script>		
		</div>
		<div class="col-sm-6">
	
			<div>
			
				<div class="panel panel-default bootcards-chart">
					
					<div class="panel-heading">
						<h3 class="panel-title">Database size - no of records</h3>					
					</div>
			
					<div>
			
						<!--bar chart-->
						<div class="bootcards-chart-canvas" id="chartDbSize"></div>
			
						<div class="panel-footer">
							<button class="btn btn-default btn-block"
								onClick="toggleChartData(event)">
								<i class="fa fa-table"></i>
								Show Data
							</button>				
						</div>
					</div>
					
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Chart Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/chart"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>					
			
				</div>		
			
				<!-- Table Card data -->
				<div class="panel panel-default bootcards-table" style="display:none">
					<div class="panel-heading">
						<h3 class="panel-title">Database size - no of records</h3>							
					</div>	
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>				
								<tr class="active"><th></th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th></tr>
							</thead>
							<tbody>
								<tr><td>Companies</td><td>1256</td><td>1422</td><td>1475</td><td>1528</td></tr>
								<tr><td>Contacts</td><td>3788</td><td>4350</td><td>4495</td><td>4601</td></tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default btn-block" onClick="toggleChartData(event, dbSizeChart)">
							<i class="fa fa-bar-chart-o"></i>
							Show Chart
						</button>				
					</div>		
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Table Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/table"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>											
				</div>
			
			</div>
			
			<script type="text/javascript">
			
			/*
			 * Clear the target DOM element and draw the sample charts
			 * Samples come from the morris.js site at http://www.oesmith.co.uk/morris.js/
			 */
			
			var dbSizeChart = null;
			
			var drawDbSizeChart = function() {
			
				$("#chartDbSize").empty();
			
				dbSizeChart = Morris.Area({
				    element: 'chartDbSize',
				    data: [
				      {period: '2014 Q1', companies: 1256, contacts : 3788},
				      {period: '2014 Q2', companies: 1422, contacts : 4350},
				      {period: '2014 Q3', companies: 1475, contacts : 4495},
				      {period: '2014 Q4', companies: 1528, contacts : 4601}
				    ],
				    xkey: 'period',
				    ykeys: ['companies', 'contacts'],
				    labels: ['Companies', 'Contacts'],
				    pointSize: 2,
				    hideHover: 'auto'
				  });
			
			};
			
			//draw the charts when the DOM is ready
			$(document).ready( function() {
				drawDbSizeChart();
			});
			
			//on resize of the page: redraw the charts
			$(window)
				.on('resize', function() {
					window.setTimeout( function() {
						if (dbSizeChart !== null) { dbSizeChart.redraw(); }
					}, 250);
				});
			
			</script>	
			<div>
			
				<div class="panel panel-default bootcards-chart">
					
					<div class="panel-heading">
						<h3 class="panel-title">Current month forecast vs quota - $000s</h3>					
					</div>
			
					<div id="bar1">
			
						<!--bar chart-->
						<div class="bootcards-chart-canvas" id="chartForecastVsQuota"></div>
			
						<div class="panel-footer">
							<button class="btn btn-default btn-block"
								onClick="toggleChartData(event)">
								<i class="fa fa-table"></i>
								Show Data
							</button>				
						</div>
					</div>
					
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Chart Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/chart"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>					
			
				</div>		
			
				<!-- Table Card data -->
				<div class="panel panel-default bootcards-table" style="display:none">
					<div class="panel-heading">
						<h3 class="panel-title">Current month forecast vs quota - $000s</h3>							
					</div>	
					<table class="table table-hover">
						<thead>				
							<tr class="active"><th>Name</th><th>Forecast</th><th>Quota</th></tr>
						</thead>
						<tbody>
							<tr><td>Guy Bardsley</td><td>2750</td><td>4000</td></tr>
							<tr><td>Adam Callahan</td><td>3300</td><td>4000</td></tr>
							<tr><td>Arlo Geist</td><td>4500</td><td>4000</td></tr>
							<tr><td>Sheila Hutchins</td><td>4100</td><td>4000</td></tr>
							<tr><td>Jeanette Quijano</td><td>1800</td><td>2000</td></tr>
							<tr><td>Simon Sweet</td><td>6200</td><td>4000</td></tr>
							<tr><td><strong>Total</strong></td><td><strong>22650</strong></td><td><strong>22000</strong></td></tr>
						</tbody>
					</table>
					<div class="panel-footer">
						<button class="btn btn-default btn-block" onClick="toggleChartData(event, barChartClosedSales)">
							<i class="fa fa-bar-chart-o"></i>
							Show Chart
						</button>				
					</div>		
					<div class="panel-footer">
						<small class="pull-left">Built with Bootcards - Table Card</small>
						<a class="btn btn-link btn-xs pull-right"
										href="/snippets/table"
										data-toggle="modal"
										data-target="#docsModal">
										View Source</a>
					</div>											
				</div>
			
			</div>
			
			<script type="text/javascript">
			
			/*
			 * Clear the target DOM element and draw the sample charts
			 * Samples come from the morris.js site at http://www.oesmith.co.uk/morris.js/
			 */
			var barChartClosedSales = null;
			
			var drawBarChartClosedSales = function() {
			
				$("#chartForecastVsQuota").empty();
			
				barChartClosedSales = Morris.Bar({
					element: 'chartForecastVsQuota',
					data: [
						{name: 'Guy Bardsley', forecast: 2750, quota: 4000},
						{name: 'Adam Callahan', forecast: 3300, quota: 4000},
						{name: 'Arlo Geist', forecast: 4500, quota: 4000},
						{name: 'Sheila Hutchins', forecast: 4100, quota: 4000},
						{name: 'Jeanette Quijano', forecast: 1800, quota: 2000},
						{name: 'Simon Sweet', forecast: 6200, quota: 4000}
					],
					xkey: 'name',
					ykeys: ['forecast', 'quota'],
					labels: ['Forecast', 'Quota'],
					xLabelAngle: 20,
					hideHover: 'auto'
				});
			
			};
			
			//draw the charts when the DOM is ready
			$(document).ready( function() {
				drawBarChartClosedSales();
			});
			
			//on resize of the page: redraw the charts
			$(window)
				.on('resize', function() {
					window.setTimeout( function() {
						if (barChartClosedSales !== null) { barChartClosedSales.redraw(); }
					}, 250);
				});
			
			</script>		
		</div>
	</div>
</div>

  </div>
<?php include '_bawah3.php'; ?>  