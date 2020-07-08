<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/apakabar/{$nama}', function($nama) {
    
    return 'Hallo.. apakabar'.$nama;

});*/

// Route::get('halaman_view', function(){
// 	$data = array(
// 		'var1' => 'Sepatu',
// 		'var2' => 'Sandal',
// 		'var3' => 'Kaos kaki',
// 		'transaksi' => App\Transaksi::all()
// 	);
// 	return view('halaman_view',$data);

// });


// Route::get('pelanggan/{id}', 'PelangganController@Pelanggan');

// Route::get('nama_pelanggan', function () {
// 	$pelanggan = App\Pelanggan::where('nama','=','Adam')->first();
// 	echo '<pre>';
// 	echo $pelanggan->id;
// });

// Route::get('transaksi',function () {

// 	$transaksix = App\Transaksi::all();
// 	foreach ($transaksix as $barang) {
// 		//$pelanggan = App\Pelanggan::find($barang->id_pelanggan);
// 		echo $barang->nama." Order by ".$barang->transaksi->nama."<br/>";
// 	}
// });

// Route::get('apakabar', function() {
    
//     return 'Hallo.. apakabar';

// });

// Route::get('apakabar/{nama}', function($nama) {
    
//     return 'Hallo.. apakabar '.$nama;

// });

// Route::post('test', function(){
// 	echo 'POST';
// });

// Route::get('test', function(){
// 	echo '<form method="POST" action="test">';
// 	echo '<input type="submit" value="KIRIM">';
// 	echo '<input type="hidden" value="DELETE" name="_method">';
// 	echo '</form>';
// });

Route::put('test', function(){
	echo 'PUT';
});

Route::delete('test', function(){
	echo 'DELETE';
});

Route::group(['middleware' => ['web']], function()    
{
	//Route::auth();
	// Authentication Routes...
	$this->get('login', 'Auth\AuthController@showLoginForm');
	$this->post('login', 'Auth\AuthController@login');

	Route::get('/', array('as'=>'admin', 'uses'=> 'AdminController@index'));
	$this->get('logout', 'Auth\AuthController@logout');

	 //ini route instant isinya banyak route untuk kebutuhan auth
	

});

//Route as admin
Route::group(['middleware' => ['web','auth','level:1']], function()    
{

	// Registration Routes...
	$this->get('register', 'Auth\AuthController@showRegistrationForm');
	$this->post('register', 'Auth\AuthController@register');

	// Password Reset Routes...
	$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	$this->post('password/reset', 'Auth\PasswordController@reset');	
	

    /*Route::get('/cobamiddleware',  function () {
    	return 'Hallo.. saya punya akses untuk route ini';
	});*/
	//Route::get('/', array('as'=>'admin', 'uses'=> 'AdminController@index'));
	//jurusan
	// Route::get('/jurusan',array(
	// 	'as'=>'jurusan', 
	// 	'uses'=> 'Jurusan\JurusanController@index'
	// ));
	// Route::get('/jurusan/tambah', array(
	// 	'as'=>'jurusan.tambah', 
	// 	'uses'=> 'Jurusan\JurusanController@tambah'
	// ));
	// Route::post('/jurusan/tambahjurusan', array(
	// 	'as'=>'jurusan.tambah.simpan', 
	// 	'uses'=> 'Jurusan\JurusanController@tambahjurusan'
	// ));	
    // Route::get('/jurusan/{id}/hapus', array(
    // 	'as'=>'jurusan.hapus', 
    // 	'uses'=> 'Jurusan\JurusanController@hapus'
    // ));
    // //prodi
	// Route::get('/prodi',array('as'=>'prodi', 'uses'=> 'Prodi\ProdiController@index'));
	// Route::get('/prodi/{id}/hapus', array('as'=>'prodi.hapus', 'uses'=> 'Prodi\ProdiController@hapus'));
	// Route::post('/prodi/tambah', array('as'=>'prodi.tambah', 'uses'=> 'Prodi\ProdiController@tambahprodi'));
	// Route::get('/prodi/{id}/edit', array('as'=>'prodi.edit', 'uses'=> 'Prodi\ProdiController@editprodi'));
	// Route::put('/prodi/{id}/simpanedit', array('as'=>'prodi.simpanedit', 'uses'=> 'Prodi\ProdiController@simpanedit'));

	// //Kurikulum
	// Route::get('/kurikulum', array('as'=>'kurikulum', 'uses'=>'Kurikulum\KurikulumController@index'));
	// Route::get('/kurikulum/matakuliah', array('as'=>'matakuliah', 'uses'=>'Kurikulum\KurikulumController@matakuliah'));
	// Route::get('kurikulum/{kurId}/detail', array('as'=>'kurikulum.detail', 'uses'=> 'Kurikulum\KurikulumController@detail'));

	//dosen
	Route::get('/dosen', array('as'=>'dosen', 'uses'=>'Dosen\DosenController@index'));
	Route::get('/dosen/{dsnNidn}/detail', array('as'=>'dosen.detail', 'uses'=>'Dosen\DosenController@detail'));
	//register Dosen
	Route::get('/accountdosen', array('as'=>'account.dosen', 'uses'=>'Account\AccountController@showAccountDosen'));
	Route::post('/accountdosen/tambah', array('as'=>'account.dosen.tambah', 'uses'=>'Account\AccountController@tambahAccountDosen'));
	Route::get('/accountdosen/{id}/hapus', array('as'=>'account.dosen.hapus', 'uses'=> 'Account\AccountController@hapusDosen'));
	/*Route::post('/accountmahasiswa/tambah', array('as'=>'account.mahasiswa.tambah', 'uses'=>'Account\AccountController@tambahAccountMahasiswa'));
	Route::get('/accountmahasiswa/{id}/hapus', array('as'=>'account.mahasiswa.hapus', 'uses'=> 'Account\AccountController@hapus'));*/

	//kepsek
	Route::get('/kepsek', array('as'=>'kepsek', 'uses'=>'Kepsek\KepsekController@index'));
	Route::get('/kepsek/{kepsekNip}/detail', array('as'=>'kepsek.detail', 'uses'=>'Kepsek\KepsekController@detail'));
	//tambahkepsek
	Route::get('/kepsek/tambah', array('as'=>'kepsek.tambah', 'uses'=>'Kepsek\KepsekController@tambah'));
	Route::post('/kepsek/tambahkepsek', array('as'=>'kepsek.tambah.simpan', 'uses'=> 'Kepsek\KepsekController@tambahkepsek'));
	Route::get('/kepsek/{id}/hapus', array('as'=>'kepsek.hapus', 'uses'=> 'Kepsek\KepsekController@hapus'));	
	//register Kepsek
	Route::get('/accountkepsek', array('as'=>'account.kepsek', 'uses'=>'Account\AccountController@showAccountKepsek'));
	Route::post('/accountkepsek/tambah', array('as'=>'account.kepsek.tambah', 'uses'=>'Account\AccountController@tambahAccountKepsek'));
	Route::get('/accountkepsek/{id}/hapus', array('as'=>'account.kepsek.hapus', 'uses'=> 'Account\AccountController@hapusKepsek'));

	//guru
	Route::get('/guru', array('as'=>'guru', 'uses'=>'Guru\GuruController@index'));
	Route::get('/guru/{guruNip}/detail', array('as'=>'guru.detail', 'uses'=>'Guru\GuruController@detail'));
	//tambah Guru
	Route::get('/guru/tambah', array('as'=>'guru.tambah', 'uses'=>'Guru\GuruController@tambah'));
	Route::post('/guru/tambahguru', array('as'=>'guru.tambah.simpan', 'uses'=> 'Guru\GuruController@tambahguru'));
	Route::get('/guru/{id}/hapus', array('as'=>'guru.hapus', 'uses'=> 'Guru\GuruController@hapus'));	
	//register Guru
	Route::get('/accountguru', array('as'=>'account.guru', 'uses'=>'Account\AccountController@showAccountGuru'));
	Route::post('/accountguru/tambah', array('as'=>'account.guru.tambah', 'uses'=>'Account\AccountController@tambahAccountGuru'));
	Route::get('/accountguru/{id}/hapus', array('as'=>'account.guru.hapus', 'uses'=> 'Account\AccountController@hapusGuru'));

	//pustakawan
	Route::get('/pustakawan', array('as'=>'pustakawan', 'uses'=>'Pustakawan\PustakawanController@index'));
	Route::get('/pustakawan/{pusNip}/detail', array('as'=>'pustakawan.detail', 'uses'=>'Pustakawan\PustakawanController@detail'));
	//tambah Pustakawan
	Route::get('/pustakawan/tambah', array('as'=>'pustakawan.tambah', 'uses'=>'Pustakawan\PustakawanController@tambah'));
	Route::post('/pustakawan/tambahpustakawan', array('as'=>'pustakawan.tambah.simpan', 'uses'=> 'Pustakawan\PustakawanController@tambahpustakawan'));
	Route::get('/pustakawan/{id}/hapus', array('as'=>'pustakawan.hapus', 'uses'=> 'Pustakawan\PustakawanController@hapus'));	
	//register Pustakawan
	Route::get('/accountpustakawan', array('as'=>'account.pustakawan', 'uses'=>'Account\AccountController@showAccountPustakawan'));
	Route::post('/accountpustakawan/tambah', array('as'=>'account.pustakawan.tambah', 'uses'=>'Account\AccountController@tambahAccountPustakawan'));
	Route::get('/accountpustakawan/{id}/hapus', array('as'=>'account.pustakawan.hapus', 'uses'=> 'Account\AccountController@hapusPustakawan'));

	// //Mahasiswa
	// Route::get('/mahasiswa', array('as'=>'mahasiswa', 'uses'=>'Mahasiswa\MahasiswaController@index'));
	// Route::get('/mahasiswa/{mhsNim}/detail', array('as'=>'mahasiswa.detail', 'uses'=>'Mahasiswa\MahasiswaController@detail'));
	// //register Mahasiswa
	// Route::get('/accountmahasiswa', array('as'=>'account.mahasiswa', 'uses'=>'Account\AccountController@showAccountMahasiswa'));
	// Route::post('/accountmahasiswa/tambah', array('as'=>'account.mahasiswa.tambah', 'uses'=>'Account\AccountController@tambahAccountMahasiswa'));
	// Route::get('/accountmahasiswa/{id}/hapus', array('as'=>'account.mahasiswa.hapus', 'uses'=> 'Account\AccountController@hapusMahasiswa'));

	//siswa
	Route::get('/siswa', array('as'=>'siswa', 'uses'=>'Siswa\SiswaController@index'));
	Route::get('/siswa/{sisNisn}/detail', array('as'=>'siswa.detail', 'uses'=>'Siswa\SiswaController@detail'));
	//tambah Siswa
	Route::get('/siswa/tambah', array('as'=>'siswa.tambah', 'uses'=>'Siswa\SiswaController@tambah'));
	Route::post('/siswa/tambahsiswa', array('as'=>'siswa.tambah.simpan', 'uses'=> 'Siswa\SiswaController@tambahsiswa'));
	Route::get('/siswa/{id}/hapus', array('as'=>'siswa.hapus', 'uses'=> 'Siswa\SiswaController@hapus'));	
	//register Siswa
	Route::get('/accountsiswa', array('as'=>'account.siswa', 'uses'=>'Account\AccountController@showAccountSiswa'));
	Route::post('/accountsiswa/tambah', array('as'=>'account.siswa.tambah', 'uses'=>'Account\AccountController@tambahAccountSiswa'));
	Route::get('/accountsiswa/{id}/hapus', array('as'=>'account.siswa.hapus', 'uses'=> 'Account\AccountController@hapusSiswa'));

	//siswa
	Route::get('/siswa', array('as'=>'siswa', 'uses'=>'Siswa\SiswaController@index'));
	Route::get('/siswa/{sisNisn}/detail', array('as'=>'siswa.detail', 'uses'=>'Siswa\SiswaController@detail'));
	//register Siswa
	Route::get('/accountsiswa', array('as'=>'account.siswa', 'uses'=>'Account\AccountController@showAccountSiswa'));
	Route::post('/accountsiswa/tambah', array('as'=>'account.siswa.tambah', 'uses'=>'Account\AccountController@tambahAccountSiswa'));
	Route::get('/accountsiswa/{id}/hapus', array('as'=>'account.siswa.hapus', 'uses'=> 'Account\AccountController@hapusSiswa'));

	//Mata Pelajaran
	Route::get('/mapel', array('as'=>'mapel', 'uses'=>'Mapel\MapelController@index'));
	//Route::get('/kurikulum/mapel', array('as'=>'mapel', 'uses'=>'Mapel\MapelController@mapel'));
	Route::get('mapel/{id}/detail', array('as'=>'mapel.detail', 'uses'=> 'Mapel\MapelController@detail'));

	//Kelas
	Route::get('/kelas', array('as'=>'kelas', 'uses'=>'Kelas\KelasController@index'));
	Route::get('/kelas/{id}/siswa', array('as'=>'kelas.siswa', 'uses'=>'Kelas\KelasController@listSiswa'));
	Route::get('/kelas/{id}/detail', array('as'=>'kelas.detail', 'uses'=>'Kelas\KelasController@detail'));
	//Route::get('/kelas/register', array('as'=>'kelas.register', 'uses'=>'Kelas\KelasController@showKelasRegister'));
	//Route::post('/kelas/register/proses', array('as'=>'kelas.register.proses', 'uses'=>'Kelas\KelasController@kelasRegister'));
	//Route::get('/kelas/mhsregister', array('as'=>'kelas.mhsregister', 'uses'=>'Kelas\KelasController@showMahasiswaRegister'));
	//Route::post('/kelas/mhsregister/proses', array('as'=>'kelas.mhsregister.proses', 'uses'=>'Kelas\KelasController@kelasMahasiswaRegister'));
	//Route::get('/kelas/register/kelaspeserta', array('as'=>'kelas.klspeserta.proses', 'uses'=>'Kelas\KelasController@registerPesertaKelas'));
	//Route::post('/kelas/tambah/dosen/makul', array('as'=>'kelas.tambah.dosen.makul', 'uses'=>'Kelas\KelasController@tambahDosenMatakuliah'));

	//Absensi
	Route::get('/absensi',['as'=>'absensi', 'uses'=> 'Absensi\AbsensiController@index']);
	//Route::post('/absensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Absensi\AbsensiController@pilihtahun']);
	//Route::get('/absensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Absensi\AbsensiController@index']);
	Route::get('/absensi/{id}/detail', array('as'=>'absensi.detail', 'uses'=> 'Absensi\AbsensiController@detail'));

	// //semester Pelajaran
	// Route::get('/semester', array('as'=>'semester', 'uses'=>'Semester\SemesterController@index'));
	// Route::get('/semester/{id}/aktif', array('as'=>'semester.aktif', 'uses'=>'Semester\SemesterController@default_aktif'));
	// Route::get('/semester/semesterprodi', array('as'=>'semesterprodi', 'uses'=>'Semester\SemesterController@semesterprodi'));
	// //Route::get('/semester/tambah', array('as'=>'tambah', 'uses'=>'Semester\SemesterController@tambah'));
	// Route::post('/semester/tambahsemester', array('as'=>'semester.tambah', 'uses'=>'Semester\SemesterController@tambahsemester'));
	// Route::get('/semester/{id}/hapus', array('as'=>'semester.hapus', 'uses'=> 'Semester\SemesterController@hapus'));
	// Route::get('/semester/{id}/edit', array('as'=>'semester.edit', 'uses'=> 'Semester\SemesterController@editsemester'));
	// Route::get('/semester/registersemesterprodi', array('as'=>'register.semester.prodi', 'uses'=> 'Semester\SemesterController@registerSemesterProdi'));
	
	// //Semester
	// Route::get('/semester', array('as'=>'semester', 'uses'=>'Semester\SemesterController@index'));
	// Route::get('/semester/{id}/aktif', array('as'=>'semester.aktif', 'uses'=>'Semester\SemesterController@default_aktif'));
	// Route::get('/semester/semesterprodi', array('as'=>'semesterprodi', 'uses'=>'Semester\SemesterController@semesterprodi'));
	// //Route::get('/semester/tambah', array('as'=>'tambah', 'uses'=>'Semester\SemesterController@tambah'));
	// Route::post('/semester/tambahsemester', array('as'=>'semester.tambah', 'uses'=>'Semester\SemesterController@tambahsemester'));
	// Route::get('/semester/{id}/hapus', array('as'=>'semester.hapus', 'uses'=> 'Semester\SemesterController@hapus'));
	// Route::get('/semester/{id}/edit', array('as'=>'semester.edit', 'uses'=> 'Semester\SemesterController@editsemester'));
	// Route::get('/semester/registersemesterprodi', array('as'=>'register.semester.prodi', 'uses'=> 'Semester\SemesterController@registerSemesterProdi'));

	//Nilai
	Route::get('/nilai', array('as'=>'nilai', 'uses'=>'Nilai\NilaiController@index'));
	Route::get('/nilai/{id}/detail', array('as'=>'nilai.detail', 'uses'=>'Nilai\NilaiController@detail'));
	//Route::get('/nilai/admindownloadpeserta/{klsId}/{type}', array('as'=>'admin.export.peserta', 'uses'=>'Nilai\NilaiController@downloadPeserta'));
	
	// //Kelas
	// Route::get('/kelas', array('as'=>'kelas', 'uses'=>'Kelas\KelasController@index'));
	// Route::post('/kelas/prodi', array('as'=>'kelasprodi', 'uses'=>'Kelas\KelasController@kelasprodi'));
	// Route::get('/kelas/{id}/peserta', array('as'=>'kelaspeserta', 'uses'=>'Kelas\KelasController@peserta'));
	// Route::get('/kelas/register', array('as'=>'kelas.register', 'uses'=>'Kelas\KelasController@showKelasRegister'));
	// Route::post('/kelas/register/proses', array('as'=>'kelas.register.proses', 'uses'=>'Kelas\KelasController@kelasRegister'));
	// Route::get('/kelas/mhsregister', array('as'=>'kelas.mhsregister', 'uses'=>'Kelas\KelasController@showMahasiswaRegister'));
	// Route::post('/kelas/mhsregister/proses', array('as'=>'kelas.mhsregister.proses', 'uses'=>'Kelas\KelasController@kelasMahasiswaRegister'));
	// Route::get('/kelas/register/kelaspeserta', array('as'=>'kelas.klspeserta.proses', 'uses'=>'Kelas\KelasController@registerPesertaKelas'));
	// Route::post('/kelas/tambah/dosen/makul', array('as'=>'kelas.tambah.dosen.makul', 'uses'=>'Kelas\KelasController@tambahDosenMatakuliah'));

	// //input nilai
	// Route::get('/kelas/input/nilai', array('as'=>'kelas.input.nilai', 'uses'=>'Kelas\KelasController@showKelasInputNilai'));
	// Route::post('/kelas/input/nilai', array('as'=>'kelas.input.nilai', 'uses'=>'Kelas\KelasController@showKelasInputNilai'));

	// //spk
	// Route::get('/pegawai',['as'=>'pegawai', 'uses'=> 'Mangkir\MangkirController@index']);
	// Route::get('/pegawai/{id}/detail', array('as'=>'pegawai.mangkir', 'uses'=> 'Mangkir\MangkirController@detail'));

	// Route::get('/presensi',['as'=>'presensi', 'uses'=> 'Presensi\PresensiController@index']);
	// Route::post('/presensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Presensi\PresensiController@pilihtahun']);
	// Route::get('/presensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Presensi\PresensiController@index']);
	// Route::get('/presensi/{id}/detail', array('as'=>'presensi.detail', 'uses'=> 'Presensi\PresensiController@detail'));


	

});

//Route as Kepsek
Route::group(['middleware' => ['web','auth','level:4']], function()    
{
	Route::get('/kepsekdashboard',['as'=>'kepsekdashboard', 'uses'=> 'RoleKepsek\RoleKepsekController@kepsekDashboard']);
	//Route::post('/',['as'=>'dosenkelassemester', 'uses'=> 'RoleDosen\RoleDosenController@kelasSemester']);

	//Route::get('/dosen/pesertakelassemester/{klsId}',['as'=>'pesertakelassemester', 'uses'=> 'RoleDosen\RoleDosenController@pesertaKelasSemester']);	
	//
	//milik admin yang dipakai oleh Dosen
	//
	//Route::post('/nilai/importnilai', array('as'=>'import.nilai', 'uses'=>'Nilai\NilaiController@importNilai'));
	//Route::get('/nilai/downloadpeserta/{klsId}/{type}', array('as'=>'export.peserta', 'uses'=>'Nilai\NilaiController@downloadPeserta'));

	//cetak nyok
	//Route::get('nilai/semesterkelaspeserta/cetak/{klsId}/{idCetak}',['as'=>'nilai.semester.kelas.peserta.cetak', 'uses'=> 'RoleDosen\RoleDosenController@nilaiSemesterCetak']);

	//reset password
	Route::get('reset/password/kepsek',['as'=>'reset.password.kepsek', 'uses'=> 'RoleKepsek\RoleKepsekController@formResetPasswordKepsek']);
	Route::post('reset/password/kepsek',['as'=>'reset.password.kepsek', 'uses'=> 'RoleKepsek\RoleKepsekController@resetPasswordKepsek']);

});


//Route as Guru
Route::group(['middleware' => ['web','auth','level:5']], function()    
{
	Route::get('/gurudashboard',['as'=>'gurudashboard', 'uses'=> 'RoleGuru\RoleGuruController@guruDashboard']);
	//Route::post('/',['as'=>'dosenkelassemester', 'uses'=> 'RoleDosen\RoleDosenController@kelasSemester']);

	//Route::get('/dosen/pesertakelassemester/{klsId}',['as'=>'pesertakelassemester', 'uses'=> 'RoleDosen\RoleDosenController@pesertaKelasSemester']);	
	//
	//milik admin yang dipakai oleh Dosen
	//
	//Route::post('/nilai/importnilai', array('as'=>'import.nilai', 'uses'=>'Nilai\NilaiController@importNilai'));
	//Route::get('/nilai/downloadpeserta/{klsId}/{type}', array('as'=>'export.peserta', 'uses'=>'Nilai\NilaiController@downloadPeserta'));

	//cetak nyok
	//Route::get('nilai/semesterkelaspeserta/cetak/{klsId}/{idCetak}',['as'=>'nilai.semester.kelas.peserta.cetak', 'uses'=> 'RoleDosen\RoleDosenController@nilaiSemesterCetak']);

	//siswa
	Route::get('/datasiswa', array('as'=>'datasiswa', 'uses'=>'Siswa\SiswaController@index'));
	Route::get('datasiswa/{sisNisn}/detail', array('as'=>'datasiswa.detail', 'uses'=>'Siswa\SiswaController@detail'));

	//anakwali
	Route::get('/anakwali/{id}', array('as'=>'anakwali', 'uses'=>'Siswa\SiswaController@anakWali'));
	
	//nilai
	Route::get('/datanilai/{id}', array('as'=>'datanilai', 'uses'=>'Nilai\NilaiController@dataNilai'));
	Route::get('/datanilai/{id}/detail', array('as'=>'datanilai.detail', 'uses'=>'Nilai\NilaiController@detail'));
	//Route::post('/datanilai/{id}/edit', array('as'=>'datanilai.edit', 'uses'=>'Nilai\NilaiController@edit'));
	Route::get('/datanilai/{id}/edit', array('as'=>'datanilai.edit', 'uses'=>'Nilai\NilaiController@edit'));
	Route::post('/datanilai/update', array('as'=>'datanilai.update', 'uses'=>'Nilai\NilaiController@update'));
	
	//absensi
	Route::get('/dataabsensi',['as'=>'dataabsensi', 'uses'=> 'Absensi\AbsensiController@index']);
	//Route::post('/absensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Absensi\AbsensiController@pilihtahun']);
	//Route::get('/absensi/pilihtahun',['as'=>'pilihtahun', 'uses'=> 'Absensi\AbsensiController@index']);
	Route::get('/dataabsensi/{id}/detail', array('as'=>'dataabsensi.detail', 'uses'=> 'Absensi\AbsensiController@detail'));

	Route::get('/dataabsensi/{id}/tambah',['as'=>'dataabsensi.tambah', 'uses'=> 'Absensi\AbsensiController@tambah']);

	//reset password
	Route::get('reset/password/guru',['as'=>'reset.password.guru', 'uses'=> 'RoleGuru\RoleGuruController@formResetPasswordGuru']);
	Route::put('reset/password/guru',['as'=>'reset.password.guru', 'uses'=> 'RoleGuru\RoleGuruController@resetPasswordGuru']);

});


//Route as Pustakawan
Route::group(['middleware' => ['web','auth','level:6']], function()    
{
	
	//reset password
	Route::get('reset/password/pustakawan',['as'=>'reset.password.pustakawan', 'uses'=> 'RolePustakawan\RolePustakawanController@formResetPasswordPustakawan']);
	Route::post('reset/password/pustakawan',['as'=>'reset.password.pustakawan', 'uses'=> 'RolePustakawan\RolePustakawanController@resetPasswordPustakawan']);

});

//Route as Dosen
Route::group(['middleware' => ['web','auth','level:2']], function()    
{
	Route::get('/dosen/kelas/semester',['as'=>'kelassemester', 'uses'=> 'RoleDosen\RoleDosenController@kelasSemester']);
	Route::post('/dosen/kelas/semester',['as'=>'dosenkelassemester', 'uses'=> 'RoleDosen\RoleDosenController@kelasSemester']);

	Route::get('/dosen/pesertakelassemester/{klsId}',['as'=>'pesertakelassemester', 'uses'=> 'RoleDosen\RoleDosenController@pesertaKelasSemester']);	
	//
	//milik admin yang dipakai oleh Dosen
	//
	Route::post('/nilai/importnilai', array('as'=>'import.nilai', 'uses'=>'Nilai\NilaiController@importNilai'));
	Route::get('/nilai/downloadpeserta/{klsId}/{type}', array('as'=>'export.peserta', 'uses'=>'Nilai\NilaiController@downloadPeserta'));

	//cetak nyok
	Route::get('nilai/semesterkelaspeserta/cetak/{klsId}/{idCetak}',['as'=>'nilai.semester.kelas.peserta.cetak', 'uses'=> 'RoleDosen\RoleDosenController@nilaiSemesterCetak']);

	//reset password
	Route::get('reset/password/dosen',['as'=>'reset.password.dosen', 'uses'=> 'RoleDosen\RoleDosenController@formResetPasswordDosen']);
	Route::post('reset/password/dosen',['as'=>'reset.password.dosen', 'uses'=> 'RoleDosen\RoleDosenController@resetPasswordDosen']);

});

// //Route as mahasiswa
// Route::group(['middleware' => ['web','auth','level:3']], function()    
// {
// 	Route::get('/nilai/semester',['as'=>'nilaisemester', 'uses'=> 'RoleMhs\RoleMhsController@nilaiSemester']);
// 	Route::post('/nilai/semester',['as'=>'nilaisemester', 'uses'=> 'RoleMhs\RoleMhsController@nilaiSemester']);
// 	Route::get('nilai/semester/cetak/{id}',['as'=>'nilaisemestercetak', 'uses'=> 'RoleMhs\RoleMhsController@nilaiSemesterCetak']);
	
// 	Route::get('/reset/password/mahasiswa',['as'=>'resetpasswordmahasiswa', 'uses'=> 'RoleMhs\RoleMhsController@formResetPasswordMahasiswa']);
// 	Route::post('/reset/password/mahasiswa',['as'=>'resetpasswordmahasiswa', 'uses'=> 'RoleMhs\RoleMhsController@resetPasswordMahasiswa']);
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => 'web'], function () {
    Route::auth();
	
    //Route::get('/home', 'HomeController@index');
    //

});
*/

