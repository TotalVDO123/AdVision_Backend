<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Fields get class all function name.
* 
* @param  string classname 
* @return JSON in array
*/
function load_view($url, $reqData=[]){
    $CI = get_instance();
	//echo "===========".$CI->session->userdata('user_id');
	if($CI->session->userdata('user_id')==1)
	{
	$CI->load->view('header');	
	$CI->load->view('navbar_old');	
	$CI->load->view($url, $reqData);
    $CI->load->view('footer');
	}	
	else
	{
    $CI->load->view('header_new');
	$CI->load->view('navbar');
    $CI->load->view($url, $reqData);
    //$CI->load->view('footer');
	$CI->load->view('footer_new');
	}
}
function flash_message($addClass, $message){
    $CI = get_instance();
    $CI->session->set_flashdata('message', $message);
    $CI->session->set_flashdata('add_class', $addClass);
}

/**
* upload image function .
* 
* @param  string  parameter
*
* @return boolean
*/

function upload_image($upload_location,$field_name, $FILES = array(), $redirectUrl)
{

	$image_width=$_REQUEST['with_image'];
	$image_height=$_REQUEST['height_image'];
	if(isset($FILES[$field_name]) && $FILES[$field_name]["error"] == 0)
	{
	        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "mp4" => "video/mp4");
	        $filename = $FILES[$field_name]["name"];
	        $filetype = $FILES[$field_name]["type"];
			$filesize = $FILES[$field_name]["size"];
			// Verify file extension
	        $ext = pathinfo($filename, PATHINFO_EXTENSION);
	        if(!array_key_exists($ext, $allowed)) 
	        {
				flash_message("alert-danger", 'Please select a valid file format');			
				redirect($redirectUrl.'add');       
	        }
	        // Verify file size - 50MB maximum
	        $maxsize = 50 * 1024 * 1024;
	        if($filesize > $maxsize)
	        {
				flash_message("alert-danger", 'Error: File size is larger than the allowed limit.');			
				redirect($redirectUrl.'add');       	        	
			exit;
	    	}
	        // Verify MYME type of the file
	        if(!in_array($filetype, $allowed))
	        {
				flash_message("alert-danger", 'Error: There was a problem uploading your file. Please try again.');								
				redirect($redirectUrl.'add');       	        
	        }
		else
		{
			$filename 	= round(microtime(true) * 1000);
			$new_file_name  = $filename .'.'. $ext;
			
			$year_folder = $upload_location . date("Y");
			$month_folder = $year_folder . '/' . date("m");
			
			!file_exists($year_folder) && mkdir($year_folder , 0777);
			!file_exists($month_folder) && mkdir($month_folder, 0777);
			
			$path = $month_folder . '/' . $new_file_name;
			
			$tmp_path =$month_folder.'/'.$filename.'.'.tmp;
			
			
			if($ext=='mp4' or $ext=='MP4')
			{
				move_uploaded_file($FILES[$field_name]["tmp_name"], $path );	
			}	
			else
			{	
				move_uploaded_file($FILES[$field_name]["tmp_name"], $tmp_path );
				@GenerateThumbnail($tmp_path,$path,$image_width,$image_height,0.80);
				//Delete full size
				unlink($tmp_path);
			}
			return site_url().$path;
	        }
	 } 
	 else
	 {
		flash_message("alert-danger", "Error: " . $FILES[$field_name]["error"]);								
		redirect($redirectUrl.'add');       	        	 	
	 }
}




//

function GenerateThumbnail($im_filename,$th_filename,$max_width,$max_height,$quality = 0.75)
{
// The original image must exist
if(is_file($im_filename))
{
    // Let's create the directory if needed
    $th_path = dirname($th_filename);
    if(!is_dir($th_path))
        mkdir($th_path, 0777, true);
    // If the thumb does not aleady exists
    if(!is_file($th_filename))
    {
        // Get Image size info
        list($width_orig, $height_orig, $image_type) = @getimagesize($im_filename);
        if(!$width_orig)
            return 2;
        switch($image_type)
        {
            case 1: $src_im = @imagecreatefromgif($im_filename);    break;
            case 2: $src_im = @imagecreatefromjpeg($im_filename);   break;
            case 3: $src_im = @imagecreatefrompng($im_filename);    break;
        }
        if(!$src_im)
            return 3;


        $aspect_ratio = (float) $height_orig / $width_orig;

        $thumb_height = $max_height;
        $thumb_width = round($thumb_height / $aspect_ratio);
        if($thumb_width > $max_width)
        {
            $thumb_width    = $max_width;
            $thumb_height   = round($thumb_width * $aspect_ratio);
        }

        $width = $thumb_width;
        $height = $thumb_height;

        $dst_img = @imagecreatetruecolor($width, $height);
        if(!$dst_img)
            return 4;
        $success = @imagecopyresampled($dst_img,$src_im,0,0,0,0,$width,$height,$width_orig,$height_orig);
        if(!$success)
            return 4;
        switch ($image_type) 
        {
            case 1: $success = @imagegif($dst_img,$th_filename); break;
            case 2: $success = @imagejpeg($dst_img,$th_filename,intval($quality*100));  break;
            case 3: $success = @imagepng($dst_img,$th_filename,intval($quality*9)); break;
        }
        if(!$success)
            return 4;
    }
    return 0;
}
return 1;
}

 function video_type($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } 
		elseif (strpos($url, 'zoho') > 0) {
            return 'zoho';
        } 
		
		else {
            return 'unknown';
        }
    }
	
	
	if ( ! function_exists('get_vimeo_video_id'))
{
    // Checks if a video is youtube, vimeo or any other
    function get_vimeo_video_id($url) {
        return (int) substr(parse_url($url, PHP_URL_PATH), 1);
    }
}


if ( ! function_exists('get_youtube_video_id'))
{
    // Checks if a video is youtube, vimeo or any other
    function get_youtube_video_id($url) 
	{
       $link = $url;
		$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
		if (empty($video_id[1]))
			$video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

		$video_id = explode("&", $video_id[1]); // Deleting any other params
		$video_id = $video_id[0];
		return $video_id;
		
    }
}

if ( ! function_exists('get_vimeo_video_id'))
{
    // Checks if a video is youtube, vimeo or any other
    function get_vimeo_video_id($url) {
        return (int) substr(parse_url($url, PHP_URL_PATH), 1);
    }
}