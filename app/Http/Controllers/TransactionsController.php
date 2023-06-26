<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\TransactionsRequest;

class TransactionsController extends Controller
{
    use GeneralTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::orderBy('payment_date', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<div class='row'><a href='/transactions/details/$row->id' class='edit btn btn-primary btn-sm m-1'>View</a><a href='/transactions/edit/$row->id' class='edit btn btn-warning btn-sm m-1'>edit</a><a href='/transactions/delete/$row->id' class='edit btn btn-danger btn-sm m-1'>Delete</a></div>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transactions.index');
    }
    public function create()
    {
        $trans = new Transaction;
        return view('transactions.create', compact('trans'));
    }
    public function store(TransactionsRequest $request, TransactionService $transactionService)
    {
        try {

            $transactionService->createTransaction($request->all());

            return redirect()->route('transactions.index')->with(['success' => "transaction created successfully"]);

        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }

    }
    public function edit($id)
    {
        try {
            $trans = Transaction::where('id', $id)->first();
            if (!$trans) {
                return redirect()->route('transactions.index')->with(['danger' => "tranasaction not found"]);
            }
            return view('transactions.edit', compact('trans'));
        } catch (\Exception $th) {

            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }
    public function update(TransactionsRequest $request, $id, TransactionService $transactionService)
    {
        try {

        $trans = Transaction::where('id', $id)->first();
        if (!$trans) {
            return redirect()->route('transactions.index')->with(['danger' => "tranasaction not found"]);
        }
        $transactionService->UpdateTransaction($request->except('_token'), $trans);
        return redirect()->route('transactions.index')->with(['success' => "transaction updated successfully"]);
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }


    }
    public function jsonFile()
    {

        return view('transactions.upload-json');
    }

    public function jsonStore(Request $request, TransactionService $transactionService)
    {

        try {
            $request->validate([
                'file' => 'required|mimes:json',
            ]);

            $jsonData = $this->jsondata($request->file('file'));

            foreach ($jsonData['transactions'] as $data) {
                $validator = validator($data, Transaction::rules());
                if ($validator->fails()) {
                    // Handle validation errors
                    continue;

                } else {

                    $transactionService->createTransaction($data);
                }
            }
            return redirect()->route('transactions.index')->with(['success' => "users created successfully"]);

        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }

    }
    public function details($id)
    {
        try {
            $trans = Transaction::with('user')->where('id', $id)->first();
            //  return $trans->user;
            if (!$trans) {
                return redirect()->route('transactions.index')->with(['danger' => "tranasaction not found"]);
            }
            return view('transactions.details', compact('trans'));
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }

    public function delete($id)
    {
        try {
            $user = Transaction::where('id', $id)->first();
            if (!$user) {
                return redirect()->route('transactions.index')->with(['danger' => "transaction not found!"]);
            }
            Transaction::where('id', $id)->delete();
            return redirect()->route('transactions.index')->with(['success' => "transaction deleted successfully"]);
        } catch (\Exception $e) {

            return redirect()->route('transactions.index')->with(['danger' => "somthing wrong please try agin later !"]);

        }
    }
}