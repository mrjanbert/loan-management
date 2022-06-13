<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Charges List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Charges</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <form action="../../code.php" method="POST">
            <div class="card-header">
              Charge Type Form
            </div>
            <div class="card-body">
              <div class="form-group">
                <label class="control-label">Charge Type</label>
                <input type="text" name="charges_type" class="form-control text-right">
              </div>
              <div class="form-group">
                <label class="control-label">Percentage(%)</label>
                <div class="input-group">
                  <input type="number" min="0" max="100" name="charge_percentage" class="form-control text-right">
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary offset-md-3" type="submit" name="addcharges_btn" value="submit"> Save</button>
                  <input type="button" class="btn btn-secondary" value="Cancel" onclick="history.go(0)"/>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- <div class="card">
          <div class="card-header">
            Fees Type Form
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="control-label">Fee Type</label>
              <input type="text" name="" id="" class="form-control text-right">
            </div>
            <div class="form-group">
              <label class="control-label">Amount</label>
              <div class="input-group">
                <input type="number" min="0" max="100" class="form-control text-right">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary offset-md-3" onclick="return confirm('Confirm save?');"> Save</button>
                <button class="btn btn-secondary" type="button" onclick="_reset()"> Cancel</button>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Charges</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include_once('../../config/database.php');
                $query = "SELECT * FROM tbl_charges";
                $results = $conn->query($query);
                ?>
                <?php while ($row = $results->fetch_row()) : ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo $row[0]; ?></td>
                    <td class="">
                      <p>Charge Type: <b><?php echo $row[1]; ?></b></p>
                      <p></p>Percentage: <b><?php echo $row[2]; ?></b> %</p>
                    </td>
                    <td class="text-center align-middle">
                      <button class="btn btn-sm btn-danger delete_plan" type="button" onclick="return confirm('Confirm delete?');" data-id="">Delete</button>
                    </td>
                  <?php endwhile; ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->