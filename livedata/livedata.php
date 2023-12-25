<div class="row">
    <?php
    require_once '../connect.php';
    $stmt = $conn->prepare("SELECT * FROM `user` ORDER BY `user`.`id` DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $count = count($result);
    $itemsPerPage = 30;

    $pages = ceil($count / $itemsPerPage);

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    $start = ($currentPage - 1) * $itemsPerPage;
    $end = $start + $itemsPerPage;

    $currentPageData = array_slice($result, $start, $itemsPerPage);

    foreach ($currentPageData as $t1) {
    ?>
        <div class="col-lg-3 col-md-4 col-12 mb-3 mb-lg-3">
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

<?php if ($pages > 1) { ?>
    <div class="text-center mt-4">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                    <a class="page-link <?php if ($i == $currentPage) echo 'bg-gray text-white'; ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
</div>