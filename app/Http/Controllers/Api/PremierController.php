<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremierController extends Controller
{
    /**
     * 使用token驗證
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return 'authenticated with token,  premier page';
    }
}
