<!-------------------- interested edit modal -------------------->
<div class="modal fade bd-example-modal-xl interested-modal" id="interested-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">       
            <form action="" class="form-validation" id="interested-form" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="title">อัพเดทสถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 modal-border-right">
                            <h5><strong><u>ข้อมูลทั่วไป</u></strong></h5>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>วัน-เวลาที่ลงทะเบียน</strong> :</label>
                                    <span class="detail datetime"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เลขที่ลงทะเบียน</strong> :</label>
                                    <span class="detail interested_code"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>ผลิตภัณฑ์</strong> :</label>
                                    <span class="detail product_name"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>ชื่อ-นามสกุล</strong> :</label>
                                    <span class="detail full_name"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เบอร์โทรศัพท์</strong> :</label>
                                    <span class="detail mobile"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>สถานะ</strong> :</label>
                                    <span class="detail interested_status"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เวลาที่สะดวก</strong> :</label>
                                    <span class="detail time_callback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between">    
                                <h5><strong><u>เพิ่มข้อมูล</u></strong></h5>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                                <div class="form-group">
                                    <label for="interested_status">สถานะ :</label>
                                    <select class="form-control form-control-sm" id="interested_status" name="interested_status" data-rule-required="true" data-msg-required="กรุณาเลือกสถานะ">
                                        <option value="" selected disabled>เลือกสถานะ</option>
                                        <option value="completed">เสร็จสิ้น</option>
                                        <option value="cancelled">ยกเลิก</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="remark">หมายเหตุ :</label>
                                    <textarea class="form-control" id="remark" name="remark"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control form-control-sm" id="interested_id" name="interested_id">
                    
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
<!-------------------- interested edit modal -------------------->

<!-------------------- interested view modal -------------------->
<div class="modal fade bd-example-modal-xl interested-view-modal" id="interested-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">       
            <form action="" class="form-validation" id="interested-view-form" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="title">รายละเอียด</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 modal-border-right">
                            <h5><strong><u>ข้อมูลทั่วไป</u></strong></h5>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>วัน-เวลาที่ลงทะเบียน</strong> :</label>
                                    <span class="detail datetime"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เลขที่ลงทะเบียน</strong> :</label>
                                    <span class="detail interested_code"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>ผลิตภัณฑ์</strong> :</label>
                                    <span class="detail product_name"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>ชื่อ-นามสกุล</strong> :</label>
                                    <span class="detail full_name"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เบอร์โทรศัพท์</strong> :</label>
                                    <span class="detail mobile"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>สถานะ</strong> :</label>
                                    <span class="detail interested_status"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>เวลาที่สะดวก</strong> :</label>
                                    <span class="detail time_callback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between">    
                                <h5><strong><u>ข้อมูลเพิ่มเติม</u></strong></h5>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                                <div class="d-flex justify-content-between">
                                    <label class="subject"><strong>หมายเหตุ</strong> :</label>
                                    <span class="detail remark"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary btn-icon-split" data-bs-dismiss="modal">
                        <span class="icon text-white-50"><i class="fa-regular fa-circle-xmark"></i></span>
                        <span class="text">ยกเลิก</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-------------------- interested view modal -------------------->