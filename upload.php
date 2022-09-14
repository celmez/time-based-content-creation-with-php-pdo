<?php
    require_once 'Connect.php';
?>
<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
    <input type="file" name="file" id="file" />
        <br>
        <br>
    <button style="cursor: pointer;" name="send">
        Paylaş
    </button>
</form>
<?php
    if( isset( $_POST['send'] ) )
    {
        $image = $_FILES['file'];
        $folder = 'images/';
        $tmp_name = $image['tmp_name'];
        $url = substr( $image['name'], -4, 4 );
        $new_name = rand( 0, 9999999 ).$url;
        $image_url = rand( 0, 123456 );
        $upload = $folder.$new_name;
        $time = strtotime( '+1 min', time() );
        $tomorrow = date("d.m.Y H:i:s", $time);

        if( !file_exists( $folder ) )
        {
            mkdir( 'images' );
        }

        elseif( move_uploaded_file( $tmp_name, $upload ) )
        {
            $add = $connect->db->prepare("INSERT INTO aktif_resimler SET paylasan = ?, resim = ?, resim_url = ?, tarih = ?, bitis_tarih = ?, durum = ?");
            $ok = $add->execute(
                array(
                    'yusuf',
                    $new_name,
                    $image_url,
                    date("d.m.Y H:i:s"),
                    $tomorrow,
                    'Aktif'
                )
            );

            if( $ok )
            {
                header("Location: http://localhost/project/tryto/");
            }

            else
            {
                echo 'Hata Oluştu';
            }
        }
    }
?>