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

use App\Models\BaseModel;
use App\Models\Config;
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

        $this->header = Config::appKey()->first();
    }

    public function index()
    {        
        if ($this->session->message_query || $this->session->message_exception) {
            log_message('error', $this->session->message_query);
            log_message('error', $this->session->message_exception);
        }        
        $this->perbaiki_autoincrement();
        $this->load->model('database_model');
        Migrasi::truncate();
        $this->database_model->migrasi_db_cri(true);

        return view('periksa.index', array_merge([], ['header' => $this->header]));
    }    

    public function perbaiki_autoincrement()
    {
        $hasil = true;

        // Tabel yang tidak memerlukan Auto_Increment
        $exclude_table = [
            'analisis_respon',
            'analisis_respon_hasil',
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
        ];

        // Daftar tabel yang tidak memiliki Auto_Increment
        $tables = DB::select("SELECT `TABLE_NAME` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '{$this->db->database}' AND AUTO_INCREMENT IS NULL");        
        $this->db->simple_query('SET FOREIGN_KEY_CHECKS=0');
        foreach ($tables as $tbl) {
            $name = $tbl->TABLE_NAME;            
            if (!in_array($name, $exclude_table) && in_array($key = $this->db->list_fields($name)[0], $only_pk)) {                
                try {
                    $hasil = DB::statement("ALTER TABLE $name add primary key($key)");
                    $hasil = DB::statement("ALTER TABLE $name MODIFY $key INT NOT NULL AUTO_INCREMENT");
                } catch (\Exception $e) {
                    log_message('error', "Auto_Increment pada tabel {$name} dengan kolom {$key} gagal ditambahkan.". $e->getMessage());
                }                            
            }
            $this->db->simple_query('SET FOREIGN_KEY_CHECKS=1');
        }

        return $hasil;
    }
}
