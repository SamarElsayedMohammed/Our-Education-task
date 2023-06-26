<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Yajra\DataTables\Facades\DataTables;


class UsersController extends Controller
{
    use GeneralTrait;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<div class='row'><a href='/users/details/$row->uuid' class='edit btn btn-primary btn-sm m-1'>View</a><a href='/users/edit/$row->uuid' class='edit btn btn-warning btn-sm m-1'>edit</a><a href='/users/delete/$row->uuid' class='edit btn btn-danger btn-sm m-1'>Delete</a></div>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users.index');
    }
    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }
    public function store(UserRequest $request, UserService $userService)
    {
        try {

        $userService->createNewUser($request->all());

        return redirect()->route('users.index')->with(['success' => "user created successfully"]);
        } catch (\Exception $ex) {
            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }
    public function jsonFile()
    {
        return view('users.upload-json');
    }

    public function jsonStore(Request $request, UserService $userService)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:json',
            ]);

            $jsonData = $this->jsondata($request->file('file'));
            // return $jsonData['users'];

            foreach ($jsonData['users'] as $data) {

                $validator = validator($data, User::rules(null));
                if ($validator->fails()) {
                    // Handle validation errors
                    // return $validator->errors();
                    continue;

                } else {
                    $userService->createNewUser($data);

                }
            }
            return redirect()->route('users.index')->with(['success' => "users created successfully"]);

        } catch (\Exception $e) {
            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }

    }

    public function edit($id)
    {
        try {
            $user = User::where('uuid', $id)->first();
            if (!$user) {
                return redirect()->route('users.index')->with(['danger' => "user not found!"]);
            }
            return view('users.edit', compact('user'));
        } catch (\Exception $e) {

            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }

    }

    public function update(UserRequest $request, $id, UserService $userService)
    {
        try {
            $user = User::where('uuid', $id)->first();
            if (!$user) {
                return redirect()->route('users.index')->with(['danger' => "user not found!"]);
            }
            $userService->UpdateUser($request->except('_token'), $id);

            return redirect()->route('users.index')->with(['success' => "users updated successfully"]);
        } catch (\Exception $e) {

            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }

    public function delete($id)
    {
        try {
            $user = User::where('uuid', $id)->first();
            if (!$user) {
                return redirect()->route('users.index')->with(['danger' => "user not found!"]);
            }
            User::where('uuid', $id)->delete();
            return redirect()->route('users.index')->with(['success' => "users deleted successfully"]);
        } catch (\Exception $e) {

            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }

    public function details($id)
    {

        try {
            $user = User::with('transactions')->where('uuid', $id)->first();
            if (!$user) {
                return redirect()->route('users.index')->with(['danger' => "user not found!"]);
            }
            return view('users.details', compact('user'));
        } catch (\Exception $e) {

            return redirect()->route('users.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }

}