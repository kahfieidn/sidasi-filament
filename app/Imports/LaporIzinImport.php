<?php

namespace App\Imports;

use App\Models\Izin;
use App\Models\LaporIzin;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Filament\Notifications\Actions\Action;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LaporIzinImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    /**
     * @param Collection $collection
     */
    use Importable;
    protected $rules = [];
    protected $customMessages = [];

    public function collection(Collection $collection)
    {

        foreach ($collection as $key => $row) {
            $izin = Izin::where('nama_izin', $row['jenis_izin'])->where('user_id', Auth::id())->pluck('id')->first();
            $tanggalMasuk = is_numeric($row['tanggal_masuk']) ? Date::excelToDateTimeObject($row['tanggal_masuk'])->format('Y-m-d') : null;
            $tanggalIzin = is_numeric($row['tanggal_izin']) ? Date::excelToDateTimeObject($row['tanggal_izin'])->format('Y-m-d') : null;




            if ($izin === null) {
                $rules['izin_' . $key] = 'required';
                $customMessages['izin_' . $key . '.required'] = 'Perhatikan "' . $row['jenis_izin'] . '" Pada baris ' . ($key + 2) . ' tidak terdaftar';
            }
            if ($tanggalMasuk === null) {
                $rules['tanggalMasuk_' . $key] = 'required';
                $customMessages['tanggalMasuk_' . $key . '.required'] = 'Perhatikan "' . $row['tanggal_masuk'] . '" Pada baris ' . ($key + 2) . ' tidak sesuai dengan format tanggal!';
            }
            if ($tanggalIzin === null) {
                $rules['tanggalIzin_' . $key] = 'required';
                $customMessages['tanggalIzin_' . $key . '.required'] = 'Perhatikan "' . $row['tanggal_izin'] . '" Pada baris ' . ($key + 2) . ' tidak sesuai dengan format tanggal!';
            }

            if ($row['nama_perusahaan_or_perorangan'] === null) {
                $rules['nama_perusahaan_or_perorangan_' . $key] = 'required';
                $customMessages['nama_perusahaan_or_perorangan_' . $key . '.required'] = 'Nama Perusahaan/Perorangan Wajib di Isi!';
            }

            if ($row['alamat_perusahaan_or_perorangan'] === null) {
                $rules['alamat_perusahaan_or_perorangan_' . $key] = 'required';
                $customMessages['alamat_perusahaan_or_perorangan_' . $key . '.required'] = 'Alamat Perusahaan/Perorangan Wajib di Isi!';
            }

            if ($row['nomor_izin'] === null) {
                $rules['nomor_izin_' . $key] = 'required';
                $customMessages['nomor_izin_' . $key . '.required'] = 'Nomor Izin Wajib di Isi!';
            }

            if ($row['jenis_izin'] === null) {
                $rules['jenis_izin_' . $key] = 'required';
                $customMessages['jenis_izin_' . $key . '.required'] = 'Jenis Izin Wajib di Isi!';
            }
        }

        // Jika ada aturan validasi, lakukan validasi untuk seluruh koleksi
        if (!empty($rules)) {
            $validator = Validator::make($collection->toArray(), $rules, $customMessages);
            if ($validator->fails()) {

                if ($izin === null) {
                    Notification::make()
                        ->title('!!! GAGAL !!!')
                        ->danger()
                        ->persistent()
                        ->body($validator->errors()->first())
                        ->actions([
                            Action::make('view')
                                ->label('Daftarkan Izin')
                                ->button()
                                ->url('/app/izins'),
                            Action::make('undo')
                                ->color('gray')
                                ->label('Tutup')
                                ->close(),
                        ])
                        ->send();
                } else {
                    Notification::make()
                        ->title('!!! GAGAL !!!')
                        ->danger()
                        ->body($validator->errors()->first())
                        ->persistent()
                        ->actions([
                            Action::make('view')
                                ->label('Baik, Saya Mengerti')
                                ->button(),
                            Action::make('undo')
                                ->color('gray')
                                ->label('Tutup')
                                ->close(),
                        ])
                        ->send();
                }
                return; // Hentikan proses jika validasi gagal
            }
        }

        // Jika validasi berhasil, lanjutkan dengan penyimpanan data
        foreach ($collection as $key => $row) {
            $izin = Izin::where('nama_izin', $row['jenis_izin'])->where('user_id', Auth::id())->pluck('id')->first();
            $tanggalMasuk = is_numeric($row['tanggal_masuk']) ? Date::excelToDateTimeObject($row['tanggal_masuk'])->format('Y-m-d') : null;
            $tanggalIzin = is_numeric($row['tanggal_izin']) ? Date::excelToDateTimeObject($row['tanggal_izin'])->format('Y-m-d') : null;

            LaporIzin::create([
                'nama_perusahaan' => $row['nama_perusahaan_or_perorangan'],
                'alamat_perusahaan' => $row['alamat_perusahaan_or_perorangan'],
                'alamat_proyek' => $row['alamat_proyek'],
                'tanggal_masuk' => $tanggalMasuk,
                'tanggal_izin' => $tanggalIzin,
                'nomor_izin' => $row['nomor_izin'],
                'izin_id' => $izin,
                'user_id' => Auth::id(),
            ]);
        }

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->duration(5000)
            ->send();
    }

    public function rules(): array
    {
        return [
            'nama_perusahaan_or_perorangan' => 'required',
            'nomor_izin' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [];
    }
}
