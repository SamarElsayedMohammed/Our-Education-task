<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FilterController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $from = $request->input('date_from');
            $to = $request->input('date_to');
            $price_from = $request->input('price_from');
            $price_to = $request->input('price_to');
            $statusCode = $request->input('statusCode');
            $currency = $request->input('currency');
            $data = User::when(
                $from && $to,
                function (Builder $builder) use ($from, $to) {
                    $builder->whereBetween(
                        DB::raw('created_at'),
                        [
                            $from,
                            $to
                        ]
                    );
                }
            )
                ->when(
                    $price_from &&
                    $price_to,
                    function (Builder $builder) use ($price_from, $price_to) {
                        $builder->whereBetween(
                            DB::raw('balance'),
                            [
                                $price_from,
                                $price_to
                            ]
                        );
                    }
                )
                ->when(
                    $currency,
                    function (Builder $builder) use ($currency) {
                        $builder->where(
                            DB::raw('currency'),
                            $currency
                        );
                    }
                )
                ->when(
                    $statusCode,
                    function (Builder $builder) use ($statusCode) {
                        $builder->whereHas('transactions', function ($query) use ($statusCode) {
                            $query->where('status_code', $statusCode);
                        });
                    }
                )
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<div class='row'><a href='/users/details/$row->uuid' class='edit btn btn-primary btn-sm m-1'>View</a></div>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.filter')->with(request()->all());

    }

    public function dateConverting($item)
    {
        return array_map(function ($number) {
            return $this->convertTime($number);
        }, $item);
    }

}