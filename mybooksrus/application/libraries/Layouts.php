<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
/** 
 * Layouts Class. PHP5 only. 
 * 
 */
class Layouts { 
    
	// Will hold a CodeIgniter instance 
	private $CI; 

	// Will hold a title for the page, NULL by default 
	private $title_for_layout = NULL; 
	private $title_for_page = NULL; 
	private $extra_head = NULL; 

	// The title separator, ' | ' by default 
	private $title_separator = ' | '; 

	private $fileIncludes = array(); 

	public function __construct() { 
		$this->CI =& get_instance(); 
	} 
    
	public function set_title($title) { 
		$this->title_for_layout = $title; 
	}
	
	public function set_page_title($title,$icontext) { 
		$this->title_for_page= $icontext." ".$title; 
	}
	public function set_extra_head($content) { 
		$this->extra_head= $content; 
	}
    
	public function view($view_name, $params = array(), $layout = 'default') {
		// Handle the site's title. If NULL, don't add anything. If not, add a  
		// separator and append the title. 
		if ($this->title_for_layout !== NULL) { 
			$separated_title_for_layout = $this->title_separator . $this->title_for_layout; 
		} 
		 
		if ($this->extra_head !== NULL) {
			$separat_set_setextra_head = $this->extra_head; 
		}else{
			$separat_set_setextra_head = '';
		}
		 
		// Load the view's content, with the params passed 
		$view_content = $this->CI->load->view($view_name, $params, TRUE); 

		// Now load the layout, and pass the view we just rendered 
		$this->CI->load->view('layouts/' . $layout, array( 
		  'content_for_layout' => $view_content, 
		  'title_for_layout' => $separated_title_for_layout,
		  'extra_head' => $separat_set_setextra_head
		)); 
	}
	
	public function dbview($view_name, $params = array(), $layout = 'defaultdb') {
		// Handle the site's title. If NULL, don't add anything. If not, add a  
		// separator and append the title. 
		if ($this->title_for_layout !== NULL) { 
			$separated_title_for_layout = $this->title_separator . $this->title_for_layout; 
		}
		
		if ($this->title_for_page !== NULL) { 
			$separated_title_for_page = $this->title_for_page; 
		}else{
			$separated_title_for_page = '';
		}

		if ($this->extra_head !== NULL) {
			$separat_set_setextra_head = $this->extra_head;
		}else{
			$separat_set_setextra_head = '';
		}
		
		// Load the view's content, with the params passed 
		$view_content = $this->CI->load->view($view_name, $params, TRUE); 

		// Now load the layout, and pass the view we just rendered 
		$this->CI->load->view('dblayouts/' . $layout, array( 
		  'content_for_layout' => $view_content, 
		  'title_for_layout' => $separated_title_for_layout,
		  'title_for_page' => $separated_title_for_page,
		  'extra_head' => $separat_set_setextra_head
		)); 
	}
    
	public function add_include($path, $prepend_base_url = TRUE) { 
		if ($prepend_base_url) { 
			$this->CI->load->helper('url'); // Load this just to be sure 
			$this->fileIncludes[] = base_url() . $path; 
		} else { 
			$this->fileIncludes[] = $path; 
		} 

		return $this; // This allows chain-methods 
	} 
  
	public function print_includes() { 
		// Initialize a string that will hold all includes 
		$final_includes = ''; 

		foreach ($this->fileIncludes as $include) { 
			// Check if it's a JS or a CSS file 
			if (preg_match('/js$/', $include)) { 
				// It's a JS file 
				$final_includes .= '<script type="text/javascript" src="' . $include . '"></script>'; 
			} elseif (preg_match('/css$/', $include)) { 
				// It's a CSS file 
				$final_includes .= '<link href="' . $include . '" rel="stylesheet" type="text/css" />'; 
			} 
		} 
		return $final_includes; 
	}
}