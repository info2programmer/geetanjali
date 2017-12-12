<!-- Main content starts -->
<div class="container-fluid">
  <div class="row">
    <div class="main-header">
      <h4>Dashboard</h4>
    </div>
  </div>
  <!-- 4-blocks row start -->
  <div class="row m-b-30 dashboard-header">
    <div class="col-lg-3 col-sm-6">
      <div class="dashboard-primary bg-primary">
        <div class="sales-primary"> <i class="icon-speedometer"></i>
          <div class="f-right">
            <h2 class="counter"><?php echo $purchase[0]['totalPurchase'];?></h2>
            <span>Total Purchase</span> </div>
        </div>
        <div class="bg-dark-primary">
          <p class="week-sales"><a href="<?php echo base_url();?>view/Purchase">SEE PURCHASE DETAILS</a></p>
          <p class="total-sales"></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="bg-success dashboard-success">
        <div class="sales-success"> <i class="icon-basket-loaded"></i>
          <div class="f-right">
            <h2 class="counter"><?php echo $sales[0]['totalSales'];?></h2>
            <span>Total Sales</span> </div>
        </div>
        <div class="bg-dark-success">
          <p class="week-sales"><a href="<?php echo base_url();?>view/Sales">SEE SALES DETAILS</a></p>
          <p class="total-sales "></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="bg-warning dasboard-warning">
        <div class="sales-warning"> <i class="icon-user"></i>
          <div class="f-right">
            <h2 class="counter"><?php echo $customer;?></h2>
            <span>Total Customer</span> </div>
        </div>
        <div class="bg-dark-warning">
          <p class="week-sales"><a href="<?php echo base_url();?>view/Client">SEE CUSTOMERS</a></p>
          <p class="total-sales"></p>
        </div>
      </div>
    </div>
    <!--<div class="col-lg-3 col-sm-6">
      <div class="bg-facebook dashboard-facebook">
        <div class="sales-facebook"> <i class="icon-clock"></i>
          <div class="f-right">
            <h2 id="system-clock"></h2>
          </div>
        </div>
        <div class="bg-dark-facebook">
          <p class="week-sales">Time Now</p>
          <p class="total-sales"></p>
        </div>
      </div>
    </div>-->
  </div>
  <!-- 4-blocks row end --> 
  
  <!-- 1-3-block row start -->
  <div class="row">
    <div class="col-lg-9 col-md-8">
      <div class="col-sm-12 card">
        <div class="card-block">
          <h6 class="m-b-20">Our Employee List</h6>
          <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-block">
          <div class="table-responsive">
            <table class="table m-b-0 photo-table">
              <thead>
                <tr class="text-uppercase">
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Designation</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($emplye as $empinfo){ ?>
                <tr>
                 
                  <td><?php echo $empinfo['name'];?></td>
                  <td><?php echo $empinfo['phn'];?></td>
                  <td><?php echo $empinfo['empdesig'];?></td>
                  <td><?php echo $empinfo['emptype'];?></td>
                </tr>
                <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4">
      <div class="col-sm-12 card dashboard-product"> <span>Total Products</span>
        <h2 class="dashboard-total-products counter"><?php echo $product;?></h2>
        <span class="label label-warning"><a href="<?php echo base_url();?>inventory/StockDetails">See</a></span>Stock
        <div class="side-box bg-warning"> <i class="icon-social-soundcloud"></i> </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4">
      <div class="col-sm-12 card dashboard-product"> <span>Total Suppliers</span>
        <h2 class="dashboard-total-products counter"><?php echo $supplier;?></h2>
        <span class="label label-primary"><a href="<?php echo base_url();?>view/Supplier">See</a></span>Suppliers
        <div class="side-box bg-primary"> <i class="icon-social-soundcloud"></i> </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4">
      <div class="col-sm-12 card dashboard-product"> <span>Total Profit</span>
        <h2 class="dashboard-total-products">Rs <span class="counter"><?php echo $sales[0]['totalSales']-$purchase[0]['totalPurchase'];?></span></h2>
        <span class="label label-success">UPTO</span><?php echo date('Y-m-d');?>
        <div class="side-box bg-success"> <i class="icon-bubbles"></i> </div>
      </div>
    </div>
  </div>
  <!-- 1-3-block row end --> 
  
  <!-- 3-1-block start -->

  
  <!-- 3-1-block end --> 
  
  <!-- 2-1 block start -->
  <!--<div class="row">
    <div class="col-xl-8 col-lg-12">
      <div class="card">
        <div class="card-block">
          <div class="table-responsive">
            <table class="table m-b-0 photo-table">
              <thead>
                <tr class="text-uppercase">
                  <th>Photo</th>
                  <th>Project</th>
                  <th>Completed</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-2.png" alt="User"> </th>
                  <td>Appestia Project
                    <p><i class="icofont icofont-clock-time"></i>Created 14.9.2016</p></td>
                  <td><span class="pie" style="display: none;">226,134</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 1 1 4.209902994920235 25.41987555688496 L 15 15" fill="#2196F3"></path>
                    <path d="M 4.209902994920235 25.41987555688496 A 15 15 0 0 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>50%</td>
                  <td>October 21, 2015</td>
                </tr>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-4.png" alt="User"> </th>
                  <td>Contract with belife Company
                    <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p></td>
                  <td><span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path>
                    <path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>70%</td>
                  <td>November 21, 2015</td>
                </tr>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-1.png" alt="User"> </th>
                  <td>Web Consultancy project
                    <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p></td>
                  <td><span class="pie" style="display: none;">1,4</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 0 1 29.265847744427305 10.36474508437579 L 15 15" fill="#2196F3"></path>
                    <path d="M 29.265847744427305 10.36474508437579 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>40%</td>
                  <td>September 21, 2015</td>
                </tr>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-3.png" alt="User"> </th>
                  <td>Contract with belife Company
                    <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p></td>
                  <td><span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path>
                    <path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>70%</td>
                  <td>November 21, 2015</td>
                </tr>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-1.png" alt="User"> </th>
                  <td>Contract with belife Company
                    <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p></td>
                  <td><span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path>
                    <path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>70%</td>
                  <td>November 21, 2015</td>
                </tr>
                <tr>
                  <th> <img class="img-fluid img-circle" src="<?php echo base_url();?>material/assets/images/avatar-2.png" alt="User"> </th>
                  <td>Contract with belife Company
                    <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p></td>
                  <td><span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30">
                    <path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path>
                    <path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path>
                    </svg></td>
                  <td>70%</td>
                  <td>November 21, 2015</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-12">
      <div class="card">
        <div class="user-block-2"> <img class="img-fluid" src="<?php echo base_url();?>material/assets/images/widget/user-1.png" alt="user-header">
          <h5>Josephin Villa</h5>
          <h6>Software Engineer</h6>
        </div>
        <div class="card-block">
          <div class="user-block-2-activities">
            <div class="user-block-2-active"> <i class="icofont icofont-clock-time"></i> Recent Activities
              <label class="label label-primary">480</label>
            </div>
          </div>
          <div class="user-block-2-activities">
            <div class="user-block-2-active"> <i class="icofont icofont-users"></i> Current Employees
              <label class="label label-primary">390</label>
            </div>
          </div>
          <div class="user-block-2-activities">
            <div class="user-block-2-active"> <i class="icofont icofont-ui-user"></i> Following
              <label class="label label-primary">485</label>
            </div>
          </div>
          <div class="user-block-2-activities">
            <div class="user-block-2-active"> <i class="icofont icofont-picture"></i> Pictures
              <label class="label label-primary">506</label>
            </div>
          </div>
          <div class="text-center">
            <button type="button" class="btn btn-warning waves-effect waves-light text-uppercase m-r-30"> Follows </button>
            <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase"> Message </button>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!-- 2-1 block end --> 
</div>
<!-- Main content ends -->