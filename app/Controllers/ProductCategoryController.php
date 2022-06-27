<?php

namespace app\Controllers;
//
require_once 'app/Models/ProductCategory.php'; // archivo
use app\Models\ProductCategory; // modelo


class ProductCategoryController{

    protected $category;
    

	public function __construct(){  

		$this->category = new ProductCategory();
	}

	public function index(){
		return $this->category->index();
	}
    


}
?>