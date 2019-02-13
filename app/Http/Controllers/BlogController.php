<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;

class BlogController extends Controller {
    public function index() {
        return View::make('blog');
    }
}