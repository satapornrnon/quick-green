<div class="modal fade bd-example-modal-lg" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="" class="form-validation" id="product-form" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group row">
                        <label for="product_name" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">ชื่อผลิตภัณฑ์<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="product_name" name="product_name" data-rule-required="true" data-msg-required="กรุณากรอกชื่อผลิตภัณฑ์">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_description" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">รายละเอียดผลิตภัณฑ์<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <textarea class="form-control" id="product_description" name="product_description" data-rule-required="true" data-msg-required="กรุณากรอกรายละเอียดผลิตภัณฑ์"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_status" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">สถานะการใช้งาน :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <div class="form-group mt-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="product_status_on" name="product_status" value="on" checked>
                                    <label class="form-check-label" for="product_status_on">เปิด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="product_status_off" name="product_status" value="off">
                                    <label class="form-check-label" for="product_status_off">ปิด</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_image" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">รูปภาพ<span class="required">*</span> : </label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <div class="preview-product-image mb-2"></div>
                            <input type="file" class="file product_image_file d-none" id="product_image" name="product_image" accept="">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="product_image_name" name="product_image_name" placeholder="Upload File" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-select-file" name="product_image_browse">Browse</button>
                                </div>
                            </div>
                            <label class="form_alert_remark">*หมายเหตุ ขนาดที่เหมาะกับการอัพโหลด 500*500 pixel ขนาดไฟล์ต้องไม่เกิน 1MB</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_cover" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">รูปภาพ Cover : </label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <div class="preview-product-cover mb-2"></div>
                            <input type="file" class="file product_cover_file d-none"" id="product_cover" name="product_cover" accept="">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="product_cover_name" name="product_cover_name" placeholder="Upload File" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-select-file" name="product_cover_browse">Browse</button>
                                </div>
                            </div>
                            <label class="form_alert_remark">*หมายเหตุ ขนาดที่เหมาะกับการอัพโหลด 1900*300 pixel ขนาดไฟล์ต้องไม่เกิน 1MB</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control form-control-sm" id="product_id" name="product_id">

                    <button type="submit" class="btn btn-sm btn-success btn-icon-split" name="submit">
                        <span class="icon text-white-50"><i class="fa-regular fa-circle-check"></i></span>
                        <span class="text">ยืนยัน</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary btn-icon-split" data-bs-dismiss="modal">
                        <span class="icon text-white-50"><i class="fa-regular fa-circle-xmark"></i></span>
                        <span class="text">ยกเลิก</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>