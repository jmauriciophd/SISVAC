<?php
class controller{
	public function carregaView($viewName,$viewData = array())
	{	
	extract($viewData);	
	  include_once  'views/'.$viewName.'.php';
	}
	public function loadTemplate($viewName,$viewData = array()){
		include_once 'views/template.php';
	} 
	public function loadViewTemplate($viewName,$viewData = array()){
		
		include_once 'views/template.php';
	}
	public function loadViewinTemplate($viewName,$viewData = array()){
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}
  }
?>