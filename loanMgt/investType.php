<form action="investorProcess.php" class="mt-5" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Investor Name">Investor Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Your Name">
    </div>
    <div class="form-group col-md-6">
      <label for="Location">Location</label>
      <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter Your Location">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Type of Investment Name">Type of Investment</label>
      <input type="text" name="investment_type" class="form-control" value="<?php echo $investment_type; ?>" placeholder="Enter Your Type of Investment">
    </div>
    <div class="form-group col-md-6">
      <label for="Interest Rate">Interest Rate</label>
      <input type="number" name="interest_rate" class="form-control" value="<?php echo $interest_rate; ?>" placeholder="Enter Your Interest Rate">
    </div>
  </div>