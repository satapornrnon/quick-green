<div class="interested-card">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="title-md">
            <span class="text-green">สนใจ</span> สมัครสินเชื่อ
        </h2>
    </div>
    
    <hr>

    <div class="alert alert-info" role="alert">
        <strong> กรอกข้อมูลเพื่อ <span class="text-green typing"></span></strong>
    </div>

    <div class="alert alert-danger notice-input" role="alert">
        <span><strong>หมายเหตุ :</strong> กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย <span class="text-red"><strong>*</strong></span></span>
    </div>

    <form action="" class="form-validation" method="POST" role="form">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="first_name">ชื่อ<span class="required">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" data-rule-required="true" data-msg-required="กรุณากรอกชื่อ">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="last_name">นามสกุล<span class="required">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" data-rule-required="true" data-msg-required="กรุณากรอกนามสกุล">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="mobile">เบอร์โทรศัพท์มือถือ<span class="required">*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" data-rule-required="true" data-msg-required="กรุณากรอกเบอร์โทรศัพท์มือถือ" data-rule-minlength="10" data-msg-minlength="กรุณากรอกเบอร์โทรศัพท์มือถือไม่เกิน 10 ตัวอักษร" data-rule-number="true" data-msg-number="กรุณากรอกข้อมูลเป็นตัวเลขเท่านั้น">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="time_callback">ช่วงเวลาที่สะดวกให้ติดต่อกลับ<span class="required">*</span></label>
                    <select class="form-control" id="time_callback" name="time_callback" data-rule-required="true" data-msg-required="กรุณาเลือกช่วงเวลาที่สะดวก">
                        <option value="" selected>เลือกช่วงเวลา</option>
                        <!-- <?php
                            // foreach ($time_callback as $key => $value) {
                            //     echo '<option value="'. $key .'">'. $value .'</option>';
                            // }
                        ?> -->
                    </select>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="more_information">กรอกข้อมูลเพิ่มเติม</label>
                    <textarea class="form-control" id="more_information" name="more_information"></textarea>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 accept-policy">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <div class="checkbox path">
                            <input type="checkbox" id="accept_policy" name="accept_policy" value="1">
                            <svg viewBox="0 0 21 21"><path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path></svg>
                        </div>
                        <label for="accept_policy" class="form-check-label checkbox-label">ข้าพเจ้ายินยอมให้ข้อมูลผ่านช่องทางออนไลน์ ข้อมูลของท่านจะถูกจัดเก็บและรักษาตามนโยบายคุ้มครองข้อมูลส่วนบุคคล (Data Privacy Policy) อ่านรายละเอียดเพิ่มเติม <a href="#" class="text-green" target="_blank"> คลิกที่นี่</a></label>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                <div class="remark">
                    <span>*หลังจากที่กดลงทะเบียนแล้ว กรุณารอเจ้าหน้าที่ติดต่อกลับ</span>
                </div>
                <button type="submit" class="btn btn-interested-submit"><i class="far fa-check-circle"></i> ยืนยันการลงทะเบียน</button>
            </div>
        </div>
    </form>
</div>