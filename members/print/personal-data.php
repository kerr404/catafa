<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
?>

<div class="px-4 pt-3" style="width: 100%; height: 92vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="d-flex flex-row mb-2 align-items-center">
            <label class="form-label">Header:</label>
            <div class="col-5 mx-2">
                <input class="form-control" placeholder="Enter header" id="header-input" type="text">
            </div>
            <div class="col mx-4 d-flex justify-content-end">
                <div>
                    <a type="button" class="btn btn-light border" title="Print" onclick="printTable()" id="print-button">Print</a>
                </div>
                <script>
                    function printTable() {
                    var printContents = document.getElementsByClassName("print-header")[0].outerHTML;
                    printContents += document.getElementById("print-member-list").outerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    document.execCommand('print');
                    document.body.innerHTML = originalContents;
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 d-flex flex-row">
        <script>
            $(document).ready(function() {

                $('#count-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.count').css('display', 'table-cell');
                    } else {
                        $('.count').css('display', 'none');
                    }
                });

                $('#name-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.name').css('display', 'table-cell');
                    } else {
                        $('.name').css('display', 'none');
                    }
                });

                $('#member-id-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.member-id').css('display', 'table-cell');
                    } else {
                        $('.member-id').css('display', 'none');
                    }
                });
                
                $('#mobile-number-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.mobile-number').css('display', 'table-cell');
                    } else {
                        $('.mobile-number').css('display', 'none');
                    }
                });

                $('#age-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.age').css('display', 'table-cell');
                    } else {
                        $('.age').css('display', 'none');
                    }
                });

                $('#gender-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.gender').css('display', 'table-cell');
                    } else {
                        $('.gender').css('display', 'none');
                    }
                });

                $('#barangay-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.barangay').css('display', 'table-cell');
                    } else {
                        $('.barangay').css('display', 'none');
                    }
                });

                $('#land-area-check').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.land-area').css('display', 'table-cell');
                    } else {
                        $('.land-area').css('display', 'none');
                    }
                });
            });
        </script>
        <div class="form-check">
            <input id="count-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">#&nbsp</label>  
        </div>
        <div class="form-check mx-2">
            <input id="name-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Name</label>  
        </div>
        <div class="form-check mx-2">
            <input id="member-id-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Member ID</label>  
        </div>
        <div class="form-check mx-2">
            <input id="mobile-number-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Mobile Number</label>  
        </div>
        <div class="form-check mx-2">
            <input id="age-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Age</label>  
        </div>
        <div class="form-check mx-2">
            <input id="gender-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Gender</label>  
        </div>
        <div class="form-check mx-2">
            <input id="barangay-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Barangay</label>  
        </div>
        <div class="form-check">
            <input id="land-area-check" class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Land Area</label>  
        </div>
    </div>

    <div class="print-header">
        <h5 id="print-header-text" class="text-center mb-4">&nbsp</h5>
        <script>
            $(document).ready(function() {
                $('#header-input').on('input', function() {
                    var header = $(this).val();
                    $('#print-header-text').text(header);
                });
            });
        </script>
    </div>
    <style type="text/css">
        @media print {
        .print-header {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        }
    </style>
    <div class="row mt-4 mb-5">
        <table id="print-member-list" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="count">#</th>
                    <th class="name">Name</th>
                    <th class="member-id">Member ID</th>
                    <th class="mobile-number">Mobile Number</th>
                    <th class="age">Age</th>
                    <th class="gender">Gender</th>
                    <th class="barangay">Barangay</th>
                    <th class="land-area">Land Area</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $print_sql = "SELECT * FROM members";
                $print_query = mysqli_query($conn, $print_sql);
                $print_resultCheck = mysqli_num_rows($print_query);
                    $print_rowNum = 0; 
                    if ($print_resultCheck > 0) {
                        while ($print_row = mysqli_fetch_assoc($print_query)) {
                            $print_rowNum = $print_rowNum + 1;
                            $print_id = $print_row['id'];
                            $print_member_id = $print_row['member_id'];
                            $print_firstName = $print_row['firstname'];
                            $print_middleName = $print_row['middlename'];
                            $print_lastName = $print_row['lastname'];
                            $print_age = $print_row['age'];
                            $print_gender = $print_row['gender'];
                            $print_phoneNumber = $print_row['mobile_number'];
                            $print_province = $print_row['province'];
                            $print_city = $print_row['city'];
                            $print_barangay = $print_row['barangay'];
                            $print_status = $print_row['status'];
                            $print_land = $print_row['land_area'];

                ?>
                <tr>
                    <td class="count" id="id-table-column"><?php echo $print_rowNum ?></td>
                    <td class="align-middle name">
                        <a type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#view-member<?php echo $id; ?>">
                            <?php echo $print_lastName.", ".$print_firstName." ".substr($print_middleName, 0, 1)."."; ?>
                        </a>
                    </td>
                    <td class="align-middle member-id">
                        <?php echo substr($print_member_id, 0, 3) . "-" . substr($print_member_id, -3); ?>
                    </td>
                    <td class="align-middle mobile-number">
                        <?php echo substr($print_phoneNumber, 0, 4) . '-' . substr($print_phoneNumber, 4, 3) . '-' . substr($print_phoneNumber, 7, 4);
                        ?>			
                    </td>
                    <td class="align-middle age">
                        <?php echo $print_age;
                        ?>			
                    </td>
                    <td class="align-middle gender">
                        <?php echo $print_gender;
                        ?>			
                    </td>
                    <td class="align-middle barangay">
                        <?php echo $print_barangay;
                        ?>			
                    </td>
                    <td class="align-middle land-area">
                        <?php echo $print_land;
                        ?>			
                    </td>
                </tr>
                <?php 
                //closing for WHILE Loop
                        }
                    }
                ?>
                                    
            </tbody>
            
        </table>
    </div>
</div>


<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
?>