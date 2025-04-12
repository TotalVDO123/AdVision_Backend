<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Vision</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/font-awesome.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
-->

<!--<link rel="stylesheet" href="<?php //echo base_url()?>assets/digital/css/bootstrap.css" type="text/css" />-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="http://totalvdo.com/digitals/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="https://totalvdo.com/digitals/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">


<style>
    
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right
}
</style>

</head>

<body>
<main>
    
  <section>
      <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="rounded-3 text-black">
            <div class="row g-0">
			
			<?php
			  $this->load->view('./navbar_digital_admin');
			  ?>
			  
             <?php /* ?>
			 <div class="col-lg-2 d-flex align-items-center bg1">
                <div class="text-white px-3 py-4 mx-md-4 user"> <a href="#"> <img src="images/Add_Vision_Logo.svg"></a>
                  <p class="small logout"><a href="#"><i class="fa fa-sign-out"></i> Logout</a></p>
                </div>
                <div class="sidenav"> <a href="#"><i class="fa fa-user"></i> Profile</a> <a href="#"><i class="fa fa-users"></i> Users</a>
                  <button class="dropdown-btn"><i class="fa fa-map-marker"></i> Locations <i class="fa fa-caret-down"></i> </button>
                  <div class="dropdown-container"> <a href="#">Link 1</a> <a href="#">Link 2</a> </div>
                </div>
              </div>
              <?php */ ?>
			  
			  <div class="col-lg-10">
                <div class="card-body mx-md-4">
                    <ul class="breadcrumb">
                      <li>Company</li>
                      <li><strong>All Company</strong></li>
                    </ul>
				 
				  <div>&nbsp;</div> 
				  <?php
					if($this->session->userdata('user_type')==1)
										{
										?>
										<div class="col-xs-2 col-xs-offset-1 ">
											<a href="<?php echo base_url().'index.php/users/add';?>" class="mt-10">
													<button type="button" class="btn btn-primary">Add Company</button>
											</a>
										</div>
										<?php
										}
										?>
                  <hr>
                  
				  <div class="box-body">
			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
							<th>Email</th>
							<th>Name</th>
						<!--	<th>Phone number</th>  -->
						<!--	<th>Email</th>  -->
							<th>User Type</th>
							<th>Company</th>
						<!--	<th>Status</th>  -->
							<th>Action</th>
			                </tr>
			                </thead>
			                <tbody>
											<?php
											if(!empty($result)){
											 foreach ($result as $res) {
									$user_type="";
									if($res['user_type']==1)
									{
										$user_type="Super Admin";
									}
									elseif($res['user_type']==2)
									{
										$user_type="Admin";
									}
									elseif($res['user_type']==3)
									{
										$user_type="User";
									}
												 
											?>
			                <tr>
											 <td>	<a href="<?php echo base_url()."index.php"; ?>/users/single/<?php echo $res['id']; ?>"><?php echo $res['email']; ?></a></td>
											 <td>	<a href="<?php echo base_url()."index.php"; ?>/users/single/<?php echo $res['id']; ?>"><?php echo $res['first_name']," ".$res['last_name']; ?></a></td>
											 
											  <?php /* ?>
											 <td><?php echo $res['phone']; ?></td>
			                  <td><?php echo $res['email']; ?></td>
			                  
			                   <?php */ ?>
							  <td><?php echo $user_type; ?></td>
			                  <td><?php echo $res['company_name']; ?></td>
							  <?php /* ?>
							  <td><?php echo $res['is_active']?"Active":"Inactive"; ?></td>
							  <?php */ ?>
			                  <td>
			                      
			                  	<a href="<?php echo base_url()."index.php"; ?>/users/single/<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a> 
			                  	<a onclick="return confirm('Are you sure you want to delete this User')" href="<?php echo base_url()."index.php"; ?>/users/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o"></i></a>
			                  </td>
			                </tr>
											<?php }
											}else{
												?>
													<td colspan="4" class="text-center">Data Not Found</td>
											<?php }
											?>
			                </tbody>
			               

							<!--
						   <tfoot>
			                <tr>
							<th>Email</th>
							<th>Name</th>
						
						
							<th>User Type</th>
							<th>Company</th>
						
							<th>Action</th>
			                </tr>
			                </tfoot>
							-->
							
							
			              </table>
			            </div>
						
				  
				  
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
     </nav>
  </section>
 
 
  
</main>
</body>
<!--
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
-->




<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>
<script src="http://totalvdo.com/digitals/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://totalvdo.com/digitals/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</html>
<script>
  $(function () {
    $('#example1').DataTable({
    bSort: true,
    // bFilter: false,
    iDisplayStart: 0,
    iDisplayLength: 20,
    sPaginationType: "full_numbers",
    sDom: "Rfrtlip",
  })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$("#example-embed").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "fade"
});
</script>