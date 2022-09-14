<?php
    require_once 'Connect.php';

    switch( @$_GET['mode'] )
    {
        case 'show':
            $control = $connect->db->prepare("SELECT * FROM aktif_resimler ORDER BY id DESC");
            $control->execute();
            $count = $control->rowCount();
            $value = $control->fetch( PDO::FETCH_ASSOC );

            if( $count != 0 )
            {
                if( $value['bitis_tarih'] >= date("d.m.Y H:i:s") )
                {
?>
                    <img src="images/<?= $value['resim']; ?>" style="height: 500px; width: 800px;" />
<?php
                }

                else
                {
                    $updateStatus = $connect->db->prepare("UPDATE aktif_resimler SET durum = ? WHERE id = ?");
                    $updateStatus->execute(
                        array(
                            'Pasif',
                            $value['id']
                        )
                    );
                    echo 'Artık bu gönderiye ulaşılamıyor!!!';
                }
            }

            else
            {
                echo 'Henüz bir hikaye yok';
            }
        break;
    }
?>