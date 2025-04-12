<?php

$this->load->view('./header_digital');
?>

  
  
  <!--  <section class="search-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="search">
            <input type="text" id="searchInput" placeholder="Search by name">
            <div id='submitsearch'> <span>Search</span> </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="filter-buttons">
            <div class="list-view-button"><i class="fa fa-bars"></i></div>
            <div class="grid-view-button"><i class="fa fa-th-large"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <section class="category">
    <div class="container">
        
        <h4 style="color:#FFF;">Edit Playlist</h4>
        
        <div>&nbsp;</div>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
      
	
	  
	  
        <div class="row">
		
		
		

	<div class="col-md-3">
                    
    </div>			
			
          <div class="col-md-4"> 
             
             
<form action="<?php echo base_url() ?>Playlists/editplaylist/"<?php echo $playlist[0]['id'] ?> method="post" >
  <div class="form-group">
    <label style="color:#fff;" >Playlist Name</label>
	
    <input type="text" class="form-control" name="playlist_name"  value="<?php echo $playlist[0]['name'] ?>" placeholder="Playlist Name" required >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
	 <div>&nbsp;</div>
  <input type="hidden" class="form-control" name="playlist_id"  value="<?php echo $playlist[0]['id'] ?>"  >
  <button type="submit" class="btn btn-primary">Update</button>
</form>
			
              
             </div>  
               
 




			  
				
				  <div class="col-md-1">
                    
                  </div>
                   
				  
             <div class="col-md-3">
			 </div>		
              
             <div class="row">
			 <div class="col-md-12">
			 &nbsp;
			 </div>
			 </div>
         
          
		  <!--
		  <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  -->
        </div>
      
    </div>
  </section>
</main>
</body>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script>
 $("#searchInput").focus(function () {
  
        $("#searchInput").css({
          "display": "inline",
          "width": "40%",
          "border": "1px solid #40585d",
          "opacity": "1",
          "padding": "8px 20px 8px 20px",
          "background-image": "none",
          "box-shadow": "0 0 1px black"
        });
        $("#submitsearch").css("display", "inline");
       
        $("#searchInput").prop("placeholder", "");
      });
</script>-->
<!--<script>

const listViewButton = document.querySelector('.list-view-button');
const gridViewButton = document.querySelector('.grid-view-button');
const list = document.querySelector('ol');

listViewButton.onclick = function () {
  list.classList.remove('grid-view-filter');
  list.classList.add('list-view-filter');
}

gridViewButton.onclick = function () {
  list.classList.remove('list-view-filter');
  list.classList.add('grid-view-filter');
}
</script>-->
</html>
