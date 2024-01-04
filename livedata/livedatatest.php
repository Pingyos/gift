<div class="custom-block bg-white shadow-lg">
    <?php
    require_once '../connect.php';
    $stmt = $conn->prepare("SELECT * FROM `user` ORDER BY `user`.`id` DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">หมายเลข</th>
                <th scope="col">ของรางวัล</th>
                <th scope="col">เวลาที่ได้รับ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sequence = 1; // Initialize the sequence number
            foreach ($result as $t1) {
            ?>
                <tr>
                    <td><?= $sequence++; ?></td>
                    <td><?= $t1['name']; ?></td>
                    <td><?= $t1['giftname']; ?></td>
                    <td><?= $t1['dateCreate']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>