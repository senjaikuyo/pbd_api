<?php
include_once("koneksi.php");
$db = new koneksiDB();
$koneksi = $db->getKoneksi();
$request = $_SERVER['REQUEST_METHOD'];

// Mengambil URL dan memecahnya menjadi array untuk mendapatkan ID
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segment = explode('/', $uri_path);

switch($request){
    case 'GET' :
        // Jika terdapat ID pada segment ke-3 (contoh: /karyawan/1)
        if(!empty($uri_segment[3])){
            $id = intval($uri_segment[3]);
            get_karyawan($id);
        } else {
            get_karyawan();
        }
        break;
    case 'POST':
        insert_karyawan();
        break;
    case 'PUT' :
        // ID diambil dari URL untuk proses update
        $id = intval($uri_segment[3]);
        update_karyawan($id);
        break;
    case 'DELETE' :
        // ID diambil dari URL untuk proses hapus
        $id = intval($uri_segment[3]);
        delete_karyawan($id);
        break;
    default:
        header("HTTP/1.0 405 Method Tidak Terdaftar");
}

// --- FUNGSI CRUD ---

function get_karyawan($id = ""){
    global $koneksi;
    $query = "SELECT * FROM tb_karyawan";
    if(!empty($id)){
        $query .= " WHERE id=$id LIMIT 1";
    }
    $respon = array();
    $result = mysqli_query($koneksi, $query);
    $i = 0;
    
    if($result){
        $respon['status'] = "sukses";
        $respon['pesan'] = "Data berhasil ditemukan";
        while ($row = mysqli_fetch_array($result)){
            $respon['data'][$i]['ID karyawan'] = $row['id'];
            $respon['data'][$i]['Nama karyawan'] = $row['nama'];
            $respon['data'][$i]['Email karyawan'] = $row['email'];
            $respon['data'][$i]['Divisi'] = $row['divisi'];
            $respon['data'][$i]['Gaji'] = $row['gaji'];
            $i++;
        }
    } else {
        $respon['status'] = "gagal";
        $respon['pesan'] = "Data tidak berhasil di ambil";
    }
    header('Content-Type: application/json');
    echo json_encode($respon);
}

function insert_karyawan(){
    global $koneksi;
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Pastikan data tidak kosong sebelum di-query
    if($data){
        $nama = $data['nama'];
        $email = $data['email'];
        $divisi = $data['divisi'];
        $gaji = $data['gaji'];

        $query = "INSERT INTO tb_karyawan SET nama='".$nama."', email='".$email."', divisi='".$divisi."', gaji='".$gaji."'";
        if(mysqli_query($koneksi, $query)){
            $respon = ['status' => "sukses", 'pesan' => "Data berhasil disimpan"];
        } else {
            $respon = ['status' => "gagal", 'pesan' => "Data tidak berhasil disimpan"];
        }
    } else {
        $respon = ['status' => "gagal", 'pesan' => "Data JSON tidak valid"];
    }
    header('Content-Type: application/json');
    echo json_encode($respon);
}

function update_karyawan($id){
    global $koneksi;
    $data = json_decode(file_get_contents("php://input"), true);
    $nama = $data['nama'];
    $email = $data['email'];
    $divisi = $data['divisi'];
    $gaji = $data['gaji'];

    $query = "UPDATE tb_karyawan SET nama='".$nama."', email='".$email."', divisi='".$divisi."', gaji='".$gaji."' WHERE id='".$id."'";
    if(mysqli_query($koneksi, $query)){
        $respon = ['status' => "sukses", 'pesan' => "Data berhasil diupdate"];
    } else {
        $respon = ['status' => "gagal", 'pesan' => "Data gagal diupdate"];
    }
    header('Content-Type: application/json');
    echo json_encode($respon);
}

function delete_karyawan($id){
    global $koneksi;
    $query = "DELETE FROM tb_karyawan WHERE id=".$id;
    if(mysqli_query($koneksi, $query)){
        $respon = ['status' => "sukses", 'pesan' => "Data berhasil dihapus"];
    } else {
        $respon = ['status' => "gagal", 'pesan' => "Data gagal dihapus"];
    }
    header('Content-Type: application/json');
    echo json_encode($respon);
}
?>