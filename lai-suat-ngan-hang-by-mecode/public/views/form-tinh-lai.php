<?php 
global $lsnh_settings; 

?>
<div class="block-tinhlaivay">
	<div id="innter-tinhlaivay" class="box-tinhlaivay">
	    <div class="col-cot box-left">
	        <div class="item-thamso">
	            <div class="label-title">Tháng mua</div>
	            <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text" data-prefix="tháng " data-min="1" data-max="12" class="jsslider" name="thang_mua" value="6" />
	                </div>
	                <div  class="group-nhaplieu"><input  type="number" value="6" id="thang_mua" class="calc-input"> 
	                    
	                </div>
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="label-title">Năm mua</div>
	            <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text" data-prefix="năm " data-min="2020" data-max="2050" class="jsslider" name="nam_mua" value="2020" />
	                </div>
	                <div  class="group-nhaplieu"><input id="nam_mua" value="2020" type="number"  class="calc-input"> 
	                    
	                </div>
	                
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="label-title">Giá trị BĐS chưa VAT (tỷ VNĐ)</div>
	            <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text" data-min="1" data-step=".1" data-postfix=" tỷ" data-max="10" class="jsslider" name="gia_tri_bds" value="1.653" />
	                </div>
	                <div  class="group-nhaplieu"><input id="gia_tri_bds" value="1" step=".1" type="number"  class="calc-input"> 
	                    <label-title  for="price" class="unit">tỷ</label-title>
	                </div>
	                
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="label-title">Tỷ lệ vay (%)</div>
	            <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text"  data-postfix=" %" data-min="0" data-max="80" class="jsslider" name="ti_le_vay" value="50" />
	                </div>
	                <div  class="group-nhaplieu"><input id="ti_le_vay" value="50"  type="number"  class="calc-input"> 
	                    <label-title  for="price" class="unit">%</label-title>
	                </div>
	                
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="label-title">Thời hạn vay (năm)</div>
	            <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text" data-min="1" data-postfix=" năm" data-max="35" class="jsslider" name="thoi_han_vay" value="10" />
	                </div>
	                <div  class="group-nhaplieu"><input id="thoi_han_vay" value="10" type="number"  class="calc-input"> 
	                    <label-title  for="price" class="unit">năm</label-title>
	                </div>
	                
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="label-title">Lãi suất %/năm</div>
	            <div class="calc-wrapper">
	                <div class="dropdown "> 
	                    <select name="ngan_hang">
	                        <option value="7">Tùy chỉnh</option>
	                    </select>
	                </div>
	                
	                <div  class="group-nhaplieu">
	                    <input  type="number" step=".1" id="interest" value="7" class="calc-input"> 
	                    <label-title  for="interest" class="unit">%</label-title>
	                </div>
	            </div>
	        </div>
	        <div class="item-thamso anhang">
	            <div class="label-title">Ân Hạn Gốc(tháng)</div>
	           <div class="calc-wrapper">
	                <div class="slider-container range-vung">
	                     <input type="text" data-min="0" data-max="48" data-postfix=" tháng" class="jsslider" name="so_thang_an_hang" value="0" />
	                </div>
	                <div  class="group-nhaplieu"><input id="so_thang_an_hang" value="0" type="number"  class="calc-input"> 
	                    
	                </div>
	            </div>
	        </div>
	        <div class="item-thamso">
	            <div class="option-group">
	                <div class="option">
	                    <input type="radio" id="du_no_giam_dan" checked="" name="kieu_tra_no" value="du_no_giam_dan" />
	                    <label for="du_no_giam_dan" class="label-title">
	                        Theo dư nợ giảm dần
	                    </label>
	                </div>
	                <div class="option">
	                    <input type="radio" id="du_no_ban_dau" name="kieu_tra_no" value="du_no_ban_dau" />
	                    <label for="du_no_ban_dau" class="label-title">
	                        Thanh toán đều hàng tháng
	                    </label>
	                </div>
	            </div>
	        </div>
	        <div class="item-thamso" style="display: none"><button class="btn-primary btn-medium btn-black-outline">Xem kết quả</button></div>
	    </div>
	    <div class="col-cot box-right">
	        <h2><?php echo $lsnh_settings['tieu_de_chuc_mung']; ?></h2>
	        <div class="chart-box">
	            <div class="hinhavatar1"><img src="<?php echo LSNH_PLUGIN_URL . 'public/images/home.png'; ?>" class="hinhavatar" /></div>
	           
	            <div class="chart-description">
	                <div class="chart-legend">
	                    <div class="label-title">Giá có VAT</div>
	                    <div class="value color1" id="gia_co_vat"></div>
	                </div>
	                <div class="chart-legend">
	                    <div class="label-title">Vốn ban đầu <span id="phan_tram_von_ban_dau"></span>%</div>
	                    <div class="value color1" id="von_ban_dau"></div>
	                </div>
	                <div class="chart-legend">
	                    <div class="label-title">Số tiền vay <span id="phan_tram_vay"></span>%</div>
	                    <div class="value color2" id="so_tien_vay"></div>
	                </div>
	                <div class="chart-legend">
	                    <div class="label-title">Trung bình tháng</div>
	                    <div class="value color3" id="trung_binh_thang"></div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="down-payment">
	            <h3 class="h3center"><?php echo $lsnh_settings['tieu_de_tren_bang_chi_tiet']; ?> <span class="xmmonth" id="thoi_gian_bat_dau"></span></h3>
	        </div>
	        <div class="tablewrapper cpsscroll">
	        	<table class="tablelai" id="tablelai">
		            <thead>
		                <th colspan="2">Kỳ trả nợ</th>
		                <th>Gốc</th>
		                <th>Lãi</th>
		                <th>Gốc + Lãi</th>
		            </thead>
		            <tbody id="tablelai_content">
		                
		            </tbody>
		        </table>
	        </div>
	        
	        <div class="down-payment" style="display: none">
	            <button href="#" class="btn-primary btn-medium btn-red open-popup">
	                <i class="zmdi zmdi-download"></i>
	                Tải bảng thanh toán từng tháng
	            </button>
	        </div>
	    </div>
	</div>
	
</div>

<div class="custom-model-main">
    <div class="custom-model-inner">        
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
               <div class="title-popup">
               	<div class="inner-title-popup">Nhận bảng tính đầy đủ</div>
               	
               </div>
               <div class="note">Vui lòng điền thông tin để nhận bảng tính đầy đủ</div>

               <div class="inputbox">
	               	<input type="text" id="user_name" name="user_name" class="required red">
	               	<label for="user_name" class="">Họ và Tên</label>               	
               </div>
               <div class="inputbox">
	               	<input type="text" id="user_phone" name="user_phone" class="required red">
	               	<label for="user_phone" class="">Số Điện Thoại</label>               	
               </div>
               <div class="inputbox">
	               	<input type="text" id="user_email" name="user_email" class="required red">
	               	<label for="user_email" class="">Email</label>               	
               </div>
               <div class="note" style="color:red" id="formerror"></div>
               <button href="#" id="btn-nhanbangtinh" class="btn-primary btn-medium btn-red open-popup">
	                <i class="zmdi zmdi-download"></i>
	               	NHẬN BẢNG TÍNH
	            </button>

            </div>
        </div>  
    </div>  
    <div class="bg-overlay"></div>
</div> 