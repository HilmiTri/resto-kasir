<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function print() 
    {
        $transaksis = Transaksi::all();
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $transaksis = Transaksi::whereBetween('created_at',[$start_date, $end_date])->get();
        } else {
            $transaksis = Transaksi::latest()->get();
        }

        $pdf = PDF::loadview('manager.laporan.print', ['transaksis' => $transaksis])->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
