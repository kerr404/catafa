<div class="p-3 bg-white shadow">   
    <div class="row w-100">
        <div class="col">
            <h4 class="mb-2" style="color:#333333;">Members analytics</h4>
        </div>
        <div class="col dropdown d-flex justify-content-end">
            <?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
        </div>
    </div>
    <div class="row mt-3 ml-3 mr-3">
    	<div class="col-lg-12">
    		<div class="p-1">
    			<div class="row ml-2 mr-2 mt-1">
    				<div class="col-md-3" title="Total number of members">
                        <div class="card h-100 bg-primary text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Members</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                        	<h2><?php echo $member_count; ?></h2>
                                    	</div>
                                    </div>
                                    <i class="fas fa-users fa-2x opacity-75"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-decoration-none" href="../members/index.php">View Member List</a>
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
                                        <div class="text-white-75">Pending Members</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                            <h2><?php echo $member_count_pending; ?></h2>
                                        </div>
                                    </div>
                                    <i class="fas fa-hourglass-start fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 bg-danger text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Camingawan</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                            <h2><?php echo $member_count_camingawan; ?></h2>
                                        </div>
                                    </div>
                                    <i class="fas fa-map-marker-alt fa-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 bg-info text-white shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75">Tagukon</div>
                                        <div class="mt-2 text-lg font-weight-bold">
                                            <h2><?php echo $member_count_tagukon; ?></h2>
                                        </div>
                                    </div>
                                    <i class="fas fa-map-marker-alt fa-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
</div>