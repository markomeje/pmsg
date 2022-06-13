<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Supporter;


class SupportersController extends Controller
{
    /**
     * Admin view supporters
     */
    public function index()
    {
        return view('admin.supporters.index')->with(['supporters' => Supporter::latest('created_at')->paginate(20)]);
    }
}
