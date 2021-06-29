<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function list()
    {
        $list = Office::all();
        return view('admin.office_list', compact('list'));
    }

    public function addShow()
    {
        $offices = Office::all();
        return view('admin.office_add', compact('offices'));
    }

    public function add(Request $request)
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'address2' => $request->address2,
            'parent_office' => $request->parent_office,
        ];

        if ($request->status) {
            $data['status'] = 1;
        }

        Office::create($data);

        return redirect()->route('office.list');
    }
}
