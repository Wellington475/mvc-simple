<?php
	namespace App\Apps\Post\Controller;

	use App\Controller\Controller as Controller;

	class PostsController extends Controller
	{

		public function home(){
			$this->render('pages/home');
		}

		public function show($name){
			$this->render('users/detail', ['name'=>$name]);
		}

		public function setName(){
			$this->render('users/detail', ['name'=>$_POST['name']]);
		}
	}
?>