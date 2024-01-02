<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

<body id="top">
    <main>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">ของรางวัล</h1>
                            <a href="index.php">
                                <h6>กลับหน้าหลัก</h6>
                            </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">ทั้งหมด</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="set1-tab" data-bs-toggle="tab" data-bs-target="#set1-tab-pane" type="button" role="tab" aria-controls="set1-tab-pane" aria-selected="false">ชุดที่ 1</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="set2-tab" data-bs-toggle="tab" data-bs-target="#set2-tab-pane" type="button" role="tab" aria-controls="set2-tab-pane" aria-selected="false">ชุดที่ 2 </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="set3-tab" data-bs-toggle="tab" data-bs-target="#set3-tab-pane" type="button" role="tab" aria-controls="set3-tab-pane" aria-selected="false">ชุดที่ 3 </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="set4-tab" data-bs-toggle="tab" data-bs-target="#set4-tab-pane" type="button" role="tab" aria-controls="set4-tab-pane" aria-selected="false">ชุดที่ 4</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';

                                    $groupStmt = $conn->prepare("SELECT * FROM `group`");
                                    $groupStmt->execute();
                                    $groups = $groupStmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($groups as $group) {
                                        $groupId = $group['id'];
                                        $userStmt = $conn->prepare("SELECT COUNT(*) as userCount FROM `user` WHERE groupId = :groupId");
                                        $userStmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                        $userStmt->execute();
                                        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

                                        $userCount = $userData['userCount'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $groupId; ?>?giftname=<?= $group['giftname']; ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-2"><?= $group['giftname']; ?></h5>
                                                        </div>
                                                        <span class="badge bg-design rounded-pill"><?= $userCount; ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="set1-tab-pane" role="tabpanel" aria-labelledby="set1-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';

                                    $groupStmt = $conn->prepare("SELECT * FROM `group` WHERE datagroup = 1");
                                    $groupStmt->execute();
                                    $groups = $groupStmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($groups as $group) {
                                        $groupId = $group['id'];

                                        $userStmt = $conn->prepare("SELECT COUNT(*) as userCount FROM `user` WHERE groupId = :groupId");
                                        $userStmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                        $userStmt->execute();
                                        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

                                        $userCount = $userData['userCount'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $groupId; ?>?giftname=<?= $group['giftname']; ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-2"><?= $group['giftname']; ?></h5>
                                                        </div>
                                                        <span class="badge bg-design rounded-pill"><?= $userCount; ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="set2-tab-pane" role="tabpanel" aria-labelledby="set2-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';

                                    $groupStmt = $conn->prepare("SELECT * FROM `group` WHERE datagroup = 2");
                                    $groupStmt->execute();
                                    $groups = $groupStmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($groups as $group) {
                                        $groupId = $group['id'];

                                        $userStmt = $conn->prepare("SELECT COUNT(*) as userCount FROM `user` WHERE groupId = :groupId");
                                        $userStmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                        $userStmt->execute();
                                        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

                                        $userCount = $userData['userCount'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $groupId; ?>?giftname=<?= $group['giftname']; ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-2"><?= $group['giftname']; ?></h5>
                                                        </div>
                                                        <span class="badge bg-design rounded-pill"><?= $userCount; ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="set3-tab-pane" role="tabpanel" aria-labelledby="set3-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';

                                    $groupStmt = $conn->prepare("SELECT * FROM `group` WHERE datagroup = 3");
                                    $groupStmt->execute();
                                    $groups = $groupStmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($groups as $group) {
                                        $groupId = $group['id'];

                                        $userStmt = $conn->prepare("SELECT COUNT(*) as userCount FROM `user` WHERE groupId = :groupId");
                                        $userStmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                        $userStmt->execute();
                                        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

                                        $userCount = $userData['userCount'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $groupId; ?>?giftname=<?= $group['giftname']; ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-2"><?= $group['giftname']; ?></h5>
                                                        </div>
                                                        <span class="badge bg-design rounded-pill"><?= $userCount; ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="set4-tab-pane" role="tabpanel" aria-labelledby="set4-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';

                                    $groupStmt = $conn->prepare("SELECT * FROM `group` WHERE datagroup = 4");
                                    $groupStmt->execute();
                                    $groups = $groupStmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($groups as $group) {
                                        $groupId = $group['id'];

                                        $userStmt = $conn->prepare("SELECT COUNT(*) as userCount FROM `user` WHERE groupId = :groupId");
                                        $userStmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                        $userStmt->execute();
                                        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

                                        $userCount = $userData['userCount'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $groupId; ?>?giftname=<?= $group['giftname']; ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-2"><?= $group['giftname']; ?></h5>
                                                        </div>
                                                        <span class="badge bg-design rounded-pill"><?= $userCount; ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 คณะกรรมการของรางวัล
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>