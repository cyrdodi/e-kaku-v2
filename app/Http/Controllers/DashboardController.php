<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Functionary;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CetakTransaction;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard/index');
    }

    public function firstPrint()
    {


        $functionary = Functionary::find(request()->input('functionary'));

        $biodata = Biodata::find(request()->input('biodata'));
        $expDate = request()->input('exp_date');

        // check if already printed
        if ($biodata->no_pendaftaran != null) {
            Notification::make()
                ->title('Sudah pernah dicetak')
                ->warning()
                ->send();
            return redirect()->route('dashboardShow', ['biodata' => $biodata->id]);
        }


        DB::beginTransaction();

        try {
            $cetakTransaction = CetakTransaction::create([
                'user_id' => auth()->user()->id,
                'biodata_id' => $biodata->id,
                'functionary_id' => $functionary->id,
                'expired' => $expDate,
            ]);

            $noPendaftaran = $this->generateNoPendaftaran($biodata->nik);

            $biodata->update(['no_pendaftaran' => $noPendaftaran]);

            DB::commit();
            return redirect()->route('dashboard.print', ['cetakTransaction' => $cetakTransaction]);
        } catch (\Exception $e) {
            // notification
            Notification::make()
                ->title('Gagal cetak')
                ->body(env('APP_ENV') === 'production' ? $e->getCode() : $e->getMessage())
                ->danger()
                ->send();
            DB::rollBack();

            return redirect()->route('dashboardShow', ['biodata' => $biodata->id]);
        }
    }

    // v2.1
    public function print(CetakTransaction $cetakTransaction)
    {
        $functionary = Functionary::find($cetakTransaction->functionary_id);
        $biodata = Biodata::find($cetakTransaction->biodata_id);
        $expDate = $cetakTransaction->expired;

        $pdf = Pdf::loadView('pdf.yellow-card', compact('functionary', 'biodata', 'expDate'));
        Pdf::setOption(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
        $pdf->setPaper([0, 0, 297, 841.89], 'landscape');

        // "a4" => array(0, 0, 595.28, 841.89),


        // $pdf->setPaper([0.0, 0.0, 595.00, 420.50]);

        $font = $pdf->getFontMetrics()->get_font("helvetica", "bold");

        $pdf->getCanvas()->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0, 0, 0));

        return $pdf->stream('e-kaku_' . $biodata->no_pendaftaran . '.pdf');
    }

    private function generateNoPendaftaran($nik)
    {

        $prefix = substr($nik, 0, 4);
        $suffix = date('dmY');

        // cek apakah ada data pada bulan ini
        $noUrut = CetakTransaction::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

        $noUrut = sprintf('%05d', $noUrut + 1);

        return $prefix . $noUrut . $suffix;
    }


    public function show(Biodata $biodata)
    {

        // dd($biodata);

        $cetak = CetakTransaction::where('biodata_id', $biodata->id)->first();

        $functionaries = Functionary::where('is_active', 1)
            ->orderBy('name', 'desc')
            ->get();

        return view('dashboard.show', compact('biodata', 'cetak', 'functionaries'));
    }

    public function edit(Biodata $biodata)
    {
        return view('dashboard.edit', compact('biodata'));
    }

    public function create()
    {

        return view('dashboard.create');
    }
}
