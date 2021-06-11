<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Welcome to AgriRental'
		];

		return view('home/index', $data);
	}

	public function login()
	{
		$data = [
			'title' => 'Login'
		];

		return view('home/login', $data);
	}

	public function daftar()
	{
		$data = [
			'title' => 'Daftar',
			'validation' => \Config\Services::validation()
		];

		return view('home/daftar', $data);
	}

	public function logout()
	{
		session_unset();
		session_destroy();

		return redirect()->to('/');
	}
}
