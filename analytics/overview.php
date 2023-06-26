<h4 class="m-2">Overview</h4>
<div class="row mt-3 ml-3 mr-3">
	<div class="col-lg-12">
		<div class="p-1">
			<div class="row ml-2 mr-2">
				<div class="col-md-4">
                    <div class="card h-100 bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-3">
                                    <div class="text-white-75">Loans</div>
                                    <div class="mt-2 text-lg font-weight-bold">
                                    	<h2><?php echo $loan_count; ?></h2>
                                	</div>
                                </div>
                                <i class="fas fa-money-bill"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="index.php?analytics=loans">View Loans</a>
                            <div class="small text-white">
                            	<i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            	<div class="col-md-4">
                    <div class="card h-100 bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-3">
                                    <div class="text-white-75">Savings accounts</div>
                                    <div class="mt-2 text-lg font-weight-bold">
                                    	<h2><?php echo $savings_count; ?></h2>
                                	</div>
                                </div>
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="index.php?page=borrowers">View Savings Accounts</a>
                            <div class="small text-white">
                            	<i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
              	<div class="col-md-4">
                    <div class="card h-100 bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-3">
                                    <div class="text-white-75">Total Members</div>
                                    <div class="mt-2 text-lg font-weight-bold">
                                    	<h2><?php echo $member_count; ?></h2>
                                	</div>
                                </div>
                                <i class="fa fa-user-friends"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="index.php?page=loans">View Members</a>
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