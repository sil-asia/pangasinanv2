<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index()
	{
		$this->load->view('public/main.php');
	}
	public function about()
	{
		$this->load->view('public/about.php');
	}
	public function login()
	{
		$this->load->view('public/login.php');
	}
	public function data()
	{
		$this->load->view('public/data.php');
	}
	public function references()
	{
		$this->load->view('public/references.php');
	}
	public function contact()
	{
		$this->load->view('public/contact.php');
	}
}
