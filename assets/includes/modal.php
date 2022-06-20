<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: http://localhost/loan-management/application/pages/error-pages/403-error.php');
    exit();
};
?>


<?php
// include_once('db_connect.php');
// if (isset($_GET['user_id'])) {
//     $query = $conn->query("SELECT * FROM tbl_users where user_id = " . $_GET['user_id']);
//     foreach ($query->fetch_array() as $k => $v) {
//         $$k = $v;
//     }
// }
?>
<div class="modal fade" id="addloan">
    <div class="modal-dialog modal-md">
        <div class="modal-content card-outline card-primary">
            <form action="#">
                <div class="modal-header">
                    <h4 class="modal-title">Apply New Loan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Borrower<small class="text-red">*</small></label>
                                <?php
                                    $borrower = $conn->query("SELECT *,concat(lastName,', ',firstName) as name FROM tbl_users order by concat(lastName,', ',firstName) asc ");
                                ?> 
                                <select class="selectborrower" required>
                                    <option value=""></option>
                                    <?php while ($row = $borrower->fetch_assoc()): ?>
                                        <option value="<?php echo $row['user_id'] ?>" <?php echo isset($borrower_id) && $borrower_id == $row['user_id'] ? "selected" : '' ?>><?php echo $row['name'] .' '. $row['middleName'][0] . '. | Account No.: '.$row['accountNumber'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Loan Plan<small class="text-red">*</small></label>
                                <?php
                                    $plan = $conn->query("SELECT * FROM loan_plans order by `plan_term` desc ");
                                ?> 
                                <select class="selectplan" required>
                                    <option value=""></option>
                                    <?php while ($row = $plan->fetch_assoc()): ?>
                                        <option value="<?php echo $row['plan_id'] ?>" <?php echo isset($plan_id) && $plan_id == $row['plan_id'] ? "selected" : '' ?> data-months="<?php echo $row['plan_term'] ?>" data-interest_percentage="<?php echo $row['interest_percentage'] ?>"><?php echo $row['plan_term'] . ' month/s [ '.$row['interest_percentage'].'%, '.$row['mode_of_payment'].' ]'?></option>
                                    <?php endwhile; ?>
                                </select>
                                <small>months [interest%, mode of payment]</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Loan Type<small class="text-red">*</small></label>
                                <?php
                                    $type = $conn->query("SELECT * FROM loan_types order by `typeofLoan` desc ");
                                ?>
                                <select class="selecttype" required>
                                    <option value=""></option>
                                    <?php while($row = $type->fetch_assoc()): ?>
                                        <option value="<?php echo $row['loantype_id'] ?>" <?php echo isset($loantype_id) && $loantype_id == $row['loantype_id'] ? "selected" : '' ?>><?php echo $row['typeofLoan'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label>Purpose<small class="text-red">*</small></label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Amount<small class="text-red">*</small></label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <button class="btn btn-primary btn-sm" type="button" id="calculate">Calculate</button>
                            </div>
                        </div>
                    </div>
                    <div id="calculation_table"></div>
                </div>
                <div class="modal-footer justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form><!-- /.modal-content -->
        </div>
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="editloan">
    <div class="modal-dialog modal-md">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Application</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Account No.</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Member</label>
                                    <input type="text" class="form-control" placeholder="Enter Member Name..">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Type of Loan</label>
                                    <select class="form-control select2bs4" data-placeholder="Select Type">
                                        <option>Data</option>
                                        <option>Data</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Payment</label>
                                    <input type="text" class="form-control" placeholder="Enter Mode Payment ..">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" placeholder="00.00">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="password" class="form-control" placeholder="Enter Loan Duration ..">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Purpose</label>
                                    <input type="text" class="form-control" placeholder="Enter Purpose ..">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Loan Status</label>
                                    <select class="form-control">
                                        <option>Approved</option>
                                        <option>Disapproved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control" row="3" placeholder="Enter Remarks .."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <iclass="fa fa-check">
                            </i> Submit
                    </button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="view_user">
    <div class="modal-dialog modal-md">
        <?php
        include_once('../../config/database.php');
        $accountNumber = $_GET['accountNumber'];
        $query = "SELECT * FROM tbl_users WHERE accountNumber = $accountNumber";
        $results = $conn->query($query);
        ?>
        <?php while ($row = $results->fetch_row()) : ?>
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Information of <?php echo $row[2] . ' ' . $row[4]; ?> </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Account Number:</label>
                                        <p><?php echo $row[1]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Borrower Name:</label>
                                        <p><?php echo $row[2] . ' ' . $row[3] . ' ' . $row[4]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <p><?php echo $row[5]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Age:</label>
                                        <p><?php echo $row[6]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Birth Date:</label>
                                        <p><?php echo $row[7]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <p><?php echo $row[9]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Date Registered:</label>
                                        <p><?php echo $row[10]; ?> </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <p class="text-primary"><?php echo $row[11]; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form><!-- /.modal-content -->
        <?php endwhile; ?>
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="add_payment">
    <div class="modal-dialog modal-md">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loan Reference No.</label>
                                <select class="form-control select2bs4" data-placeholder="Select Type">
                                    <option>Data</option>
                                    <option>Data</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>