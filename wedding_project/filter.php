<?php
session_start();
include('condb.php');
$n = 1;
if (isset($_POST['value'])) {
    $value = $_POST['value'];
    $userid = $_SESSION['userid'];
    $sql = "";
    if ($value == 100) {
        $sql = "SELECT * FROM `email_list` WHERE email_id = (SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid))";
    } else {
        $sql = "SELECT * FROM `email_list` 
        WHERE email_id = (SELECT email.email_id 
        FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid))
        AND replying = '$value'";
    }

    $query = mysqli_query($conn, $sql);
?>
    <table id="tbl_exporttable_to_xls" class="table mt-1 bg-white table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">ความสัมพันธ์</th>
                <th scope="col">ที่อยู่อีเมล</th>
                <th scope="col">การตอบรับ</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <th scope="row"><?= $n ?></th>
                    <td><?= $row['e_name'] ?></td>
                    <td>
                        <?php if ($row['relation'] == "") {
                            echo "ไม่ระบุ";
                        } else {
                            echo $row['relation'];
                        } ?>
                    </td>
                    <td><?= $row['address'] ?></td>
                    <td class="replying">
                        <?php
                        $reply = $row['replying'];
                        if ($reply == "accept") {
                            $reply = "เข้าร่วม";
                            echo $reply;
                        } else if ($reply == "reject") {
                            $reply = "ไม่เข้าร่วม";
                            echo $reply;
                        } else if ($reply == "notsure") {
                            $reply = "ไม่แน่ใจ";
                            echo $reply;
                        } else {
                            $reply = "รอการตอบรับ";
                            echo $reply;
                        } ?>
                    </td>
                </tr>
            <?php $n++;
            } ?>
        </tbody>
    </table>
<?php

} ?>