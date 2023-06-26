

<div class="p-3 bg-white shadow" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">   
    <div class="row w-100">
        <div class="col">
            <h4 style="color: #333333;">Loans analytics</h4>
        </div>
        <div class="col dropdown d-flex justify-content-end">
            <?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
        </div>
    </div>
    <div class="row ml-3 mr-3" style="z-index: 1;">
    	<div class="col-lg-12">
    		<div class="p-1">
    			<div class="row ml-2 mr-2 mt-1">
    				<div class="col-md-3" title="Total number of loans">
                        <div class="card h-100 bg-primary text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Borrowers</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3><?php echo $loan_count; ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-hashtag fa-2x opacity-75"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="../loans/index.php">View Loan List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                	<div class="col-md-3">
                        <div class="card h-100 bg-success text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Total Loaned</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format($total_loan_balance, 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-hand-holding-usd fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                  	<div class="col-md-3">
                        <div class="card h-100 bg-danger text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Total Paid</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format($loan_payments_sum, 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-credit-card fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 bg-info text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Loanable Balance</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h3>₱<?php echo number_format(($loanable_balance), 2, '.', ','); ?></h3>
                                    	</div>
                                    </div>
                                    <i class="fas fa-wallet fa-2x opacity-75"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="../loans/index.php?page=loan-bank">View Loan Bank</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row mt-4" style="z-index: 2;">
        <div class="col p-0 mx-3 bg-white shadow rounded">
            <div class="w-100 pt-2 px-2">
                <canvas id="monthly-loaned-total-chart"></canvas>
            </div> 
            <div class="w-100 d-flex justify-content-end">
                <button type="button" class="btn text-secondary btn-white m-0" data-bs-toggle="modal" data-bs-target="#monthly-loaned-total"><i class="fas fa-expand"></i></button>
            </div>
        </div>
        <div class="col p-0 mx-3 bg-white shadow rounded">
            <div class="w-100 pt-2 px-2">
                <canvas id="monthly-loan-payments-chart"></canvas>
            </div> 
            <div class="w-100 d-flex justify-content-end">
                <button type="button" class="btn text-secondary btn-white m-0" data-bs-toggle="modal" data-bs-target="#monthly-loaned-total"><i class="fas fa-expand"></i></button>
            </div>
        </div>
    </div>
</div>

<?php

    // MONTHLY LOANED AMOUNT 
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/monthly-loaned-total.php";

    // MONTHLY LOAN PAYMENTS CHART 
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/monthly-loan-payments-total.php";

    // LOAN PLANS MODAL 
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/loan-plans-chart.php";


    //FULL SCREEN MODALS
    #monthly-loan-payments-total full screen
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/full-screen-modals/monthly-loaned-total.php";
 ?>