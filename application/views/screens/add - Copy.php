<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <ol class="breadcrumb">
                <li>
                    <a href="#"> Screens</a>
                </li>
                <li class="active"> Screen add</li>
            </ol>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <?php if($message=$this->session->flashdata('message')): 
                                        $add_class=$this->session->flashdata('add_class');
                    ?>
                        <div class="alert alert-dismissible <?= $add_class ?>">
                            <?= $message; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="col-sm-4"></div>  
                </div>
            </div>
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Screen</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button> -->
                    </div>
                </div>
                <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" name="add_screens" action="<?php echo base_url();?>index.php/screens/add" enctype="multipart/form-data">
                        <div id="example-embed">
                                <h3>Step 1</h3>
                                <section>
                                    <h4>Choose Orientation & Size</h4>                    
                                    <div class="col-sm-6 here_centerLine">
                                        <div class="col-sm-6">
                                            <div class="col-sm-3 first">
                                                <input type="radio" name="orientation_type" id="optionsRadios1" value="1" checked change="orienationsChange(this.id)">
                                            </div>
                                            <div class="col-sm-9" style='background: red; height: 115px;'>
                                                <div class="col-sm-8" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="col-sm-3 second">
                                                <input type="radio" name="orientation_type" id="optionsRadios2" value="2">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="col-sm-10" style='background: red; height: 180px;'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6 background_color">
                                            <p class="horigantal_content">&#8592 <span class="with_image">1920</span> &#8594</p>
                                            <input type="hidden" name="with_image" value="1920">
                                            <p class="vartical_content">&#8592 <span class="height_image">1080</span> &#8594</p>
                                            <input type="hidden" name="height_image" value="1080">
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </section>                    
                                <h3>Step 2</h3>
                                <section>
                                    <h4>Choose Content</h4>
                                    <div class="col-sm-6 here_centerLine">
                                        <div class="col-sm-6">
                                            <label for="image_file"><input type="radio" name="file_type" id="image_file" value="1" checked>Image</label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="video_file"><input type="radio" name="file_type" id="video_file" value="2">Video</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Select Image</label>
                                                
                                                <input type="file" name="file_upload" class="form-control file_image" accept="image/*" require="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">File Name</label>
                                                <input type="text" name="file_name" class="form-control" require="">
                                                <p id="validation_error" class="text-danger hidden">Please fill required field.</p>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <h4>Choose Content</h4>
                                            <div class="background_color ">
                                                <img id="blah" src="#" alt="your image" class="hidden_image" width="280" height="150"/>
                                                <!-- <video height="180" autoplay>
                                                    <source  src="" type="video/MP4" class="hidden_vedio">
                                                    Your browser does not support the video tag.
                                                </video> -->
                                                <video width="280" height="150" controls class="hidden_vedio">
                                                    <source src="mov_bbb.mp4" id="video_here">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                            </div>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </section>                
                            </div>
                        </form>              
                    </div>
                </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./wrapper -->



