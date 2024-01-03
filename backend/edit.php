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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-12 mb-4 mb-lg-4">
                                        <div class="custom-block bg-white shadow-lg">
                                            <?php
                                            require_once '../connect.php';
                                            $stmt = $conn->prepare("SELECT * FROM `group` ORDER BY id DESC");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            ?>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อ</th>
                                                        <th>ชุดที่</th>
                                                        <th>เพิ่ม</th>
                                                        <th>แก้</th>
                                                        <th>ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $counter = 1; // เพิ่มตัวแปรนับลำดับ
                                                    foreach ($result as $t1) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= $t1['giftname']; ?></td>
                                                            <td><?= $t1['datagroup']; ?></td>
                                                            <td><a href="groupadd.php" class="btn btn-info btn-sm">เพิ่ม</a></td>
                                                            <td><a href="formedit.php?id=<?= $t1['id']; ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                                            <td><a href="del.php?id=<?= $t1['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/click-scroll.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>