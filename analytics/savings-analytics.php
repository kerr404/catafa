<div class="p-3 bg-white shadow" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">   
    <div class="row w-100">
        <div class="col">
            <h4 class="mb-2" style="color:#333333;">Savings analytics</h4>
        </div>
        <div class="col dropdown d-flex justify-content-end">
            <?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
        </div>
    </div>
    <div class="row mt-3 ml-3 mr-3" style="z-index: 1;">
    	<div class="col-lg-12">
    		<div class="p-1">
    			<div class="row ml-2 mr-2 mt-1">
    				<div class="col-md-3" title="Total number of savings account">
                        <div class="card h-100 bg-primary text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Savings Accounts</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3><?php echo $savings_count; ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-hashtag fa-2x opacity-75"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="../savings/index.php">View Account List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                  	<div class="col-md-3">
                        <div class="card h-100 bg-danger text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Balance Deposits</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format($savings_deposit_sum, 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-money-check-alt fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 bg-info text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Balance Withdrawals</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format($savings_withdraw_sum, 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-money-bill-wave-alt fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 bg-success text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Total Savings Balance</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format($total_savings_balance, 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-piggy-bank fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row mt-4" style="z-index: 2;">
        <div class="col m-2 shadow">
            <canvas id="monthly-savings-deposit"></canvas>
        </div>
        <div class="col m-2 shadow">
            <canvas id="monthly-savings-withdraw"></canvas>
        </div>
    </div>
    <div class="row mt-4" style="z-index: 3;">
        <div class="col m-2 shadow">
            <canvas id="monthly-savings-earnings"></canvas>
        </div>
        <div class="col m-2 shadow">
            <canvas id="savings-earnings-withdraw"></canvas>
        </div>
    </div>
</div>



<?php 
    // SAVINGS WITHDRAW DEPOSIT 
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/savings-deposit-chart.php";
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/savings-withdraw-chart.php";
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/savings-earnings-withdraws-chart.php";
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/savings-earnings-chart.php";
 ?>
