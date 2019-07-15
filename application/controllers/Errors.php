<?php
	ini_set('display_errors',0);
	class Errors extends CI_Controller{
		
		
		function index(){
			$data['heading']		= "Access Denied, Page not found 404";
			$this->template->load('templatereportadmin', 'errors/html/error_404', $data);
		}
		
		function error_404(){
			$data['heading']		= "Access Denied, Page not found 404";
			$this->template->load('templatereportadmin', 'errors/html/error_404', $data);
		}
		
		function error_403(){
			$data['heading']		= "Access Denied, You don't have permission 403";
			$this->template->load('templatereportadmin', 'errors/html/error_404', $data);
		}
		
		function error_po_not_found(){
			$data['heading']		= "Sorry, PO Not Approve or PO Unknown";
			$this->template->load('templatereportadmin', 'errors/html/error_404', $data);
		}
		
		
	}