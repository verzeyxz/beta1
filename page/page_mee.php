
<div class="col-md-12 col-sm-12 col-12 mt-4 mb-4">
    <div class="crad crad_tung rounded-3" style="background: rgba(255, 255, 255);">
        <h4 class="m-2"><i class='bx bxs-shopping-bag'></i> รายการสั่งซื้อ <span class="text-black-50" style="font-size: 16px;">( ล่าสุด )</span></h4><hr>
        <marquee direction="left">
            <div class=" d-flex flex-row ">
                <?php
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://byshop.me/api/history',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 1,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                //ดึกรายการซื้อสินค้า API ใส่ keyapi เพื่อแสดงรายการขาย
                CURLOPT_POSTFIELDS => array('keyapi' => $web_rows['web_keyapi']),  
                CURLOPT_HTTPHEADER => array(
                    'Cookie: PHPSESSID=u8df3d96ij8re36ld76cl64t3p'
                ),
                ));


                    $response = curl_exec($curl);
                    $listbuy = json_decode($response);
                    $product_list_buy = '';
                    //กำหนดรายการขายล่าสุด 10 รายการ
                    for ($i=0; $i < 20 ; $i++) { 
                        $product_list_buy .= '

                        <div class=" d-flex mr-5 mt-3 text-black"> <br>  
                        <img class="img-fluid rounded" style="margin:0 auto;  height: 50px;" src="https://byshop.me/buy/img/img_app/'. substr ($listbuy[$i]->name ,0,2).'.png">
                        <span><b>&nbsp;&nbsp;&nbsp;'. $listbuy[$i]->name .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        <br>&nbsp;&nbsp;&nbsp;'. $listbuy[$i]->time .'<br>
                        <b><p style="font-size: 13px">&nbsp;&nbsp;<span class="rounded-pill badge bg-success">&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i> ขายแล้ว !! &nbsp;&nbsp;</span></b></p>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                                                ';
                                            }
                    
                    
                    // แสดงรายการขาย
                    echo $product_list_buy;
                    curl_close($curl);
                ?>


                            
                        </div>

                </div>

                    
            </div>
        </marquee>
    </div>
</div>

