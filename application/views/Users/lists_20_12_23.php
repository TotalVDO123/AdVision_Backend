<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Vision</title>
<!--
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/font-awesome.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
-->

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="http://totalvdo.com/digitals/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">




</head>

<body>
<main>
  <section class="h-100">
    <div class="container-fluid h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
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
			  
			  <div class="col-lg-10 bg3">
                <div class="mx-md-4">
                  <div class="">
                    <ul class="breadcrumb">
                      <li><a href="#">Users</a></li>
                      <li>All Users</li>
                    </ul>
                  </div>
				  
				  
				  <?php
										if($this->session->userdata('user_type')==1)
										{
										?>
										<div class="col-xs-2 col-xs-offset-1 ">
											<a href="<?php echo base_url().'index.php/users/add';?>" class="mt-10">
													<button type="button" class="btn btn-primary">Add User</button>
											</a>
										</div>
										<?php
										}
										?>
                  <hr>
                  <div class="all-user">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                      <thead class="thead-dark">
					  
				  
			
					  
                        <tr>
                          <th scope="col">Username</th>
                          <th scope="col">Name</th>
                          <th scope="col">Phone number</th>
                          <th scope="col">Email</th>
                          <th scope="col">User Type</th>
						  
						  <th scope="col">Company</th>
						  <th scope="col">Status</th>
						  <th scope="col">Action</th>
						  
                        </tr>
                      </thead>
					  
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
					  
					  
                      <tbody>
                        <tr>
                          
						  <!--
						  <td>Renatas DeLorenzo</td>
                          <td>info@purplemoondesigns.co.uk</td>
                          <td>Admin</td>
                          <td>Purple Moon Designs</td>
                          <td><p class="text-center edit1"><a href="#">Edit <i class="fa fa-pencil-square-o"></i></a></p>
                            <p class="text-center delete2"><a href="#">Delete <i class="fa fa-trash-o"></i></a></p></td>
                        -->
						
						<td><?php echo $res['username']; ?></td>
						<td><?php echo $res['first_name']," ".$res['last_name']; ?></td>
						<td><?php echo $res['phone']; ?></td>
			            <td><?php echo $res['email']; ?></td>
						<td><?php echo $user_type; ?></td>
			            <td><?php echo $res['company_name']; ?></td>
						<td><?php echo $res['is_active']?"Active":"Inactive"; ?></td>
			                  <td>
			                  	<a href="<?php echo base_url()."index.php"; ?>/users/single/<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a> 
			                  	<a onclick="return myConfirmation()" href="<?php echo base_url()."index.php"; ?>/users/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o"></i></a>
			                  </td>
						
						</tr>
                        
                     <?php }
											}else{
												?>
													<td colspan="4" class="text-center">Data Not Found</td>
											<?php }
											?>
						
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    $('#example1').DataTable()
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