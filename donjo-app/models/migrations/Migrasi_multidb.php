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
 * Hak Cipta 2016 - 2023 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
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
 * @copyright Hak Cipta 2016 - 2023 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

use App\Models\Kelompok;
use App\Models\KelompokAnggota;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

defined('BASEPATH') || exit('No direct script access allowed');

class Migrasi_multidb extends MY_model
{
    public function up()
    {
        $hasil = true;        
        $hasil = $hasil && $this->identitas_desa($hasil);
        $hasil = $hasil && $this->wilayah_administratif($hasil);
        $hasil = $hasil && $this->pengaturan_aplikasi($hasil);
        $hasil = $hasil && $this->teks_berjalan($hasil);
        $hasil = $hasil && $this->admin_artikel($hasil);
        $hasil = $hasil && $this->pembangunan($hasil);
        $hasil = $hasil && $this->pembangunan_dokumentasi($hasil);
        $hasil = $hasil && $this->informasi_publik($hasil);
        $hasil = $hasil && $this->gallery($hasil);
        $hasil = $hasil && $this->bumindes_kader($hasil);
        $hasil = $hasil && $this->media_sosial($hasil);
        $hasil = $hasil && $this->kehadiran_jam_kerja($hasil);
        $hasil = $hasil && $this->kehadiran_alasan_keluar($hasil);
        $hasil = $hasil && $this->kehadiran_hari_libur($hasil);
        $hasil = $hasil && $this->kehadiran_perangkat_desa($hasil);
        $hasil = $hasil && $this->kehadiran_pengaduan($hasil);
        $hasil = $hasil && $this->penduduk($hasil);
        $hasil = $hasil && $this->log_penduduk($hasil);
        $hasil = $hasil && $this->pemerintah_desa($hasil);
        $hasil = $hasil && $this->ref_jabatan($hasil);
        $hasil = $hasil && $this->klasifikasi_surat($hasil);
        $hasil = $hasil && $this->anjungan($hasil);
        $hasil = $hasil && $this->bantuan($hasil);
        $hasil = $hasil && $this->inventaris_tanah($hasil);
        $hasil = $hasil && $this->anjungan_menu($hasil);
        $hasil = $hasil && $this->peta_lokasi($hasil);
        $hasil = $hasil && $this->peta_tipe_lokasi($hasil);
        $hasil = $hasil && $this->peta_simbol_lokasi($hasil);
        $hasil = $hasil && $this->syarat_surat($hasil);
        $hasil = $hasil && $this->layanan_mandiri_pesan($hasil);
        $hasil = $hasil && $this->peta_garis($hasil);
        $hasil = $hasil && $this->peta_line($hasil);
        $hasil = $hasil && $this->layanan_mandiri_pendapat($hasil);
        $hasil = $hasil && $this->admin_pengunjung($hasil);
        $hasil = $hasil && $this->covid19_pemudik($hasil);
        $hasil = $hasil && $this->vaksin($hasil);
        $hasil = $hasil && $this->peta_area($hasil);
        $hasil = $hasil && $this->peta_tipe_area($hasil);
        $hasil = $hasil && $this->widget($hasil);
        $hasil = $hasil && $this->keuangan_master($hasil);
        $hasil = $hasil && $this->keluarga($hasil);
        $hasil = $hasil && $this->log_keluarga($hasil);
        $hasil = $hasil && $this->rtm($hasil);
        $hasil = $hasil && $this->buku_pertanyaan($hasil);
        $hasil = $hasil && $this->buku_keperluan($hasil);
        $hasil = $hasil && $this->buku_kepuasan($hasil);
        $hasil = $hasil && $this->penduduk_mandiri($hasil);
        $hasil = $hasil && $this->buku_tamu($hasil);
        $hasil = $hasil && $this->lembaga_desa($hasil);
        $hasil = $hasil && $this->persil($hasil);
        $hasil = $hasil && $this->tweb_surat_format($hasil);
        $hasil = $hasil && $this->ref_syarat_surat($hasil);
        $hasil = $hasil && $this->log_surat($hasil);
        $hasil = $hasil && $this->surat_masuk($hasil);
        $hasil = $hasil && $this->surat_keluar($hasil);
        $hasil = $hasil && $this->permohonan_surat($hasil);
        $hasil = $hasil && $this->laporan_sinkronisasi($hasil);
        $hasil = $hasil && $this->pengaduan($hasil);
        $hasil = $hasil && $this->admin_web_menu($hasil);
        $hasil = $hasil && $this->kategori($hasil);
        $hasil = $hasil && $this->lapak($hasil);
        $hasil = $hasil && $this->table_suplemen($hasil);
        $hasil = $hasil && $this->statistik($hasil);
        $hasil = $hasil && $this->keuangan_manual_rinci($hasil);
        $hasil = $hasil && $this->posyandu($hasil);
        $hasil = $hasil && $this->hubung_warga_kontak($hasil);
        $hasil = $hasil && $this->tanah_kas_desa($hasil);
        $hasil = $hasil && $this->import_keuangan($hasil);
        $hasil = $hasil && $this->modul($hasil);
        $hasil = $hasil && $this->user($hasil);
        $hasil = $hasil && $this->user_grup($hasil);
        $hasil = $hasil && $this->hubung_warga_kirim_pesan($hasil);
        $hasil = $hasil && $this->database($hasil);
        $hasil = $hasil && $this->tanah_desa($hasil);
        $hasil = $hasil && $this->sinkronisasi($hasil);
        $hasil = $hasil && $this->pesan($hasil);
        $hasil = $hasil && $this->disposisi_surat_masuk($hasil);
        $hasil = $hasil && $this->cdesa($hasil);
        $hasil = $hasil && $this->notifikasi($hasil);
        $hasil = $hasil && $this->urls($hasil);
        $hasil = $hasil && $this->analisis_indikator($hasil);
        $hasil = $hasil && $this->analisis_master($hasil);
        $hasil = $hasil && $this->analisis_periode($hasil);
        $hasil = $hasil && $this->analisis_parameter($hasil);
        $hasil = $hasil && $this->verifikasi_surat($hasil);
        $hasil = $hasil && $this->analisis_kategori_indikator($hasil);
        $hasil = $hasil && $this->analisis_klasifikasi($hasil);
        $hasil = $hasil && $this->analisis_respon($hasil);
        $hasil = $hasil && $this->tte($hasil);
        $hasil = $hasil && $this->dtks($hasil);
        $hasil = $hasil && $this->password_reset($hasil);
        
        $sudahMigrasiModulAwal = DB::table('setting_modul')->where('modul', 'Optimasi Gambar')->count();
        
        if (! $sudahMigrasiModulAwal) {
            $hasil = $hasil && $this->reset_modul($hasil);
        }
        $hasil = $hasil && $this->jalankan_migrasi('data_awal');

        return $hasil && true;
    }

    // OpenKAB - Identitas Desa
    protected function identitas_desa($hasil)
    {
        $tabel = 'config';

        // Tambah kolom app_key pada tabel config
        if (! Schema::hasColumn($tabel, 'app_key')) {
            $hasil = $hasil && $this->dbforge->add_column($tabel, [
                'app_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => false,
                    'default'    => '',
                    'after'      => 'id',
                ],
            ]);

            // Modifikasi kolom id pada tabel config
            $hasil = $hasil && $this->dbforge->modify_column('config', [
                'id' => [
                    'name'           => 'id',
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'null'           => false,
                    'auto_increment' => true,
                ],
            ]);
        }

        // Modifikasi kolom id pada tabel config
        $hasil = $hasil && $this->dbforge->modify_column($tabel, [
            'id' => [
                'name'           => 'id',
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => false,
                'auto_increment' => true,
            ],
        ]);

        // Jika data pada tabel config masih hanya 1, maka tambahkan app_key
        $config = DB::table($tabel);
        if ($config->count() == 1 && $config->first()->app_key == '') {
            $config->update(['app_key' => get_app_key()]);
        }

        // Unique kolom app_key pada tabel config
        if (! $this->cek_indeks($tabel, 'app_key')) {
            Schema::table($tabel, static function (Blueprint $table) {
                $table->unique(['app_key'], 'app_key');
            });
        }

        // Unique kolom kode_desa pada tabel config
        if (! $this->cek_indeks($tabel, 'kode_desa')) {
            Schema::table($tabel, static function (Blueprint $table) {
                $table->unique(['kode_desa'], 'kode_desa');
            });
        }

        return $hasil;
    }

    // OpenKAB - Wilayah Administratif
    protected function wilayah_administratif($hasil)
    {
        $tabel = 'tweb_wil_clusterdesa';

        // Ubah url modul wilayah
        $hasil = $hasil && $this->ubah_modul(20, ['url' => 'wilayah/clear']);

        // Tambah kolom config_id pada tabel tweb_wil_clusterdesa
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Sesuaikan ulang index rt pada tabel tweb_wil_clusterdesa
        return $hasil && $this->buat_ulang_index($tabel, 'rt', '(`config_id`, `rt`, `rw`, `dusun`)');
    }

    // OpenKAB - Pengaturan Aplikasi
    protected function pengaturan_aplikasi($hasil)
    {
        $table = 'setting_aplikasi';

        // Tambah kolom config_id pada tabel setting_aplikasi
        $hasil = $hasil && $this->tambah_config_id($table);

        // Sesuaikan ulang index key pada tabel setting_aplikasi
        $hasil = $hasil && $this->buat_ulang_index($table, 'key', '(`config_id`, `key`)');

        return $hasil && true;
    }

    // OpenKAB - Teks Berjalan
    protected function teks_berjalan($hasil)
    {
        return $hasil && $this->tambah_config_id('teks_berjalan');
    }

    // OpenKAB - Pembagunan
    protected function pembangunan($hasil)
    {
        $tabel = 'pembangunan';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        return $hasil && $this->buat_ulang_index($tabel, 'slug', '(`config_id`, `slug`)');
    }

    // OpenKAB - Pembagunan Dokumentasi
    protected function pembangunan_dokumentasi($hasil)
    {
        return $hasil && $this->tambah_config_id('pembangunan_ref_dokumentasi');
    }

    // OpenKAB - Informasi Publik
    protected function informasi_publik($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('dokumen');

        return $hasil && $this->db->query('CREATE OR REPLACE VIEW dokumen_hidup AS SELECT * FROM dokumen WHERE deleted <> 1');
    }

    // OpenKAB - admin web - gallery
    protected function gallery($hasil)
    {
        return $hasil && $this->tambah_config_id('gambar_gallery');
    }

    // OpenKAB - Bumindes Pembangunan
    protected function bumindes_kader($hasil)
    {
        return $hasil && $this->tambah_config_id('kader_pemberdayaan_masyarakat');
    }

    // OpenKAB - Modul Web artikel
    protected function admin_artikel($hasil)
    {
        $this->db->query('ALTER TABLE agenda MODIFY COLUMN tgl_agenda timestamp DEFAULT current_timestamp() NOT NULL');
        $hasil = $hasil && $this->tambah_config_id('agenda');

        return $hasil && $this->tambah_config_id('artikel');
    }

    // OpenKAB - Media Sosial
    protected function media_sosial($hasil)
    {
        $tabel = 'media_sosial';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        if (! $this->cek_indeks($tabel, 'media_sosial_config')) {
            Schema::table($tabel, static function (Blueprint $table) {
                $table->unique(['config_id', 'nama'], 'media_sosial_config');
            });
        }

        return $hasil && true;
    }

    // OpenKAB - Kehadiran Jam Kerja
    protected function kehadiran_jam_kerja($hasil)
    {
        $tabel = 'kehadiran_jam_kerja';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        if (! $this->cek_indeks($tabel, 'jam_kerja_config')) {
            Schema::table($tabel, static function (Blueprint $table) {
                $table->unique(['config_id', 'nama_hari'], 'jam_kerja_config');
            });
        }

        return $hasil && true;
    }

    // OpenKAB - Kehadiran Alasan Keluar
    protected function kehadiran_alasan_keluar($hasil)
    {
        return $hasil && $this->tambah_config_id('kehadiran_alasan_keluar');
    }

    // OpenKAB - Kehadiran Hari Libur
    protected function kehadiran_hari_libur($hasil)
    {
        $tabel = 'kehadiran_hari_libur';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        return $hasil && $this->buat_ulang_index($tabel, 'tanggal', '(`config_id`, `tanggal`)');
    }

    // OpenKAB - Kehadiran Perangkat Desa
    protected function kehadiran_perangkat_desa($hasil)
    {
        return $hasil && $this->tambah_config_id('kehadiran_perangkat_desa');
    }

    // OpenKAB - Kehadiran Pengaduan
    protected function kehadiran_pengaduan($hasil)
    {
        return $hasil && $this->tambah_config_id('kehadiran_pengaduan');
    }

    // OpenKAB - Penduduk
    protected function penduduk($hasil)
    {
        $table = 'tweb_penduduk';

        // Tambah kolom config_id pada tabel tweb_penduduk
        $hasil = $hasil && $this->tambah_config_id($table);

        // Sesuaikan ulang index nik pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'nik', '(`config_id`, `nik`)');

        // Sesuaikan ulang index tag_id_card pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'tag_id_card', '(`config_id`, `tag_id_card`)');

        // Sesuaikan ulang index telegram pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'telegram', '(`config_id`, `telegram`)');

        // Sesuaikan ulang index telegram_token pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'telegram_token', '(`config_id`, `telegram_token`)');

        // Sesuaikan ulang index email_token pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'email_token', '(`config_id`, `email_token`)');

        // Sesuaikan ulang index email pada tabel tweb_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'email', '(`config_id`, `email`)');

        return $hasil && $this->db->query('CREATE OR REPLACE VIEW penduduk_hidup AS SELECT * FROM tweb_penduduk WHERE status_dasar = 1');
    }

    // OpenKAB - Log Penduduk
    protected function log_penduduk($hasil)
    {
        $table = 'log_penduduk';
        $this->db->query('ALTER TABLE log_perubahan_penduduk MODIFY COLUMN tanggal timestamp DEFAULT current_timestamp() NOT NULL');
        // Tambah kolom config_id pada tabel tweb_penduduk
        $hasil = $hasil && $this->tambah_config_id($table);

        // Sesuaikan ulang index id_pend pada tabel log_penduduk
        $hasil = $hasil && $this->buat_ulang_index($table, 'log_penduduk_unique_1', '(`config_id`, `id_pend`, `kode_peristiwa`, `tgl_peristiwa`)');

        // Tambah kolom config_id pada tabel log_perubahan_penduduk
        $hasil = $hasil && $this->tambah_config_id('log_perubahan_penduduk');

        // Tambah kolom config_id pada tabel log_perubahan_penduduk
        return $hasil && $this->tambah_config_id('log_hapus_penduduk');
    }

    // OpenKAB - Pemerintah Desa
    protected function pemerintah_desa($hasil)
    {
        $tabel = 'tweb_desa_pamong';

        $hasil = $hasil && $this->tambah_config_id($tabel, 'pamong_id');

        return $hasil && $this->buat_ulang_index($tabel, 'pamong_tag_id_card', '(`config_id`, `pamong_tag_id_card`)');
    }

    // OpenKAB - Pemerintah Desa - Jabatan
    protected function ref_jabatan($hasil)
    {
        return $hasil && $this->tambah_config_id('ref_jabatan');
    }

    // OpenKAB - Klasisfikasi Surat
    protected function klasifikasi_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('klasifikasi_surat');
    }

    // OpenKAB - Anjungan
    protected function anjungan($hasil)
    {
        return $hasil && $this->tambah_config_id('anjungan');
    }

    // OpenKAB - Inventaris
    protected function inventaris_tanah($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('inventaris_tanah');
        $hasil = $hasil && $this->tambah_config_id('inventaris_peralatan');
        $hasil = $hasil && $this->tambah_config_id('inventaris_gedung');
        $hasil = $hasil && $this->tambah_config_id('inventaris_jalan');
        $hasil = $hasil && $this->tambah_config_id('inventaris_asset');
        $hasil = $hasil && $this->tambah_config_id('inventaris_kontruksi');

        $hasil = $hasil && $this->tambah_config_id('mutasi_inventaris_tanah');
        $hasil = $hasil && $this->tambah_config_id('mutasi_inventaris_peralatan');
        $hasil = $hasil && $this->tambah_config_id('mutasi_inventaris_gedung');
        $hasil = $hasil && $this->tambah_config_id('mutasi_inventaris_jalan');
        $hasil = $hasil && $this->tambah_config_id('mutasi_inventaris_asset');

        $hasil = $hasil && $this->db->query("CREATE OR REPLACE VIEW `master_inventaris` AS SELECT 'inventaris_asset' AS asset, inventaris_asset.config_id, inventaris_asset.id, inventaris_asset.nama_barang, inventaris_asset.kode_barang, 'Baik' AS kondisi, inventaris_asset.keterangan, inventaris_asset.asal, inventaris_asset.tahun_pengadaan FROM inventaris_asset WHERE visible = 1 UNION ALL SELECT 'inventaris_gedung' AS asset, inventaris_gedung.config_id, inventaris_gedung.id, inventaris_gedung.nama_barang, inventaris_gedung.kode_barang, inventaris_gedung.kondisi_bangunan, inventaris_gedung.keterangan, inventaris_gedung.asal, YEAR(inventaris_gedung.tanggal_dokument) AS tahun_pengadaan FROM inventaris_gedung WHERE visible = 1 UNION ALL SELECT 'inventaris_jalan' AS asset, inventaris_jalan.config_id, inventaris_jalan.id, inventaris_jalan.nama_barang, inventaris_jalan.kode_barang, inventaris_jalan.kondisi, inventaris_jalan.keterangan, inventaris_jalan.asal, YEAR (inventaris_jalan.tanggal_dokument) AS tahun_pengadaan FROM inventaris_jalan WHERE visible = 1 UNION ALL SELECT 'inventaris_peralatan' AS asset, inventaris_peralatan.config_id, inventaris_peralatan.id, inventaris_peralatan.nama_barang, inventaris_peralatan.kode_barang, 'Baik', inventaris_peralatan.keterangan, inventaris_peralatan.asal, inventaris_peralatan.tahun_pengadaan FROM inventaris_peralatan WHERE visible = 1");

        return $hasil && $this->db->query("CREATE OR REPLACE VIEW `rekap_mutasi_inventaris` AS SELECT 'inventaris_asset' AS asset, config_id, id_inventaris_asset, status_mutasi, jenis_mutasi, tahun_mutasi, keterangan FROM mutasi_inventaris_asset WHERE visible = 1 UNION ALL SELECT 'inventaris_gedung', config_id, id_inventaris_gedung, status_mutasi, jenis_mutasi, tahun_mutasi, keterangan FROM mutasi_inventaris_gedung WHERE visible = 1 UNION ALL SELECT 'inventaris_jalan', config_id, id_inventaris_jalan, status_mutasi, jenis_mutasi, tahun_mutasi, keterangan FROM mutasi_inventaris_jalan WHERE visible = 1 UNION ALL SELECT 'inventaris_peralatan', config_id, id_inventaris_peralatan, status_mutasi, jenis_mutasi, tahun_mutasi, keterangan FROM mutasi_inventaris_peralatan WHERE visible = 1");
    }

    // OpenKAB - Anjungan Menu
    protected function anjungan_menu($hasil)
    {
        $tabel = 'anjungan_menu';
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // if (! $this->cek_indeks($tabel, 'anjungan_menu_config')) {
        //     Schema::table($tabel, static function (Blueprint $table) {
        //         $table->unique(['config_id', 'nama'], 'anjungan_menu_config');
        //     });
        // }

        return $hasil && true;
    }

    protected function peta_lokasi($hasil)
    {
        return $hasil && $this->tambah_config_id('lokasi');
    }

    protected function peta_tipe_lokasi($hasil)
    {
        return $hasil && $this->tambah_config_id('point');
    }

    protected function peta_simbol_lokasi($hasil)
    {
        $tabel = 'gis_simbol';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        foreach (['simbol_2', 'simbol_3', 'simbol_4', 'simbol_5', 'simbol_6'] as $value) {
            $hasil = $hasil && $this->hapus_indeks($tabel, $value);
        }

        return $hasil && $this->buat_ulang_index($tabel, 'simbol', '(`config_id`, `simbol`)');
    }

    // OpenKAB - Dokumen Persyaratan Surat
    protected function syarat_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('ref_syarat_surat', 'ref_syarat_id');
    }

    // OpenKAB - Layanan Mandiri Pesan
    protected function layanan_mandiri_pesan($hasil)
    {
        return $hasil && $this->tambah_config_id('komentar');
    }

    protected function peta_garis($hasil)
    {
        return $hasil && $this->tambah_config_id('garis');
    }

    protected function peta_line($hasil)
    {
        return $hasil && $this->tambah_config_id('line');
    }

    // OpenKAB - Layanan Mandiri Pendapat
    protected function layanan_mandiri_pendapat($hasil)
    {
        return $hasil && $this->tambah_config_id('pendapat');
    }

    // OpenKAB - Admin Web - Pengunjung
    protected function admin_pengunjung($hasil)
    {
        $hasil && $this->tambah_config_id('sys_traffic', 'Tanggal');

        // hapus primary key
        $cek_pk = $this->db->field_data('sys_traffic');
        if ($cek_pk[0]->primary_key == 1 && $cek_pk[1]->primary_key != 1) {
            $this->db->query('ALTER TABLE sys_traffic DROP PRIMARY KEY;');
        }

        return $hasil && $this->tambahIndeks('sys_traffic', 'config_id, Tanggal', 'UNIQUE', true);
    }

    protected function covid19_pemudik($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('covid19_pemudik');

        return $hasil && $this->tambah_config_id('covid19_pantau');
    }

    protected function vaksin($hasil)
    {
        return $hasil && $this->tambah_config_id('covid19_vaksin', 'id_penduduk');
    }

    protected function peta_area($hasil)
    {
        return $hasil && $this->tambah_config_id('area');
    }

    protected function peta_tipe_area($hasil)
    {
        return $hasil && $this->tambah_config_id('polygon');
    }

    // OpenKAB - Admin Web - Widget
    protected function widget($hasil)
    {
        return $hasil && $this->tambah_config_id('widget');
    }

    // OpenKAB - Keuangan Master
    protected function keuangan_master($hasil)
    {
        return $hasil && $this->tambah_config_id('keuangan_master');
    }

    protected function keluarga($hasil)
    {
        $tabel = 'tweb_keluarga';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        return $hasil && $this->buat_ulang_index($tabel, 'no_kk', '(`config_id`, `no_kk`)');
    }

    protected function log_keluarga($hasil)
    {
        $tabel = 'log_keluarga';

        $hasil = $hasil && $this->tambah_config_id($tabel);

        return $hasil && $this->buat_ulang_index($tabel, 'id_kk', '(`config_id`, `id_kk`, `id_peristiwa`, `tgl_peristiwa`, `id_pend`)');
    }

    protected function rtm($hasil)
    {
        $table = 'tweb_rtm';
        $this->db->query('ALTER TABLE tweb_rtm MODIFY COLUMN tgl_daftar timestamp DEFAULT current_timestamp() NOT NULL');
        $hasil = $hasil && $this->tambah_config_id($table);

        $hasil = $hasil && $this->hapus_indeks($table, 'no_kk_2');

        $hasil = $hasil && $this->buat_ulang_index($table, 'no_kk', '(`config_id`, `no_kk`)');

        return $hasil && $this->db->query('CREATE OR REPLACE VIEW keluarga_aktif AS SELECT k.* FROM tweb_keluarga k LEFT JOIN tweb_penduduk p ON k.nik_kepala = p.id WHERE p.status_dasar = 1');
    }

    // OpenKAB - Buku Tamu - Buku pertanyaan
    protected function buku_pertanyaan($hasil)
    {
        return $hasil && $this->tambah_config_id('buku_pertanyaan');
    }

    // OpenKAB - Buku Tamu - Buku Keperluan
    protected function buku_keperluan($hasil)
    {
        return $hasil && $this->tambah_config_id('buku_keperluan');
    }

    // OpenKAB - Buku Tamu - Buku Kepuasan
    protected function buku_kepuasan($hasil)
    {
        return $hasil && $this->tambah_config_id('buku_kepuasan');
    }

    // OpenKAB - Penduduk Mandiri
    protected function penduduk_mandiri($hasil)
    {
        $tabel = 'tweb_penduduk_mandiri';

        $hasil = $hasil && $this->tambah_config_id($tabel, 'pin');

        return $hasil && $this->buat_ulang_index($tabel, 'id_pend', '(`config_id`, `id_pend`)');
    }

    // OpenKAB - Buku Tamu - Buku Tamu
    protected function buku_tamu($hasil)
    {
        return $hasil && $this->tambah_config_id('buku_tamu');
    }

    // OpenKAB - Lembaga Desa
    protected function lembaga_desa($hasil)
    {
        // cek data terlebih dahulu
        $hasil = $hasil && $this->cek_data_kelompok($hasil);
        $hasil = $hasil && $this->tabel_kelompok($hasil);
        $hasil = $hasil && $this->tabel_kelompok_master($hasil);
        $hasil = $hasil && $this->tabel_kelompok_anggota($hasil);

        // Buat relasi antar tabel kelompok, kelompok_master dan kelompok_anggota
        $hasil = $hasil && $this->tambahForeignKey('kelompok_anggota_config_fk', 'kelompok_anggota', 'config_id', 'config', 'id');
        $hasil = $hasil && $this->tambahForeignKey('kelompok_anggota_kelompok_fk', 'kelompok_anggota', 'id_kelompok', 'kelompok', 'id');

        // Bagian ini sering bermasalah dibeberapa desa
        $hasil = $hasil && $this->tambahForeignKey('kelompok_anggota_penduduk_fk', 'kelompok_anggota', 'id_penduduk', 'tweb_penduduk', 'id');

        // Relasi antar tabel kelompok ke tabel kelompok_master
        return $hasil && $this->tambahForeignKey('kelompok_kelompok_master_fk', 'kelompok', 'id_master', 'kelompok_master', 'id');
    }

    protected function tabel_kelompok($hasil)
    {
        $tabel = 'kelompok';

        // Tambah kolom config_id pada tabel kelompok
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Sesuaikan ulang index slug pada tabel kelompok
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'slug', '(`config_id`, `slug`)');

        // Sesuaikan ulang index kode pada tabel kelompok
        return $hasil && $this->buat_ulang_index($tabel, 'kode', '(`config_id`, `kode`)');
    }

    protected function tabel_kelompok_master($hasil)
    {
        // Tambah kolom config_id pada tabel kelompok_master
        return $hasil && $this->tambah_config_id('kelompok_master');
    }

    protected function tabel_kelompok_anggota($hasil)
    {
        $tabel = 'kelompok_anggota';

        // Tambah kolom config_id pada tabel kelompok_anggota
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Hapus foreign key kelompok_anggota_fk pada tabel kelompok_anggota
        $hasil = $hasil && $this->hapus_foreign_key('kelompok', 'kelompok_anggota_fk', $tabel);

        // Sesuaikan ulang index id_kelompok pada tabel kelompok
        return $hasil && $this->buat_ulang_index($tabel, 'id_kelompok', '(`config_id`, `id_kelompok`, `id_penduduk`)');
    }

    // OpenKAB - Bantuan
    protected function bantuan($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('program');
        $hasil = $hasil && $this->tambah_config_id('program_peserta');

        return $hasil && $this->buat_ulang_index('program_peserta', 'program_peserta_program_id_kartu_id_pend_unique', '(`config_id`, `program_id`, `kartu_id_pend`)');
    }

    // OpenKAB - Layanan Surat - Pengaturan Surat
    protected function tweb_surat_format($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('tweb_surat_format');

        // Sesuaikan ulang index id_kelompok pada tabel kelompok
        return $hasil && $this->buat_ulang_index('tweb_surat_format', 'url_surat', '(`config_id`, `url_surat`)');
    }

    protected function ref_syarat_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('ref_syarat_surat');
    }

    protected function log_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('log_surat');
    }

    protected function surat_masuk($hasil)
    {
        return $hasil && $this->tambah_config_id('surat_masuk');
    }

    protected function surat_keluar($hasil)
    {
        return $hasil && $this->tambah_config_id('surat_keluar');
    }

    protected function permohonan_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('permohonan_surat');
    }

    protected function laporan_sinkronisasi($hasil)
    {
        return $hasil && $this->tambah_config_id('laporan_sinkronisasi');
    }

    // OpenKAB - Pengaduan
    protected function pengaduan($hasil)
    {
        // Tambah kolom config_id pada tabel pengaduan
        return $hasil && $this->tambah_config_id('pengaduan');
    }

    // OpenKAB - Admin web - menu
    protected function admin_web_menu($hasil)
    {
        // Tambah kolom config_id pada tabel pengaduan
        return $hasil && $this->tambah_config_id('menu');
    }

    protected function kategori($hasil)
    {
        // Tambah kolom config_id pada tabel pengaduan
        return $hasil && $this->tambah_config_id('kategori');
    }

    // OpenKAB - Lapak
    protected function lapak($hasil)
    {
        // Tambah kolom config_id pada tabel produk
        $hasil = $hasil && $this->tambah_config_id('produk');

        // Tambah kolom config_id pada tabel pelapak
        $hasil = $hasil && $this->tambah_config_id('pelapak');

        // Tambah kolom config_id pada tabel produk_kategori
        return $hasil && $this->tambah_config_id('produk_kategori');
    }

    protected function table_suplemen($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('suplemen');
        $hasil = $hasil && $this->tambah_config_id('suplemen_terdata');

        // Sesuaikan ulang index id_kelompok pada tabel kelompok
        return $hasil && $this->buat_ulang_index('suplemen', 'slug', '(`config_id`, `slug`)');
    }

    protected function statistik($hasil)
    {
        return $hasil && $this->tambah_config_id('tweb_penduduk_umur');
    }

    // modul keuangan manual
    protected function keuangan_manual_rinci($hasil)
    {
        return $hasil && $this->tambah_config_id('keuangan_manual_rinci');
    }

    protected function posyandu($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('posyandu');
        $hasil = $hasil && $this->tambah_config_id('ibu_hamil', 'id_ibu_hamil');
        $hasil = $hasil && $this->tambah_config_id('bulanan_anak', 'id_bulanan_anak');
        $hasil = $hasil && $this->tambah_config_id('sasaran_paud', 'id_sasaran_paud');

        return $hasil && $this->tambah_config_id('kia');
    }

    protected function hubung_warga_kontak($hasil)
    {
        $tabel = 'kontak';

        // Tambah kolom config_id pada tabel kontak
        $hasil = $hasil && $this->tambah_config_id($tabel, 'id_kontak');

        // Sesuaikan ulang index telepon pada tabel kontak
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'telepon', '(`config_id`, `telepon`)');

        // Sesuaikan ulang index email pada tabel kontak
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'email', '(`config_id`, `email`)');

        // Sesuaikan ulang index telegram pada tabel kontak
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'telegram', '(`config_id`, `telegram`)');

        // Tambah kolom config_id pada tabel kontak_grup
        $hasil = $hasil && $this->tambah_config_id('kontak_grup', 'id_grup');

        // Tambah kolom config_id pada tabel anggota_grup_kontak
        return $hasil && $this->tambah_config_id('anggota_grup_kontak', 'id_grup_kontak');
    }

    protected function tanah_kas_desa($hasil)
    {
        return $hasil && $this->tambah_config_id('tanah_kas_desa');
    }

    protected function import_keuangan($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_bank_desa');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_bel_operasional');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_bidang');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_bunga');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_desa');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_kecamatan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_kegiatan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_korolari');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_korolari');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_neraca_close');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_perangkat');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_potongan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_rek1');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_rek2');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_rek3');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_rek4');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_sbu');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ref_sumber');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_anggaran');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_anggaran_log');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_anggaran_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_bidang');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_desa');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_jurnal_umum');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_jurnal_umum_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_kegiatan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_mutasi');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_pajak');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_pajak_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_pemda');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_pencairan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_perangkat');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rab');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rab_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rab_sub');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_bidang');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_kegiatan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_misi');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_pagu_indikatif');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_pagu_tahunan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_sasaran');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_tujuan');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_rpjm_visi');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_saldo_awal');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spj');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spj_bukti');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spj_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spj_sisa');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spjpot');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spp');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spp_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_sppbukti');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_spppot');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_sts');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_sts_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_tbp');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_tbp_rinci');
        $hasil = $hasil && $this->tambah_config_id('keuangan_ta_triwulan');

        return $hasil && $this->tambah_config_id('keuangan_ta_triwulan_rinci');
    }

    // OpenKAB - Modul
    protected function modul($hasil)
    {
        $tabel = 'setting_modul';

        // Tambah kolom config_id pada tabel setting_modul
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Sesuaikan ulang index rt pada tabel tweb_wil_clusterdesa
        return $hasil && $this->buat_ulang_index($tabel, 'slug', '(`config_id`, `slug`)');
    }

    // OpenKAB - Pengguna
    protected function user($hasil)
    {
        $tabel = 'user';

        // Tambah kolom config_id pada tabel user
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Sesuaikan ulang index username pada tabel user
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'username', '(`config_id`, `username`)');

        // Sesuaikan ulang index email pada tabel user
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'email', '(`config_id`, `email`)');

        // Sesuaikan ulang index pamong_id pada tabel user
        return $hasil && $this->buat_ulang_index($tabel, 'pamong_id', '(`config_id`, `pamong_id`)');
    }

    // OpenKAB - Grup Pengguna
    protected function user_grup($hasil)
    {
        $tabel = 'user_grup';

        if (! $this->cek_indeks($tabel, 'nama_grup_config')) {
            $data_ganda = DB::table($tabel)
                ->select('nama')
                ->selectRaw('count(*) as jumlah')
                ->groupBy('nama')
                ->havingRaw('count(*) > 1')
                ->get();

            foreach ($data_ganda as $data) {
                DB::table($tabel)
                    ->where('nama', $data->nama)
                    ->where('jenis', '<>', 1)
                    ->update(['nama' => $data->nama . ' 1']);
            }
        }

        // Tambah kolom config_id pada tabel user
        $hasil = $hasil && $this->tambah_config_id($tabel);

        if (! $this->cek_indeks($tabel, 'nama_grup_config')) {
            Schema::table($tabel, static function (Blueprint $table) {
                $table->unique(['config_id', 'nama'], 'nama_grup_config');
            });
        }

        // Tambah kolom config_id pada tabel grup_akses
        $hasil = $hasil && $this->tambah_config_id('grup_akses');

        // Tambah kolom config_id pada tabel login_attempts
        return $hasil && $this->tambah_config_id('login_attempts');
    }

    protected function hubung_warga_kirim_pesan($hasil)
    {
        $tabel = 'outbox';

        // Tambah kolom config_id pada tabel outbox
        $hasil = $hasil && $this->tambah_config_id($tabel, 'ID');

        // Sesuaikan ulang index outbox_sender pada tabel outbox
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'outbox_sender', '(`config_id`, `SenderID`)', '');

        // Sesuaikan ulang index outbox_date pada tabel outbox
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'outbox_date', '(`SendingDateTime`, `SendingTimeOut`)', '');

        $tabel = 'sentitems';

        // Tambah kolom config_id pada tabel sentitems
        $hasil = $hasil && $this->tambah_config_id($tabel, 'ID');

        // Sesuaikan ulang index sentitems_date pada tabel sentitems
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'sentitems_date', '(`config_id`, `DeliveryDateTime`)', '');

        // Sesuaikan ulang index sentitems_tpmr pada tabel sentitems
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'sentitems_tpmr', '(`config_id`, `TPMR`)', '');

        // Sesuaikan ulang index sentitems_dest pada tabel sentitems
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'sentitems_dest', '(`config_id`, `DestinationNumber`)', '');

        // Sesuaikan ulang index sentitems_sender pada tabel sentitems
        $hasil = $hasil && $this->buat_ulang_index($tabel, 'sentitems_sender', '(`config_id`, `SenderID`)', '');

        // Tambah kolom config_id pada tabel inbox
        $hasil = $hasil && $this->tambah_config_id('inbox', 'ID');

        // Tambah kolom config_id pada tabel hubung_warga
        return $hasil && $this->tambah_config_id('hubung_warga');
    }

    protected function database($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('log_restore_desa');

        return $hasil && $this->tambah_config_id('log_backup');
    }

    // OpenKAB - Persil
    protected function persil($hasil)
    {
        // Tambah kolom config_id pada tabel persil
        $hasil = $hasil && $this->tambah_config_id('persil');

        // Tambah kolom config_id pada tabel mutasi_cdesa
        return $hasil && $this->tambah_config_id('mutasi_cdesa');
    }

    protected function tanah_desa($hasil)
    {
        return $hasil && $this->tambah_config_id('tanah_desa');
    }

    // OpenKAB - Log Sinkronisasi
    protected function sinkronisasi($hasil)
    {
        $tabel = 'log_sinkronisasi';

        // Tambah kolom config_id pada tabel log_sinkronisasi
        $hasil = $hasil && $this->tambah_config_id($tabel);

        // Sesuaikan ulang index modul pada tabel log_sinkronisasi
        return $hasil && $this->buat_ulang_index($tabel, 'modul', '(`config_id`, `modul`)');
    }

    // OpenKAB - Pesan
    protected function pesan($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('pesan');

        return $hasil && $this->tambah_config_id('pesan_detail');
    }

    protected function disposisi_surat_masuk($hasil)
    {
        return $hasil && $this->tambah_config_id('disposisi_surat_masuk', 'id_disposisi');
    }

    protected function cdesa($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('cdesa_penduduk');

        return $hasil && $this->tambah_config_id('cdesa');
    }

    protected function urls($hasil)
    {
        return $hasil && $this->tambah_config_id('urls');
    }

    protected function notifikasi($hasil)
    {
        $tabel = 'notifikasi';
        $this->db->query('ALTER TABLE notifikasi MODIFY COLUMN tgl_berikutnya timestamp DEFAULT current_timestamp() NOT NULL');
        $hasil = $hasil && $this->tambah_config_id('notifikasi');

        // Sesuaikan ulang index kode pada tabel notifikasi
        return $hasil && $this->buat_ulang_index($tabel, 'kode', '(`config_id`, `kode`)');
    }

    // OpenKAB - Analisis Indikator
    protected function analisis_indikator($hasil)
    {
        return $hasil && $this->tambah_config_id('analisis_indikator');
    }

    // OpenKAB - Analisis Master
    protected function analisis_master($hasil)
    {
        return $hasil && $this->tambah_config_id('analisis_master');
    }

    // OpenKAB - Analisis Periode
    protected function analisis_periode($hasil)
    {
        return $hasil && $this->tambah_config_id('analisis_periode');
    }

    // OpenKAB - Analisis Periode
    protected function analisis_parameter($hasil)
    {
        DB::statement('ALTER TABLE analisis_parameter MODIFY COLUMN kode_jawaban INT(3) DEFAULT NULL');
        return $hasil && $this->tambah_config_id('analisis_parameter');
    }

    protected function verifikasi_surat($hasil)
    {
        return $hasil && $this->tambah_config_id('statistics');
    }

    // OpenKAB - Analisis Kategori Indikator
    protected function analisis_kategori_indikator($hasil)
    {
        return $hasil && $this->tambah_config_id('analisis_kategori_indikator');
    }

    // OpenKAB - Analisis Klasisfikasi
    protected function analisis_klasifikasi($hasil)
    {
        return $hasil && $this->tambah_config_id('analisis_klasifikasi');
    }

    // OpenKAB - Analisis Respon
    protected function analisis_respon($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('analisis_respon_bukti', 'id_master');
        $hasil = $hasil && $this->tambah_config_id('analisis_respon_hasil', 'id_master');

        return $hasil && $this->tambah_config_id('analisis_respon', 'id_indikator');
    }

    protected function tte($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('log_tolak');

        return $hasil && $this->tambah_config_id('log_tte');
    }

    protected function dtks($hasil)
    {
        $hasil = $hasil && $this->tambah_config_id('dtks');
        $hasil = $hasil && $this->tambah_config_id('dtks_anggota');
        $hasil = $hasil && $this->tambah_config_id('dtks_pengaturan_program');

        $hasil = $hasil && $this->hapus_indeks('dtks_pengaturan_program', 'versi_kuisioner');
        $hasil = $hasil && $this->hapus_indeks('dtks_pengaturan_program', 'kode_config');
        // buat dulu constraint yang baru, kalau tidak akan error karena sudah ada foreign key
        $hasil = $hasil && $this->tambahIndeks('dtks_pengaturan_program', 'config_id,versi_kuisioner,kode', 'UNIQUE', true);
        $hasil = $hasil && $this->hapus_indeks('dtks_pengaturan_program', 'versi_kuisioner_config');

        return $hasil && $this->tambah_config_id('dtks_lampiran');
    }

    protected function password_reset($hasil)
    {
        $tabel = 'password_resets';
        $this->db->query('ALTER TABLE password_resets MODIFY COLUMN created_at timestamp DEFAULT current_timestamp() NOT NULL');

        return $hasil;
    }

    protected function cek_data_kelompok($hasil)
    {
        Kelompok::whereNotIn('id_master', static function ($q) {
            return $q->select('id')->from('kelompok_master');
        })->delete();

        KelompokAnggota::whereNotIn('id_kelompok', static function ($q) {
            return $q->select('id')->from('kelompok');
        })->delete();

        KelompokAnggota::whereNotIn('id_penduduk', static function ($q) {
            return $q->select('id')->from('tweb_penduduk');
        })->delete();

        return $hasil;
    }

    public function reset_modul($hasil)
    {
        DB::statement("truncate setting_modul");
        $configId = identitas('id');
        // gunakan default dari opensid 2312-umum
        $sql= "INSERT INTO setting_modul
            (id, config_id, modul, slug, url, aktif, ikon, urut, `level`, hidden, ikon_kecil, parent)
            VALUES
            (2, $configId, 'Kependudukan', 'kependudukan', '', 1, 'fa-users', 30, 2, 0, 'fa fa-users', 0)
            ,(3, $configId, 'Statistik', 'statistik', '', 1, 'fa-line-chart', 40, 2, 0, 'fa fa-line-chart', 0)
            ,(4, $configId, 'Layanan Surat', 'layanan-surat', '', 1, 'fa-book', 50, 2, 0, 'fa fa-book', 0)
            ,(5, $configId, 'Analisis', 'analisis', 'analisis_master', 1, 'fa-check-square', 90, 2, 0, 'fa fa-check-square-o', 0)
            ,(6, $configId, 'Bantuan', 'bantuan', 'program_bantuan/clear', 1, 'fa-heart', 100, 2, 0, 'fa fa-heart', 0)
            ,(7, $configId, 'Pertanahan', 'pertanahan', '', 1, 'fa-map-signs', 110, 2, 0, 'fa fa-map-signs', 0)
            ,(8, $configId, 'Pengaturan Peta', 'pengaturan-peta', 'plan', 1, 'fa-location-arrow', 9, 2, 0, 'fa fa-location-arrow', 9)
            ,(9, $configId, 'Pemetaan', 'pemetaan', '', 1, 'fa-globe', 130, 2, 0, 'fa fa-globe', 0)
            ,(10, $configId, 'Hubung Warga', 'hubung-warga', '', 1, 'fa-envelope', 140, 2, 0, 'fa fa-envelope', 0)
            ,(11, $configId, 'Pengaturan', 'pengaturan', '', 1, 'fa-users', 150, 1, 1, 'fa-users', 0)
            ,(13, $configId, 'Admin Web', 'admin-web', '', 1, 'fa-desktop', 160, 4, 0, 'fa fa-desktop', 0)
            ,(14, $configId, 'Layanan Mandiri', 'layanan-mandiri', '', 1, 'fa-inbox', 170, 2, 0, 'fa fa-inbox', 0)
            ,(15, $configId, 'Sekretariat', 'sekretariat', '', 1, 'fa-archive', 60, 2, 0, 'fa fa-archive', 0)
            ,(17, $configId, 'Identitas [Desa]', 'identitas-desa', 'identitas_desa', 1, 'fa-id-card', 2, 2, 0, '', 200)
            ,(18, $configId, '[Pemerintah Desa]', 'pemerintah-desa', 'pengurus', 1, 'fa-sitemap', 3, 2, 0, '', 200)
            ,(20, $configId, 'Wilayah Administratif', 'wilayah-administratif', 'wilayah', 1, 'fa-map', 2, 2, 0, '', 200)
            ,(21, $configId, 'Penduduk', 'penduduk', 'penduduk', 1, 'fa-user', 2, 2, 0, '', 2)
            ,(22, $configId, 'Keluarga', 'keluarga', 'keluarga', 1, 'fa-users', 3, 2, 0, '', 2)
            ,(23, $configId, 'Rumah Tangga', 'rumah-tangga', 'rtm', 1, 'fa-venus-mars', 4, 2, 0, '', 2)
            ,(24, $configId, 'Kelompok', 'kelompok', 'kelompok/clear', 1, 'fa-sitemap', 5, 2, 0, '', 2)
            ,(25, $configId, 'Data Suplemen', 'data-suplemen', 'suplemen', 1, 'fa-slideshare', 6, 2, 0, '', 2)
            ,(26, $configId, 'Calon Pemilih', 'calon-pemilih', 'dpt', 1, 'fa-podcast', 7, 2, 0, '', 2)
            ,(27, $configId, 'Statistik Kependudukan', 'statistik-kependudukan', 'statistik', 1, 'fa-bar-chart', 1, 2, 0, '', 3)
            ,(28, $configId, 'Laporan Bulanan', 'laporan-bulanan', 'laporan/clear', 1, 'fa-file-text', 2, 2, 0, '', 3)
            ,(29, $configId, 'Laporan Kelompok Rentan', 'laporan-kelompok-rentan', 'laporan_rentan/clear', 1, 'fa-wheelchair', 3, 2, 0, '', 3)
            ,(30, $configId, 'Pengaturan Surat', 'pengaturan-surat', 'surat_master', 1, 'fa-cog', 1, 2, 0, '', 4)
            ,(31, $configId, 'Cetak Surat', 'cetak-surat', 'surat', 1, 'fa-files-o', 2, 2, 0, '', 4)
            ,(32, $configId, 'Arsip Layanan', 'arsip-layanan', 'keluar', 1, 'fa-folder-open', 4, 2, 0, '', 4)
            ,(39, $configId, 'Kirim Pesan', 'kirim-pesan', 'sms', 1, 'fa-envelope-open-o', 1, 2, 0, '', 10)
            ,(40, $configId, 'Daftar Kontak', 'daftar-kontak', 'daftar_kontak', 1, 'fa-id-card-o', 2, 2, 0, '', 10)
            ,(42, $configId, 'Modul', 'modul', 'modul', 1, 'fa-tags', 1, 1, 0, '', 11)
            ,(43, $configId, 'Aplikasi', 'aplikasi', 'setting', 1, 'fa-codepen', 2, 1, 0, '', 11)
            ,(44, $configId, 'Pengguna', 'pengguna', 'man_user', 1, 'fa-users', 3, 1, 0, '', 11)
            ,(45, $configId, 'Database', 'database', 'database', 1, 'fa-database', 4, 1, 0, '', 11)
            ,(46, $configId, 'Info Sistem', 'info-sistem', 'info_sistem', 1, 'fa-server', 5, 1, 0, '', 11)
            ,(47, $configId, 'Artikel', 'artikel', 'web', 1, 'fa-file-movie-o', 1, 4, 0, '', 13)
            ,(48, $configId, 'Widget', 'widget', 'web_widget', 1, 'fa-windows', 2, 4, 0, '', 13)
            ,(49, $configId, 'Menu', 'menu', 'menu', 1, 'fa-bars', 3, 4, 0, '', 13)
            ,(50, $configId, 'Komentar', 'komentar', 'komentar', 1, 'fa-comments', 4, 4, 0, '', 13)
            ,(51, $configId, 'Galeri', 'galeri', 'gallery', 1, 'fa-image', 5, 5, 0, '', 13)
            ,(52, $configId, 'Informasi Publik', 'informasi-publik', 'dokumen', 1, 'fa-file-text', 4, 4, 0, '', 15)
            ,(53, $configId, 'Media Sosial', 'media-sosial', 'sosmed', 1, 'fa-facebook', 7, 4, 0, '', 13)
            ,(54, $configId, 'Slider', 'slider', 'web/slider', 1, 'fa-film', 8, 4, 0, '', 13)
            ,(55, $configId, 'Kotak Pesan', 'kotak-pesan', 'mailbox', 1, 'fa-wechat', 1, 2, 0, '', 14)
            ,(56, $configId, 'Pendaftar Layanan Mandiri', 'pendaftar-layanan-mandiri', 'mandiri', 1, 'fa-500px', 2, 2, 0, '', 14)
            ,(57, $configId, 'Surat Masuk', 'surat-masuk', 'surat_masuk', 1, 'fa-sign-in', 1, 2, 2, '', 15)
            ,(58, $configId, 'Surat Keluar', 'surat-keluar', 'surat_keluar', 1, 'fa-sign-out', 2, 2, 2, '', 15)
            ,(61, $configId, 'Inventaris', 'inventaris', 'inventaris_tanah', 1, 'fa-cubes', 5, 2, 0, '', 15)
            ,(62, $configId, 'Peta', 'peta', 'gis/clear', 1, 'fa-globe', 1, 2, 0, 'fa fa-globe', 9)
            ,(63, $configId, 'Klasifikasi Surat', 'klasifikasi-surat', 'klasifikasi', 1, 'fa-code', 10, 2, 0, 'fa-code', 15)
            ,(64, $configId, 'Teks Berjalan', 'teks-berjalan', 'teks_berjalan', 1, 'fa-ellipsis-h', 9, 2, 0, 'fa-ellipsis-h', 13)
            ,(65, $configId, 'Kategori', 'kategori', 'kategori', 1, 'fa-list-alt', 2, 4, 0, '', 13)
            ,(66, $configId, 'Peristiwa', 'peristiwa', 'penduduk_log', 1, 'fa-archive', 8, 2, 0, '', 2)
            ,(67, $configId, 'Kategori / Variabel', 'analisis-kategori', 'analisis_kategori', 1, '', 0, 0, 2, '', 5)
            ,(68, $configId, 'Indikator & Pertanyaan', 'analisis-indikator', 'analisis_indikator', 1, '', 0, 0, 2, '', 5)
            ,(69, $configId, 'Klasifikasi Analisis', 'analisis-klasifikasi', 'analisis_klasifikasi', 1, '', 0, 0, 2, '', 5)
            ,(70, $configId, 'Periode Sensus / Survei', 'analisis-periode', 'analisis_periode', 1, '', 0, 0, 2, '', 5)
            ,(71, $configId, 'Input Data Sensus / Survei', 'analisis-respon', 'analisis_respon', 1, '', 0, 0, 2, '', 5)
            ,(72, $configId, 'Laporan Hasil Klasifikasi', 'analisis-laporan', 'analisis_laporan', 1, '', 0, 0, 2, '', 5)
            ,(73, $configId, 'Laporan Per Indikator', 'analisis-statistik-jawaban', 'analisis_statistik_jawaban', 1, '', 0, 0, 2, '', 5)
            ,(75, $configId, 'api_inventaris_asset', 'api-inventaris-asset', 'api_inventaris_asset', 1, '', 16, 0, 2, '', 15)
            ,(76, $configId, 'api_inventaris_gedung', 'api-inventaris-gedung', 'api_inventaris_gedung', 1, '', 17, 0, 2, '', 15)
            ,(77, $configId, 'api_inventaris_gedung', 'api-inventaris-gedung-1', 'api_inventaris_gedung', 1, '', 18, 0, 2, '', 15)
            ,(78, $configId, 'api_inventaris_jalan', 'api-inventaris-jalan', 'api_inventaris_jalan', 1, '', 19, 0, 2, '', 15)
            ,(79, $configId, 'api_inventaris_konstruksi', 'api-inventaris-kontruksi', 'api_inventaris_kontruksi', 1, '', 20, 0, 2, '', 15)
            ,(80, $configId, 'api_inventaris_peralatan', 'api-inventaris-peralatan', 'api_inventaris_peralatan', 1, '', 21, 0, 2, '', 15)
            ,(81, $configId, 'api_inventaris_tanah', 'api-inventaris-tanah', 'api_inventaris_tanah', 1, '', 22, 0, 2, '', 15)
            ,(82, $configId, 'inventaris_asset', 'inventaris-asset', 'inventaris_asset', 1, '', 11, 0, 2, '', 15)
            ,(83, $configId, 'inventaris_gedung', 'inventaris-gedung', 'inventaris_gedung', 1, '', 12, 0, 2, '', 15)
            ,(84, $configId, 'inventaris_jalan', 'inventaris-jalan', 'inventaris_jalan', 1, '', 13, 0, 2, '', 15)
            ,(85, $configId, 'inventaris_kontruksi', 'inventaris-kontruksi', 'inventaris_kontruksi', 1, '', 14, 0, 2, '', 15)
            ,(86, $configId, 'inventaris_peralatan', 'inventaris-peralatan', 'inventaris_peralatan', 1, '', 15, 0, 2, '', 15)
            ,(87, $configId, 'laporan_inventaris', 'laporan-inventaris', 'laporan_inventaris', 1, '', 23, 0, 2, '', 15)
            ,(88, $configId, 'plan', 'plan', 'plan', 1, '', 11, 0, 2, '', 9)
            ,(89, $configId, 'point', 'point', 'point', 1, '', 12, 0, 2, '', 9)
            ,(90, $configId, 'garis', 'garis', 'garis', 1, '', 13, 0, 2, '', 9)
            ,(91, $configId, 'line', 'line', 'line', 1, '', 14, 0, 2, '', 9)
            ,(92, $configId, 'area', 'area', 'area', 1, '', 15, 0, 2, '', 9)
            ,(93, $configId, 'polygon', 'polygon', 'polygon', 1, '', 16, 0, 2, '', 9)
            ,(94, $configId, 'Kategori Kelompok', 'kategori-kelompok', 'kelompok_master', 1, '', 7, 0, 2, '', 2)
            ,(95, $configId, 'Produk Hukum', 'produk-hukum', 'dokumen_sekretariat/peraturan_desa', 1, 'fa-book', 3, 2, 2, '', 15)
            ,(96, $configId, 'Informasi Publik', 'informasi-publik-1', 'informasi_publik', 1, '', 0, 0, 2, '', 52)
            ,(97, $configId, 'Daftar Persyaratan', 'daftar-persyaratan', 'surat_mohon', 1, 'fa fa-book', 5, 2, 0, '', 4)
            ,(98, $configId, 'Permohonan Surat', 'permohonan-surat', 'permohonan_surat_admin', 1, 'fa-files-o', 3, 0, 0, '', 4)
            ,(101, $configId, 'Status [Desa]', 'status-desa', 'status_desa', 1, 'fa-dot-circle-o', 4, 0, 0, '', 200)
            ,(102, $configId, 'Pengaturan Grup', 'pengaturan-grup', 'grup', 1, '', 7, 0, 2, '', 11)
            ,(200, $configId, 'Info [Desa]', 'info-desa', '', 1, 'fa-dashboard', 20, 2, 1, 'fa fa-home', 0)
            ,(201, $configId, 'Keuangan', 'keuangan', '', 1, 'fa-balance-scale', 80, 2, 0, 'fa-balance-scale', 0)
            ,(203, $configId, 'Laporan', 'laporan', 'keuangan/laporan', 1, 'fa-bar-chart', 2, 2, 0, 'fa-bar-chart', 201)
            ,(205, $configId, 'Pengunjung', 'pengunjung', 'pengunjung', 1, 'fa-bar-chart', 10, 4, 0, '', 13)
            ,(206, $configId, 'Kesehatan', 'kesehatan', '', 1, 'fa-heartbeat', 41, 2, 0, 'fa fa-heartbeat', 0)
            ,(207, $configId, 'Pendataan', 'pendataan', 'covid19', 1, 'fa-list', 1, 2, 0, 'fa fa-list', 206)
            ,(208, $configId, 'Pemantauan', 'pemantauan', 'covid19/pantau', 1, 'fa-check', 2, 2, 0, 'fa fa-check', 206)
            ,(209, $configId, 'Input Data', 'input-data', 'keuangan_manual', 1, 'fa-keyboard-o', 3, 2, 0, 'fa-keyboard-o', 201)
            ,(211, $configId, 'Pengaturan', 'pengaturan-web', 'setting_web', 1, 'fa-gear', 11, 4, 0, 'fa-gear', 13)
            ,(212, $configId, 'QR Code', 'qr-code', 'qr_code', 1, 'fa-qrcode', 6, 1, 0, 'fa-qrcode', 11)
            ,(213, $configId, 'Daftar Persil', 'daftar-persil', 'data_persil', 1, 'fa-list', 0, 2, 0, '', 7)
            ,(214, $configId, 'C-Desa', 'c-desa', 'cdesa', 1, 'fa-files-o', 0, 0, 0, '', 7)
            ,(220, $configId, 'Pembangunan', 'pembangunan', 'admin_pembangunan', 1, 'fa-institution', 120, 2, 0, 'fa-institution', 0)
            ,(301, $configId, 'Buku Administrasi [Desa]', 'buku-administrasi-desa', '', 1, 'fa-paste', 70, 2, 0, 'fa fa-paste', 0)
            ,(302, $configId, 'Administrasi Umum', 'administrasi-umum', 'bumindes_umum', 1, 'fa-bookmark', 1, 2, 0, 'fa fa-bookmark', 301)
            ,(303, $configId, 'Administrasi Penduduk', 'administrasi-penduduk', 'bumindes_penduduk_induk', 1, 'fa-users', 2, 2, 0, 'fa fa-users', 301)
            ,(305, $configId, 'Administrasi Pembangunan', 'administrasi-pembangunan', 'bumindes_rencana_pembangunan', 1, 'fa-university', 4, 2, 0, 'fa fa-university', 301)
            ,(310, $configId, 'Buku Eskpedisi', 'buku-eskpedisi', 'ekspedisi', 1, 'fa-files-o', 10, 0, 2, '', 301)
            ,(311, $configId, 'Buku Lembaran Dan Berita [Desa]', 'buku-lembaran-dan-berita-desa', 'lembaran_desa', 1, 'fa-files-o', 11, 0, 2, '', 301)
            ,(312, $configId, 'Anjungan', 'anjungan', '', 1, 'fa-desktop', 180, 2, 0, '', 0)
            ,(313, $configId, 'Layanan Pelanggan', 'layanan-pelanggan', 'pelanggan', 1, 'fa-credit-card', 5, 0, 0, 'fa-credit-card', 200)
            ,(314, $configId, 'Pengaturan', 'pengaturan-layanan-mandiri', 'setting_mandiri', 1, 'fa-gear', 6, 2, 0, 'fa-gear', 14)
            ,(315, $configId, 'Buku Mutasi Penduduk', 'buku-mutasi-penduduk', 'bumindes_penduduk_mutasi', 1, 'fa-files-o', 15, 0, 2, '', 301)
            ,(316, $configId, 'Buku Rekapitulasi Jumlah Penduduk', 'buku-rekapitulasi-jumlah-penduduk', 'bumindes_penduduk_rekapitulasi', 1, 'fa-files-o', 16, 0, 2, '', 301)
            ,(317, $configId, 'Buku Penduduk Sementara', 'buku-penduduk-sementara', 'bumindes_penduduk_sementara', 1, 'fa-files-o', 17, 0, 2, '', 301)
            ,(318, $configId, 'Buku KTP dan KK', 'buku-ktp-dan-kk', 'bumindes_penduduk_ktpkk', 1, 'fa-files-o', 18, 0, 2, '', 301)
            ,(319, $configId, 'Buku Tanah Kas [Desa]', 'buku-tanah-kas-desa', 'bumindes_tanah_kas_desa', 1, 'fa-files-o', 12, 0, 2, '', 301)
            ,(320, $configId, 'Buku Tanah di [Desa]', 'buku-tanah-di-desa', 'bumindes_tanah_desa', 1, 'fa-files-o', 13, 0, 2, '', 301)
            ,(321, $configId, 'Pendapat', 'pendapat', 'pendapat', 1, 'fa-thumbs-o-up', 5, 0, 0, 'fa-thumbs-o-up', 14)
            ,(322, $configId, 'Buku Inventaris dan Kekayaan [Desa]', 'buku-inventaris-dan-kekayaan-desa', 'bumindes_inventaris_kekayaan', 1, 'fa-files-o', 14, 0, 2, '', 301)
            ,(323, $configId, 'Buku Rencana Kerja Pembangunan', 'buku-rencana-kerja-pembangunan', 'bumindes_rencana_pembangunan', 1, 'fa-files-o', 19, 0, 2, '', 301)
            ,(324, $configId, 'Lapak', 'lapak', 'lapak_admin', 1, 'fa-cart-plus', 122, 2, 0, 'fa-cart-plus', 0)
            ,(325, $configId, 'Laporan APBDes', 'laporan-apbdes', 'laporan_apbdes', 1, 'fa-file-text-o', 5, 2, 0, 'fa-file-text-o', 201)
            ,(326, $configId, 'Sinkronisasi', 'sinkronisasi', 'sinkronisasi', 1, ' fa-random', 125, 2, 0, 'fa-random', 343)
            ,(327, $configId, 'Lembaga [Desa]', 'lembaga-desa', 'lembaga/clear', 1, 'fa-list', 4, 2, 0, 'fa-list', 200)
            ,(328, $configId, 'Kategori Lembaga', 'kategori-lembaga', 'lembaga_master', 1, '', 6, 2, 2, '', 200)
            ,(329, $configId, 'Bumindes Kegiatan Pembangunan', 'bumindes-kegiatan-pembangunan', 'bumindes_kegiatan_pembangunan', 1, '', NULL, 2, 2, '', 301)
            ,(330, $configId, 'Laporan penduduk', 'laporan-penduduk', 'laporan_penduduk', 1, 'fa-file-text-o', 5, 2, $configId, 'fa-file-text-o', 3)
            ,(331, $configId, 'Pendaftaran Kerjasama', 'pendaftaran-kerjasama', 'pendaftaran_kerjasama', 1, 'fa-list', 6, 2, 0, 'fa-list', 200)
            ,(332, $configId, 'Kader Pemberdayaan Masyarakat', 'bumindes-kader', 'bumindes_kader', 1, '', NULL, 2, 2, '', 301)
            ,(333, $configId, 'Buku Inventaris Hasil - Hasil Pembangunan', 'bumindes-hasil-pembangunan', 'bumindes_hasil_pembangunan', 1, '', NULL, 2, 2, '', 301)
            ,(334, $configId, 'Pengaduan', 'pengaduan', 'pengaduan_admin', 1, 'fa-info', 124, 2, 0, 'fa-info', 0)
            ,(335, $configId, 'Vaksin', 'vaksin', 'vaksin_covid/clear', 1, 'fa fa-medkit', 2, 2, 0, '', 206)
            ,(336, $configId, 'Arsip [Desa]', 'arsip-desa', 'bumindes_arsip', 1, 'fa-archive', 5, 2, 0, 'fa fa-archive', 301)
            ,(337, $configId, 'Kehadiran', 'kehadiran', '', 1, 'fa-calendar-check-o', 41, 0, 0, 'fa-calendar-check-o', 0)
            ,(339, $configId, 'Jam Kerja', 'jam-kerja', 'kehadiran_jam_kerja', 1, 'fa-clock-o', 2, 0, 0, 'fa-credit-card', 337)
            ,(340, $configId, 'Hari Libur', 'hari-libur', 'kehadiran_hari_libur', 1, 'fa-calendar', 2, 0, 0, 'fa-credit-card', 337)
            ,(341, $configId, 'Rekapitulasi', 'rekapitulasi', 'kehadiran_rekapitulasi', 1, 'fa-list', 2, 0, 0, 'fa-list', 337)
            ,(342, $configId, 'Pengaduan', 'kehadiran-pengaduan', 'kehadiran_pengaduan', 1, 'fa-exclamation', 2, 0, 0, 'fa-exclamation', 337)
            ,(343, $configId, 'OpenDK', 'opendk', '', 1, 'fa-university', 124, 2, 0, 'fa-university', 0)
            ,(344, $configId, 'Pesan', 'pesan', 'opendk_pesan/clear', 1, 'fa-envelope', 124, 2, 0, 'fa-envelope', 343)
            ,(345, $configId, 'Grup Kontak', 'grup-kontak', 'grup_kontak', 1, 'fa fa-list', 2, 2, 2, 'fa fa-list', 10)
            ,(346, $configId, 'Stunting', 'stunting', 'stunting', 1, 'fa-stethoscope', 4, 0, 0, 'fa-stethoscope', 206)
            ,(347, $configId, 'Daftar Anjungan', 'daftar-anjungan', 'anjungan', 1, 'fa-list', 1, 2, 0, 'fa-list', 312)
            ,(348, $configId, 'Menu', 'anjungan-menu', 'anjungan_menu', 1, 'fa-bars', 2, 2, 0, 'fa-bars', 312)
            ,(349, $configId, 'Pengaturan', 'pengaturan-anjungan', 'anjungan_pengaturan', 1, 'fa-gear', 3, 2, 0, 'fa-gear', 312)
            ,(350, $configId, 'Alasan Keluar', 'alasan-keluar', 'kehadiran_keluar', 1, 'fa-sign-out', 5, 2, 0, 'fa-sign-out', 337)
            ,(351, $configId, 'Gawai Layanan', 'gawai-layanan', 'gawai_layanan', 1, 'fa-desktop', 3, 2, 0, 'fa-desktop', 14)
            ,(352, $configId, 'Satu Data', 'satu-data', '', 1, 'fa-globe', 180, 1, 0, 'fa-globe', 0)
            ,(353, $configId, 'DTKS', 'dtks', 'dtks', 1, 'fa-exchange', 1, 2, 0, 'fa-exchange', 352)
            ,(354, $configId, 'Buku Tamu', 'buku-tamu', '', 1, 'fa-book', 180, 2, 0, 'fa-book', 0)
            ,(355, $configId, 'Data Tamu', 'data-tamu', 'buku_tamu', 1, 'fa-bookmark-o', 1, 2, 0, 'fa-bookmark-o', 354)
            ,(356, $configId, 'Data Kepuasan', 'data-kepuasan', 'buku_kepuasan', 1, 'fa-smile-o', 2, 2, 0, 'fa-smile-o', 354)
            ,(357, $configId, 'Data Pertanyaan', 'data-pertanyaan', 'buku_pertanyaan', 1, 'fa-question', 3, 2, 0, 'fa-question', 354)
            ,(358, $configId, 'Data Keperluan', 'data-keperluan', 'buku_keperluan', 1, 'fa-send', 4, 2, 0, 'fa-send', 354)
            ,(359, $configId, 'Optimasi Gambar', 'optimasi-gambar', 'optimasi_gambar', 1, 'fa-picture-o', 7, 2, 0, 'fa-picture-o', 11)";
        DB::statement($sql);
        log_message('error', 'Migrasi reset modul berhasil');
        return $hasil;
    }
}
