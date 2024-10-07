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
        $this->load->model(['periksa_model']);
        if ($this->session->message_query || $this->session->message_exception) {
            log_message('error', $this->session->message_query);
            log_message('error', $this->session->message_exception);
        }
        $periksa = $this->periksa_model->periksa;
        if (! $periksa['masalah']) {
            $this->load->model('database_model');
            Migrasi::truncate();
            $this->database_model->migrasi_db_cri();

            return view('periksa.migrasi');
        }

        return view('periksa.index', array_merge($periksa, ['header' => $this->header]));
    }

    public function perbaiki(): void
    {
        $this->load->model(['periksa_model']);
        $this->periksa_model->perbaiki();
        $this->session->unset_userdata(['db_error', 'message', 'message_query', 'heading', 'message_exception']);

        redirect('/');
    }

    public function perbaiki_sebagian($masalah): void
    {

        $this->periksa_model->perbaiki_sebagian($masalah);
        $this->session->unset_userdata(['db_error', 'message', 'message_query', 'heading', 'message_exception']);

        redirect('/');
    }

    public function perbaiki_autoincrement()
    {
        $customTypeString  = ['enum', 'type_trivial_name', 'type_mask', 'type_bestmix_code', 'type_rm_class', 'type_dictionary_term', 'type_username', 'type_new_external_id', 'type_external_id', 'type_entity_name', 'type_entity_address', 'type_zip_code', 'type_dictionary_id', 'type_email', 'type_document_id', 'type_old_rm_code'];
        $customTypeDecimal = ['type_money_decimal', 'type_mass_decimal'];
        // see https://github.com/laravel/framework/issues/1346
        $platform = DB::getDoctrineSchemaManager()->getDatabasePlatform();

        foreach ($customTypeString as $type) {
            $platform->registerDoctrineTypeMapping($type, 'string');
        }

        foreach ($customTypeDecimal as $type) {
            $platform->registerDoctrineTypeMapping($type, 'decimal');
        }
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
        $manager      = DB::getDoctrineSchemaManager();
        $databaseName = (new BaseModel())->getConnection()->getDatabaseName();        
        $sql          = "SELECT `TABLE_NAME` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '{$databaseName}' AND AUTO_INCREMENT IS NULL";

        foreach (DB::select($sql) as $table) {
            
            if (in_array($table->TABLE_NAME, $exclude_table)) continue;
            echo $table->TABLE_NAME;
            $tableObj = $manager->introspectTable($table->TABLE_NAME);
            $primaryKey = $tableObj->getPrimaryKey();            
            $primaryKeyColumn = null;
            $addPrimaryKey = '';
            if($primaryKey){                
                $primaryKeyColumn = $primaryKey->getColumn()->getName();
            }else {
                $addPrimaryKey = ' PRIMARY KEY';
                foreach ($only_pk as $key => $value) {
                    $primaryKeyColumn = $tableObj->hasColumn($value);
                    if($primaryKeyColumn){
                        $primaryKeyColumn = $tableObj->getColumn('id')->getName();
                        break;
                    }
                }
            }
            $sqlRaw = "ALTER TABLE `$table->TABLE_NAME` MODIFY `$primaryKeyColumn` INT(11) AUTO_INCREMENT $addPrimaryKey";    
            if($primaryKeyColumn){
                DB::statement($sqlRaw);
            }
            echo ' - primary key '. $primaryKeyColumn.'<br>';
            
        }

    }
}
