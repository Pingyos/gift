<div class="row">
    <?php
    require_once '../connect.php';
    $stmt = $conn->prepare("SELECT * FROM `user` ORDER BY `user`.`id` DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $t1) {
    ?>
        <div class="col-lg-4 col-md-4 col-12 mb-3 mb-lg-3">
            <div class="custom-block bg-white shadow-lg">
                <div class="d-flex">
                    <div>
                        <h5 class="mb-2"><?= $t1['name']; ?></h5>
                        <h6 class="mb-2"><?= $t1['giftname']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>