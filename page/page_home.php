<div class="col-md-12 col-sm-12 mt-4 mb-2" data-aos="fade-up">

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/img/bar/01.jpg" class="d-block w-100 rounded-3" alt="s1.png">
            </div>
            <div class="carousel-item">
            <img src="assets/img/bar/02.jpg" class="d-block w-100 rounded-3" alt="s2.png">
            </div>
            <div class="carousel-item">
            <img src="assets/img/bar/01.jpg" class="d-block w-100 rounded-3" alt="s3.png">
            </div>
            <div class="carousel-item">
            <img src="assets/img/bar/02.jpg" class="d-block w-100 rounded-3" alt="s4.png">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

<?php include('page/page_mee.php'); ?>


<div class="col-md-12 col-sm-12 col-12 mt-4 mb-4">
    <div class="crad crad_tung rounded-3" style="background: rgba(255, 255, 255);">
        <h4 class="m-2"><i class='bx bx-store' ></i> รายการสินค้า <span class="text-black-50" style="font-size: 16px;">( ร้านค้า )</span></h4><hr>

       <div class="row">
            <?php 
                $result_category = $connect->query("SELECT * FROM pp_category_api WHERE status = '1' ORDER BY id asc;");
                $res_categorys = $result_category->fetch_all(MYSQLI_ASSOC);
                $i= 1;
                foreach($res_categorys as $res_category) : 

                $count_pshopall = $connect->query("SELECT SUM(stock) AS sum_stock FROM pp_shop_stock_api WHERE category = '".$res_category['id']."'"); 
                $row_pshopall = mysqli_fetch_assoc($count_pshopall); 
                $rows_pshopall = $row_pshopall['sum_stock'];
            ?>

                <div class="col-md-31 col-sm-12 col-6 hvr-shrink pointer " data-bs-toggle="modal" data-bs-target="#byshop<?=$res_category['id']?>">
                    <div class="card shadow-lg" data-aos="zoom-in">
                        <div class="row p-2">
                            <div class="col-12">
                            <center>
                                <img  src="<?=$res_category['img']?>" style="border-color: #000;border-style: solid;border-width: 3px;height: 6.9rem;width: 6.9rem;border-radius: 50%;" alt="a" class="card-img-top img-proflie mb-2 hvr-icon">
                            </center>
                            </div>
                            <div class="col-12 mt-1">
                                <h4 class="text-center"><?=$res_category['name']?></h4>
                                <!-- <small style="font-size: 10px;"><?=$res_category['platform']?></small> -->
                                <!-- <button class="btn btn-sm btn-outline-warning w-100 p-2 mb-1">รายละเอียดเพิ่มเติม</button> -->
                                <button class="btn btn-sm btn-outline-primary w-100 p-2 mb-2">สั่งซื้อสินค้า</button>.
                                <small class="text-center"><i class='bx bxs-cart-download' ></i> คงเหลือ <?=$rows_pshopall ?> ชิ้น</small>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
       </div>


    </div>
</div>

<?php foreach ($res_categorys as $res_category) : ?>
<!-- Modal -->
<div class="modal fade" id="ShopModal<?=$res_category['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$res_category['name']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <center><img src="<?=$res_category['img']?>" class="p-4" style="width:11.1rem;"></center>
            <h5><?=$res_category['name']?></h5>
            
        </div>
        <p><?=$res_category['info']?></p>
    
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger w-40" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php  endforeach; ?>

<?php  foreach($res_categorys as $res_category) : ?>
  <!-- Modal -->
<div class="modal fade" id="byshop<?=$res_category['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?=$res_category['name']?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <img src="<?=$res_category['img']?>" style="border-color: #000;border-style: solid;border-width: 3px;height: 6.9rem;width: 6.9rem;border-radius: 50%;" alt="<?=$res_category['img']?>" class="card-img-top img-proflie">
                    </div>
                </div>
                <div class="col-md-8">
                    <select class="form-select" onchange="get_info(value,<?=$res_category['id']?>)" id="idshop<?=$res_category['id'] ?>" aria-label="Default select example" >
            
                        <option selected>เลือกรายการ</option>
                        <?php 
                            $id_c = $res_category['id'];
                            $result_shop = $connect->query("SELECT * FROM pp_shop_stock_api WHERE category = '".$id_c."' ORDER BY price_web asc;");
                            $res_shop = $result_shop->fetch_all(MYSQLI_ASSOC);
                            $i= 1;
                            foreach($res_shop as $res_shops) : 
                        ?>

                        <option value="<?=$res_shops['id'] ?>"><?=$res_shops['name'] ?> </option>
                        <?php endforeach ?>
                    </select>

                    <div class="form-group mt-2">
                        <h6><span id="price_web<?=$res_category['id'] ?>"></span></h6>
                    </div>
                    <div class="form-group">
                        <h6><span id="stock<?=$res_category['id'] ?>"></span></h6>
                    </div>

                </div>
           </div>
            <!-- <center>
                <img src="<?=$res_category['img']?>" alt="<?=$res_category['img']?>" width="70%" height="200px" class="mb-3">
            </center> -->
          
            <div class="col-12 m-2">
                
                <!-- <div id="price_web<?=$res_category['id'] ?>"></div>
                <center><div id="stock<?=$res_category['id'] ?>"></div></center> -->

                <div id="info<?=$res_category['id'] ?>"></div>
        
           </div>


        </div>
        <div class="modal-footer">
            <?php if(!empty($_SESSION['username'])): ?>
            <button type="button" class="btn btn-buyshop" onclick="byshopa(<?=$res_category['id'] ?>)">ซื้อสินค้า</button>
            <?php else: ?>
            <button type="button" class="btn btn-buyshop" onclick="CradURL('./page/login')">เข้าสู่ระบบเพื่อซื้อสินค้า</button>
            <?php endif ?>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<?php endforeach; ?>

<script>

function get_info(id,modal){
// var property = document.getElementById('photo').files[0];
var form_data = new FormData();
form_data.append("id", id);

$.ajax({
    url: 'system/master.php?showinfo',
    method: 'POST',
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    beforeSend: function() {
        $('#msg').html('Loading......');
    },
    success: function(data) {
        console.log(data.info)
        // $( "#info"+modal ).html( data.info );
        if(data.info != null){
            document.getElementById("info"+modal).innerHTML = data.info;
            document.getElementById("price_web"+modal).innerHTML = '<i class="fa-solid fa-sack-dollar text-warning"></i> ราคา: <span class="badge bg-info">'+data.price_web+' บาท</span>';
            // document.getElementById("stock"+modal).innerHTML = "<h4 class='text-center'> สินค้าคงเหลือ"+ data.stock +"ชิ้น </h4>";
            if(data.stock == 0){
                document.getElementById("stock"+modal).innerHTML = '<p class="text-cennter"><i class="fa-solid fa-circle-notch fa-spin text-danger"></i> <span class="badge bg-danger">สินค้าหมด</span></p>';
            }else{
                document.getElementById("stock"+modal).innerHTML = '<p class="text-cennter"><i class="fa-solid fa-box-open text-warning"></i> คงเหลือ : <span class="badge bg-success">'+data.stock+' ชิ้น</span></p>';
            }
        }else{
            document.getElementById("info"+modal).innerHTML ="";
            document.getElementById("price_web"+modal).innerHTML = "";
            document.getElementById("stock"+modal).innerHTML = '';
        }
        // $("#btn").prop("disabled", true);
        // $( "#return" ).html( data );
        // $("#btn").prop("disabled", false); 
    }
});
}

</script>