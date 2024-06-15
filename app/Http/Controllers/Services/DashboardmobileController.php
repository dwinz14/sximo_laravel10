<?php namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class DashboardmobileController extends Controller{
    
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        return view('dashboard.mobileservice');
    }
}