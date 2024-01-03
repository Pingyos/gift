<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

<body id="top">
    <main>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">เพิ่มของรางวัล</h1>
                            <a href="index.php">
                                <h6>กลับหน้าหลัก</h6>
                            </a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-12 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                                        <form class="custom-form subscribe-form" action="#" method="post" role="form">
                                            <div class="col-lg-12 col-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6 mb-2">
                                                        <input type="text" name="giftname" id="giftname" class="form-control" placeholder="ชื่อของรางวัล" required>
                                                    </div>
                                                    <div class="col-lg-6 col-6 mb-2">
                                                        <select name="datagroup" id="datagroup" class="form-control" required>
                                                            <option value="1">ชุดที่ 1</option>
                                                            <option value="2">ชุดที่ 2</option>
                                                            <option value="3">ชุดที่ 3</option>
                                                            <option value="4">ชุดที่ 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-12">
                                                <button type="submit" class="form-control">เพิ่ม</button>
                                            </div>
                                            <?php
                                            if (isset($_POST['giftname']) && isset($_POST['datagroup'])) {
                                                require_once '../connect.php';
                                                $giftname = $_POST['giftname'];
                                                $datagroup = $_POST['datagroup'];
                                                $stmt = $conn->prepare("INSERT INTO `group` (giftname, datagroup) VALUES (:giftname, :datagroup)");
                                                $stmt->bindParam(':giftname', $giftname, PDO::PARAM_STR);
                                                $stmt->bindParam(':datagroup', $datagroup, PDO::PARAM_INT);

                                                $result = $stmt->execute();
                                                echo '
                                                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                                                if ($result) {
                                                    echo '<script>
                                                        setTimeout(function() {
                                                        swal({
                                                            title: "บันทึกข้อมูลสำเร็จ", 
                                                            text: "กรุณารอสักครู่",
                                                            type: "success", 
                                                            timer: 800, 
                                                            showConfirmButton: false 
                                                        }, function() {
                                                            window.location = "groupadd.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
                                                } else {
                                                    echo '<script>
                                                        setTimeout(function() {
                                                        swal({
                                                            title: "เกิดข้อผิดพลาด",
                                                            type: "error"
                                                        }, function() {
                                                            window.location = "groupadd.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
                                                }
                                                $conn = null;
                                            }
                                            ?>
                                        </form>
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