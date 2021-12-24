<script>
			function find_text1()
			{
				form1.action="/~team4/admin/lists/text1/" + form1.text1.value + "/text2/" + form2.text2.value ;
				form1.submit();
			}
			function find_text2()
			{
				form2.action="/~team4/admin/lists/text1/" + form1.text1.value + "/text2/" + form2.text2.value ;
				form2.submit();
			}
			$(function(){
				$("#text1") .datetimepicker({
					locale: 'ko',
					format: 'M',
					defaultDate: moment()
				});
				$("#text2") .datetimepicker({
					locale: 'ko',
					format: 'YYYY',
					viewMode: "years",
					defaultDate: moment()
				});

				$("#text1") .on("dp.change", function (e){
					find_text1();
				});
				$("#text2") .on("dp.change", function (e){
					find_text2();
				});

			});
</script>
	<?
		$str_label = "";
		$str_data = "";
		$str_areaData = "";

		foreach($list2 as $row)
		$str_areaData .= $row->s1 . ',';
		$str_areaData .= $row->s2 . ',';
		$str_areaData .= $row->s3 . ',';
		$str_areaData .= $row->s4 . ',';
		$str_areaData .= $row->s5 . ',';
		$str_areaData .= $row->s6 . ',';
		$str_areaData .= $row->s7 . ',';
		$str_areaData .= $row->s8 . ',';
		$str_areaData .= $row->s9 . ',';
		$str_areaData .= $row->s10 . ',';
		$str_areaData .= $row->s11 . ',';
		$str_areaData .= $row->s12 . ',';
		
		$total = $row->s1 + $row->s2 + $row->s3 + $row->s4 + $row->s5 + $row->s6 + $row->s7 + $row->s8 + $row->s9 + $row->s10 + $row->s11 + $row->s12;
		$goal = 1000000;
		$percent = $total/$goal*100;

		foreach($list as $row)
		{
			$str_label .= "'$row->room_name',";
			$str_data .= $row->book_cnt . ',';
		}
	?>
	<style>
		canvas {
			-moz-user-select : none;
			-webkit-user-select : none;
			-ms-user-select : none;
		}
	</style>

<script src="/~team4/my/admin/js/utils.js"></script>
<script>
		var config_area = {
			type:  "line",
			data: {
			labels: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
			datasets: [{
			  label: "Earnings",
			  lineTension: 0.3,
			  backgroundColor: "rgba(78, 115, 223, 0.05)",
			  borderColor: "rgba(78, 115, 223, 1)",
			  pointRadius: 3,
			  pointBackgroundColor: "rgba(78, 115, 223, 1)",
			  pointBorderColor: "rgba(78, 115, 223, 1)",
			  pointHoverRadius: 3,
			  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
			  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
			  pointHitRadius: 10,
			  pointBorderWidth: 2,
			  data: [<?=$str_areaData?>],
			}],
		  },
		  options: {
			maintainAspectRatio: false,
			layout: {
			  padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			  }
			},
			scales: {
			  xAxes: [{
				time: {
				  unit: 'date'
				},
				gridLines: {
				  display: false,
				  drawBorder: false
				},
				ticks: {
				  maxTicksLimit: 12
				}
			  }],
			  yAxes: [{
				ticks: {
				  maxTicksLimit: 5,
				  padding: 10,
				  // Include a dollar sign in the ticks
				  callback: function(value, index, values) {
					return number_format(value) + '원';
				  }
				},
				gridLines: {
				  color: "rgb(234, 236, 244)",
				  zeroLineColor: "rgb(234, 236, 244)",
				  drawBorder: false,
				  borderDash: [2],
				  zeroLineBorderDash: [2]
				}
			  }],
			},
			legend: {
			  display: false
			},
			tooltips: {
			  backgroundColor: "rgb(255,255,255)",
			  bodyFontColor: "#858796",
			  titleMarginBottom: 10,
			  titleFontColor: '#6e707e',
			  titleFontSize: 14,
			  borderColor: '#dddfeb',
			  borderWidth: 1,
			  xPadding: 15,
			  yPadding: 15,
			  displayColors: false,
			  intersect: false,
			  mode: 'index',
			  caretPadding: 10,
			  callbacks: {
				label: function(tooltipItem, chart) {
				  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
				  return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + '원';
				}
			  }
			}
		  }
		};

		var config = {
			type:  "doughnut",
			data: {
				datasets:[{
						data: [ <?=$str_data;?>],
						backgroundColor : [
							'#4e73df',
							'#1cc88a',
							'#36b9cc',
							window.chartColors.yellow,
							window.chartColors.orange,						
							],
							label: "Dataset 1"
				}],
				labels: [ <?=$str_label;?>]
			},
			options: {
				responsive: true,
				legend: {
					labels: {
						padding: 15,
				    },
					position: "bottom",
				},
				title: {
					disply: false,
					text: "객실 분포도"
				},
				animation: {
					animateScale: true,
					animateRotate: true
				},
				cutoutPercentage: 60,
				tooltips: {

					  borderWidth: 1,
					  xPadding: 15,
					  yPadding: 15,
					  displayColors: false,
					  caretPadding: 10,
					}					
			}
		};

		window.onload = function(){
			var ctx = document.getElementById("myPieChart2").getContext("2d");
			window.myDoughnut = new Chart(ctx, config);
			var ctx_area = document.getElementById("myAreaChart2").getContext("2d");
			window.myArea = new Chart(ctx_area, config_area);
		};
	</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">대시보드</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row" style="display:none;"> <!-- 안보이게 처리 -->

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">

                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">

                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">

                        </div>
                    </div>
                    <!-- Content Row -->
                    <!-- Pie Chart -->                                           
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<div class="row" style="height:20%">
								<div class="col-xl-12 col-lg-12">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
														올해 예약 건수</div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$rowcount;?>건</div>
												</div>
												<div class="col-auto">
													<i class="fas fa-calendar fa-2x text-gray-300"></i>
												</div>
											</div>
										</div>
									</div>		
								</div>
							</div>
							<div class="row" style="height:20%">
								<div class="col-xl-12 col-lg-12">
									<div class="card border-left-success shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
														연 매출 총액</div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($total);?>원</div>
												</div>
												<div class="col-auto">
													<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="height:20%">
								<div class="col-xl-12 col-lg-12">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">목표 매출액 달성치
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=round($percent,1);?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?=round($percent,1);?>%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
								</div>
							</div>
							<div class="row" style="height:20%">
								<div class="col-xl-12 col-lg-12">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                올해 리뷰어 수</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$reviewcount;?>명</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">월간 객실 이용 현황</h6>
                                    <div class="dropdown no-arrow">
										<form name="form1" method="post" action="" >
											<div class="input-group input-group-sm table-sm date" id="text1">
												<input type="hidden" name="text1" value="<?=$text1;?>"class="form-control">
												<div class="input-group-append">
													<div class="input-group-text">
														<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
													</div>
												</div>
											</div>
										</form>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                        <canvas id="myPieChart2"></canvas>                                     
                                </div>
                            </div>
                        </div>
					</div>                
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">년간 월 매출</h6>
                                    <div class="dropdown no-arrow">
										<form name="form2" method="post" action="" >
											<div class="input-group input-group-sm table-sm date" id="text2">
												<input type="hidden" name="text2" value="<?=$text2;?>"class="form-control">
												<div class="input-group-append">
													<div class="input-group-text">
														<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
													</div>
												</div>
											</div>
										</form>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                <!-- /.container-fluid -->
            <!-- End of Main Content -->

