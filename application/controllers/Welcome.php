<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
		$role = $this->session->userdata('userrole');
                if($role==''){
                    $this->session->set_userdata('userrole', 'user');
                }

		$result = '';
		$oddrow = true;

		foreach ($this->categories->all() as $category){
                    $category->direction = ($oddrow ? 'left' : 'right');
                    $result .= $this->parser->parse('category-home', $category, true);
                    $oddrow = ! $oddrow;
                }
		$this->data['content'] = $result;
		$this->render();
	}

}
