<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body>

    <div style="margin:auto;width:500px;">

        <table class="table table-condensed table-hover" width="300">
            <tr>
                <td align="center">Top</td>
                <td align="center">Sub</td>
            </tr>

            <?php
            include("condb.php");
            $sql = "SELECT * FROM `activity_event` 
                    INNER JOIN activity ON activity_event.a_id = activity.a_id 
                    INNER JOIN item_list ON activity_event.list_id = item_list.list_id 
                    WHERE e_id = (SELECT e_id FROM event WHERE event.userid = 1 ) ";
            $query = mysqli_query($conn,$sql);
            
            

            while($row = mysqli_fetch_array($query)){
                $temp_data1 = null;
                $temp_data2 = null;
                $data_show = 1;    // 1 แสดง 0 ไม่แสดง
                while($row = mysqli_fetch_array($query)){
                    $temp_data1 = $i;
                    if ($temp_data2 == null) {
                        $temp_data2 = $temp_data1;
                        $data_show = 1;
                    } else {
                        if ($temp_data1 == $temp_data2) {
                            $data_show = 0;
                            $temp_data2 = $temp_data1;
                        }
                    }
            ?>
            <table class="table  table-light table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">กิจกรรม</th>
                                    <th scope="col">ของ</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>


                    <tr>
                        <td align="center">
                            <?php if ($data_show == 1) { ?>
                                <?= $row['a_name'] ?>
                            <?php } ?>
                        </td>
                        <td align="center"><?= $row['price'] ?></td>
                    </tr>
            <?php }
            } ?>
        </table>

    </div>

</body>

</html>