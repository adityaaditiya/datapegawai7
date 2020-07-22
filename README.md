    
Cara install project :


    1. git clone "https://github.com/mirza-alim-m/laravel2020-D-G10.git"
    2. ketik  "composerupdate" pada terminal atau Command prompt
    3. Buat Skema database .env konfigurasikan 
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=[schema database anda/nama database anda]
        DB_USERNAME=[username database anda]
        DB_PASSWORD=[password database anda]
    4. lalu ketik php artisan migrate --seed
    5. jalankan perintah php artisan storage:link
    6. php artisan passport:install
    7. lalu ketik php artisan serve untuk menjalankan project. 


    username : admin@gmail.com
    password : 123456789


Cara Test API :

    1. Jika Anda ingin menggunakan API ini, login dengan formulir-data dan isi usernamedengan email terdaftar dan password.
    
      [POST]http://{your hostname}/api/login 
        Parameter : [username]
                    [password]

    2. Gunakan token akses dan kemudian anda dapat mengakses parameter dibawah ini :

        API Create :

        [POST]http://{your hostname}/api/pegawai
        
        Parameter : [nama]
                    [alamat]
                    [jenis_kelamin]
                    [tempat]
                    [tanggal]
                    [jabatan]
                    [status_menikah]
                    [agama]


        API Show :

        [GET]http://{your hostname}/api/pegawai/("id pegawai yang akan ditampilkan")

        API Update :

        [POST]http://{your hostname}/api/pegawai/("id pegawai yang akan di ubah")

        Parameter :(key)[_method]  (value)[put]
                    [nama] ("jika yang ingin diubah hanya nama cukup tambahkan parameter ini")
                    [alamat]("jika yang ingin diubah hanya alamat cukup tambahkan parameter ini")
                    [jenis_kelamin]("jika yang ingin diubah hanya jenis kelamin cukup tambahkan parameter ini")
                    [tempat]("jika yang ingin diubah hanya Tempat cukup tambahkan parameter ini")
                    [tanggal]("jika yang ingin diubah hanya tahun-bulan-tangga cukup tambahkan parameter ini")
                    [jabatan]("jika yang ingin diubah hanya jabatan cukup tambahkan parameter ini")
                    [status_menikah]("jika yang ingin diubah hanya Status Menikah cukup tambahkan parameter ini")
                    [agama]("jika yang ingin diubah hanya agama cukup tambahkan parameter ini")

        API delete :

        [DELETE]http://{your hostname}/api/pegawai/("id pegawai yang akan di hapus")

# datapegawai7
