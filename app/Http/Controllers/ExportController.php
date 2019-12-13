<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use App\Product;
Use App\Category;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function excel()
    {
        $auth = Auth::user();
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
        
        return view('excel_data', $auth, compact('product'));
    }

    public function export()
	{
		return Excel::download(new CategoryExport, 'Produk.xlsx');
	}
}
