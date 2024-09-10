<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

defined('BASEPATH') || exit('No direct script access allowed');

Route::get('/', 'Periksa@index');
// Definisi Rute Default
Route::group('periksa', static function (): void {
    Route::get('/', 'Periksa@index')->name('periksa.index');
    Route::match(['GET', 'POST'], '/perbaiki', 'Periksa@perbaiki')->name('periksa.perbaiki');
    Route::match(['GET', 'POST'], '/perbaiki_sebagian/{masalah?}', 'Periksa@perbaiki_sebagian')->name('periksa.perbaiki_sebagian');    
});
Route::group('periksaKlasifikasiSurat', static function (): void {
    Route::get('/hapus', 'PeriksaKlasifikasiSurat@hapus')->name('periksaKlasifikasiSurat.hapus');
});
Route::group('periksaLogKeluarga', static function (): void {
    Route::get('/', 'PeriksaLogKeluarga@index')->name('periksaLogKeluarga.index');
    Route::post('/hapusLog', 'PeriksaLogKeluarga@hapusLog')->name('periksaLogKeluarga.hapusLog');
});
Route::group('periksaLogPenduduk', static function (): void {
    Route::get('/', 'PeriksaLogPenduduk@index')->name('periksaLogPenduduk.index');
    Route::post('/hapusLog', 'PeriksaLogPenduduk@hapusLog')->name('periksaLogPenduduk.hapusLog');
    Route::post('/updateStatusDasar', 'PeriksaLogPenduduk@updateStatusDasar')->name('periksaLogPenduduk.updateStatusDasar');
});
// Koneksi database
Route::get('koneksi-database', 'Koneksi_database@index');
Route::group('koneksi_database', static function (): void {
    Route::get('/', 'Koneksi_database@index');
    Route::get('config', 'Koneksi_database@config');
    Route::get('updateKey', 'Koneksi_database@updateKey');
    Route::get('desaBaru', 'Koneksi_database@desaBaru');
    Route::get('encryptPassword', 'Koneksi_database@encryptPassword');
});