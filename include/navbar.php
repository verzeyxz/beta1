<nav class="navbar navbar-expand-lg navbar-dark shadow-lg sticky-top py-4" style="background: linear-gradient(90deg, rgba(131, 41, 254) 0%, rgba(150, 107, 208) 50%, rgba(205, 182, 237) 89%);">
    <div class="container">
        <!-- <a href="<?=LOCAL_WEB?>"><img src="assets/img/logo2.png" style="height: 6.1rem;width: 7.9rem;border-radius: 0%;" alt="a" class="card-img-top img-proflie mb-2"></a> -->
        <a class="navbar-brand text-black" href="#">
                <?=$web_rows['web_name'] ?>
            <!-- <img src="assets/img/logo_godpod.png" alt="" class="w-100 d-block" height="80"> -->
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto text-center text-black">
            <li class="nav-item">
                <a class="hvr-icon-up nav-link hvr-underline-from-center text-black <?php if(@$_GET['page'] == "home"){ echo "active"; } ?>" href="page/home"><small style="font-size: 16px;"><i class='bx bx-home-alt hvr-icon' ></i> หน้าแรก</small></a>
            </li>
            <li class="nav-item">
                <a class="hvr-icon-up nav-link hvr-underline-from-center text-black <?php if(@$_GET['page'] == "shop"){ echo "active"; } ?>" href="page/shop"><small style="font-size: 16px;"><i class='bx bx-cart hvr-icon' ></i> ร้านค้า</small></a>
            </li>
            
            <!-- <li class="nav-item">
                <a class="hvr-icon-up nav-link <?php if(@$_GET['page'] == "history"){ echo "active"; } ?>" href="page/history"><small><i class="fa-solid fa-box-open hvr-icon"></i> ประวัติการสั่งซื้อ</small></a>
            </li> -->
            <?php if(isset($_SESSION['username'])): ?>

            <!-- <li class="nav-item">
            <a class="hvr-icon-up nav-link <?php if(@$_GET['page'] == "history"){ echo "active"; } ?>" href="page/history"><small><i class="fa-solid fa-box-open hvr-icon"></i> ประวัติการสั่งซื้อ</small></a>
            </li> -->

            <li class="nav-item">
                <a class="hvr-icon-up nav-link hvr-underline-from-center text-black <?php if(@$_GET['page'] == "topup"){ echo "active"; } ?>" href="page/topup"><small style="font-size: 16px;"><i class='bx bx-wallet-alt hvr-icon' ></i> เติมเงิน</small></a>
            </li>

            <li class="nav-item">
                <a class="hvr-icon-up nav-link hvr-underline-from-center text-black <?php if(@$_GET['page'] == "history"){ echo "active"; } ?>" href="page/history"><small style="font-size: 16px;"><i class='bx bx-history hvr-icon' ></i> ประวัติการสั่งซื้อ</small></a>
            </li>

            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle hvr-icon-up hvr-underline-from-center " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <small style="font-size: 16px;"><i class='bx bx-history hvr-icon' ></i> ประวัติการสั่งซื้อ</small></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="page/history"><i class="fa-solid fa-caret-right"></i> ประวัติการสั่งซื้อสินค้า</a>
                    <a class="dropdown-item" href="page/historypshop"><i class="fa-solid fa-caret-right"></i> ประวัติการสั่งซื้อแอพพรีเมี่ยม</a>
            </li> -->
            
            <?php endif ?>
        </ul>
        <?php if(isset($_SESSION['username'])): ?>
            <div class="d-flex flex-row-reverse">
                <ul class="navbar-nav me-auto ms-auto text-center">
                    <li class="nav-item">
                        <button class="btn btn-light">ยอดเงินคงเหลือ <b class="text-primary">฿<?=number_format($users_point,2)?></b> บาท</button>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-info hvr-icon-up"><i class="fa-solid fa-user hvr-icon"></i> <?=$users_username?></button>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop2" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                    <?php if($users_status == $admin_status): ?>
                                        <a class="dropdown-item" href="manage/main"><i class="fa-solid fa-code"></i> จัดการหลังบ้าน</a>
                                    <?php endif;?>
                                    <a class="dropdown-item" href="page/profile"><i class="fa-solid fa-user hvr-icon"></i> ข้อมูลส่วนตัว</a>
                                    <button class="dropdown-item" onclick="logout()"><i class="fa-solid fa-right-from-bracket hvr-icon"></i> ออกจากระบบ</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        
        <?php else:?>
            <div class="d-flex flex-row-reverse">
                <ul class="navbar-nav me-auto ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-login hvr-icon-up" href="page/login"><i class="fa-solid fa-user-lock hvr-icon"></i> เข้าสู่ระบบ</a>
                        <a class="btn btn-login hvr-icon-up" href="page/register"><i class="fa-solid fa-address-book hvr-icon"></i> สมัครสมาชิก</a>
                    </li>
                </ul>
            </div>
        <?php endif;?>
        </div>
    </div>
    </nav>