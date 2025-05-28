<style>
    .top-right {
    position: absolute;
    top: 2px;
    left: 10px;
    }
</style>

<style>
    .top-right1 {
    position: absolute;
    bottom: 10px;
    right: 10px;
    }
</style>

<?php include('page/page_mee.php'); ?>

<?php
 $result_load_packz = $connect->query("SELECT * FROM pp_shop_stock_api WHERE showitem = 1");
if ($result_load_packz->num_rows == 0) :?>
    <div class="col-md-12 col-sm-12 mt-2" data-aos="zoom-in-down">
        <div class="alert alert-dismissible alert-danger">
            <strong>เชื่อมต่อเซิฟเวอร์ไม่สำเร็จ! </strong> <a href="page/pshop" class="alert-link">ลองอีกครั้ง</a>.
        </div>
    </div>
<?php else: ?>

<div class="col-md-12 col-sm-12 col-12 mt-4 mb-4">
    <div class="crad crad_tung rounded-3" style="background: rgba(255, 255, 255);">
        <h4 class="m-2"><i class='bx bx-store' ></i> รายการสินค้า <span class="text-black-50" style="font-size: 16px;">( ร้านค้า )</span></h4><hr>

            <div class="row">
            <?php 
            
            $load_packz = $result_load_packz->fetch_all(MYSQLI_ASSOC);
            $i= 1;
            foreach ($load_packz as $shop_fetch) : ?>

        <div class="col-md-31 col-sm-12 col-12 px-2 d-flex align-items-stretch" >
            <div class="card shadow mb-3 w-100 " data-aos="fade-up">
                <center><img src="<?=$shop_fetch['img']?>" class="p-4" style="width:11.1rem;"></center>
                <?php if($shop_fetch['stock'] == 0): ?>
                    <p class="top-right mt-2"><span class="badge rounded-pill text-bg-danger">สินค้าหมด</span></p>
                    <?php else : ?>
                        <p class="top-right mt-2"><span class="badge rounded-pill text-bg-success">พร้อมจำหน่าย</span></p>
                    <?php endif ?>

                    
                 
                <div class="card-body d-flex flex-column">
                
                    <h5><?=$shop_fetch['name']?></h5>
                    <small><i class="fa-brands fa-creative-commons-share"></i> ประเภทสินค้า <?=$shop_fetch['id']?></small>
                    <small><i class="fa-regular fa-circle-user"></i> คงเหลือ <?=$shop_fetch['stock']?> ชิ้น</small>
                    <small><i class="fa-regular fa-clock"></i> สถานะ <?=$shop_fetch['status']?></small>
                    <?php if($shop_fetch['stock'] == 0): ?>
                      <div class="">
                        <small><i class="fa-solid fa-circle-notch fa-spin text-danger"></i> รออัพเดตสินค้า 23.59 น.</small>
                      </div>
                    <?php endif ?>
                </div>
                <div class="p-2">
                    
                    <h6 class="text-black-50">$ ราคา <?=number_format($shop_fetch['price_web'], 2)?> เครดิค</h6>
                    
                    <button class="btn btn-outline-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#ShopModal<?=$shop_fetch['id']?>">ข้อมูลเพิ่มเติม</button>
                    <?php if(isset($_SESSION['username'])): ?>
                    <button class="btn btn-primary w-100 mb-2" onclick="buypremium(<?=$shop_fetch['id']?>)">สั่งซื้อ (<?=number_format($shop_fetch['price_web'], 2)?> เครดิค)</button>
                    <?php else: ?>
                    <button class="btn btn-primary w-100 mb-2"  onclick="CradURL('./page/login')">เข้าสู่ระบบเพื่อนสั่งซื้อ </button>
                    <?php endif ?>

                    
                    
                </div>
            </div>
        </div>

            <?php  endforeach; ?>
            </div>

    </div>
</div>


<?php foreach ($load_packz as $shop_fetch) : ?>
<!-- Modal -->
<div class="modal fade" id="ShopModal<?=$shop_fetch['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$shop_fetch['name']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <center><img src="<?=$shop_fetch['img']?>" class="p-4" style="width:11.1rem;"></center>
            <h5><?=$shop_fetch['name']?></h5>
            <small><i class="fa-brands fa-creative-commons-share"></i> ประเภทสินค้า <?=$shop_fetch['id']?></small>
            <small><i class="fa-regular fa-circle-user"></i> คงเหลือ <?=$shop_fetch['stock']?> ชิ้น</small>
            <small><i class="fa-regular fa-clock"></i> สถานะ <?=$shop_fetch['status']?></small>
            
        </div>
        <p><?=$shop_fetch['info']?></p>

    
      </div>
      <div class="modal-footer">
        <?php if(isset($_SESSION['username'])): ?>
        <button class="btn btn-primary w-40 mb-2" onclick="buypremium(<?=$shop_fetch['id']?>)">สั่งซื้อ (<?=number_format($shop_fetch['price_web'], 2)?> เครดิค)</button>
        <?php else: ?>
        <button class="btn btn-primary w-40 mb-2"  onclick="CradURL('./page/login')">เข้าสู่ระบบเพื่อนสั่งซื้อ </button>
        <?php endif ?>
        <button type="button" class="btn btn-danger w-40" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php  endforeach; ?>

<!-- <button class="btn btn-primary w-100 mb-2" onclick="buypremium(100)"> Test สั่งซื้อ ( เครดิค)</button> -->



<?php endif; ?>