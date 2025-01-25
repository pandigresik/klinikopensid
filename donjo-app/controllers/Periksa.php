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

use App\Models\Migrasi;
use Illuminate\Support\Facades\DB;

defined('BASEPATH') || exit('No direct script access allowed');

class Periksa extends CI_Controller
{
    public $header;

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        if ($this->session->db_error['code'] === 1049) {
            redirect('koneksi-database');
        }
    }

    public function index()
    {
        $data['form_action'] = site_url('periksa/migrasi_db_cri');

        $data['act_tab'] = 2;
        $data['content'] = 'admin.database.migrasi_cri';

        view('admin.database.index', $data);
    }

    public function migrasi_db_cri(): void
    {
        session_error_clear();
        set_time_limit(0);              // making maximum execution time unlimited
        ob_implicit_flush(1);           // Send content immediately to the browser on every statement which produces output
        ob_end_flush();
        Migrasi::truncate();
        $this->load->model('database_model');
        $this->perbaiki_autoincrement();
        echo json_encode(['message' => 'Ulangi migrasi database versi ' . VERSI_DATABASE, 'status' => 0]);
        $this->database_model->setShowProgress(1)->migrasi_db_cri(true);
        echo json_encode(['message' => 'Proses migrasi database telah berhasil', 'status' => 1]);
    }

    public function perbaiki_autoincrement()
    {
        $hasil = true;

        // Tabel yang tidak memerlukan Auto_Increment
        $exclude_table = [
            'analisis_respon',
            'analisis_respon_hasil',
            'captcha_codes',
            'password_resets',
            'sentitems', // Belum tau bentuk datanya bagamana
            'sys_traffic',
            'tweb_penduduk_mandiri',
            'tweb_penduduk_map', // id pada tabel tweb_penduduk_map == penduduk.id (buka id untuk AI)
        ];

        // Auto_Increment hanya diterapkan pada kolom berikut
        $only_pk = [
            'id',
            'id_kontak',
            'id_aset',
            'pamong_id',
        ];

        // Daftar tabel yang tidak memiliki Auto_Increment
        $tables = DB::select("SELECT `TABLE_NAME` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '{$this->db->database}' AND AUTO_INCREMENT IS NULL");
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $tbl) {
            $name = $tbl->TABLE_NAME;
            if (! in_array($name, $exclude_table) && in_array($key = $this->db->list_fields($name)[0], $only_pk)) {
                try {
                    $this->addAutoIncrement($name, $key);
                    echo json_encode(['message' => 'Perbaikan auto increment pada tabel ' . $name, 'status' => 0]);
                } catch (Exception $e) {
                    log_message('error', "Auto_Increment pada tabel {$name} dengan kolom {$key} gagal ditambahkan." . $e->getMessage());
                }
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return $hasil;
    }

    private function addAutoIncrement(string $table, string $key)
    {
        // Query to get the table schema
        $stmt   = DB::select("SHOW CREATE TABLE {$table}");
        $result = (array) $stmt[0];

        $hasPrimaryKey = false;
        // Check for primary key and auto increment
        if (preg_match('/PRIMARY KEY \(`(.+?)`\)/', $result['Create Table'], $matches)) {
            $hasPrimaryKey = true;
        }
        if (! $hasPrimaryKey) {
            $this->hapusIdKembar($table, $key);
            DB::statement("ALTER TABLE {$table} add primary key({$key})");
        }
        DB::statement("ALTER TABLE {$table} MODIFY {$key} INT NOT NULL AUTO_INCREMENT");
    }

    private function hapusIdKembar(string $table, string $key)
    {
        $hasil = DB::select("select {$key} from {$table} group by {$key} having count(*) > 1");
        if (count($hasil) > 0) {
            DB::statement("delete from {$table} where {$key} in (select {$key} from {$table} group by {$key} having count({$key}) > 1)");

            foreach ($hasil as $key => $item) {
                $tmpInsert = (array) $item;
                DB::insert("insert into {$table} (" . implode(',', array_keys($tmpInsert)) . ") values ('" . implode("','", array_values($tmpInsert)) . "')");
            }
        }
    }
}
