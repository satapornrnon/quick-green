<!-------------------- user modal -------------------->
<div class="modal fade bd-example-modal-lg" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="" class="form-validation" id="user-form" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="edit-user-content">
                        <div class="form-group row">
                            <label for="username" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">ชื่อผู้ใช้งาน<span class="required">*</span> :</label>
                            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                                <input type="text" class="form-control form-control-sm" id="username" name="username" autocomplete="off" data-rule-required="true" data-msg-required="กรุณากรอกชื่อผู้ใช้งาน">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">รหัสผ่าน<span class="required">*</span> :</label>
                            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" autocomplete="off" data-rule-required="true" data-msg-required="กรุณากรอกรหัสผ่าน">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="first_name" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">ชื่อ<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" data-rule-required="true" data-msg-required="กรุณากรอกชื่อ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">นามสกุล<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" data-rule-required="true" data-msg-required="กรุณากรอกนามสกุล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">อีเมล<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="email" name="email" data-rule-required="true" data-msg-required="กรุณากรอกอีเมล" data-rule-email="true" data-msg-email="รูปแบบอีเมลไม่ถูกต้อง">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_type" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">ประเภทผู้ใช้งานระบบ<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <select class="form-control form-control-sm" name="user_type" id="user_type" data-rule-required="true" data-msg-required="กรุณาเลือกประเภทผู้ใช้งานระบบ">
                                <option value="">--เลือกประเภทผู้ใช้งานระบบ--</option>
                                <option value="staff">Staff</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roles_id" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">สิทธิการใช้งาน<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <select class="form-control form-control-sm" name="roles_id" id="roles_id" data-rule-required="true" data-msg-required="กรุณาเลือกสิทธิการใช้งาน">
                                <option value="">--เลือกสิทธิการใช้งาน--</option>
                                @foreach($roles->get() as $role)
                                    <option value="{{ $role->id }}">{{ $role->roles_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">สถานะ<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <select class="form-control form-control-sm" name="status" id="status" data-rule-required="true" data-msg-required="กรุณาเลือกสถานะ">
                                <option value="">--เลือกสถานะ--</option>
                                <option value="active">กำลังทำงาน</option>
                                <option value="inactive">ยกเลิกการทำงาน</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control form-control-sm" id="user_id" name="user_id">

                    <button type="submit" class="btn btn-sm btn-success btn-icon-split" name="submit">
                        <span class="icon text-white-50"><i class="fa-regular fa-circle-check"></i></span>
                        <span class="text">ยืนยัน</span>
                    </button>
                    <button type="submit" class="btn btn-sm btn-secondary btn-icon-split" data-dismiss="modal" aria-label="Close">
                        <span class="icon text-white-50"><i class="fa-regular fa-circle-xmark"></i></span>
                        <span class="text">ยกเลิก</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-------------------- user modal -------------------->

<!-------------------- user modal -------------------->
<div class="modal fade bd-example-modal-lg" id="user-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h5><strong><u>ข้อมูลทั่วไป</u></strong></h5>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>ชื่อผู้ใช้งาน</strong> :</label>
                                <span class="detail username"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>ชื่อ-นามสกุล</strong> :</label>
                                <span class="detail full_name"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>อีเมล</strong> :</label>
                                <span class="detail email"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>ประเภทผู้ใช้งานระบบ</strong> :</label>
                                <span class="detail user_type"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>สิทธิการใช้งาน</strong> :</label>
                                <span class="detail roles_name"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="subject"><strong>สถานะ</strong> :</label>
                                <span class="detail status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-secondary btn-icon-split" data-dismiss="modal" aria-label="Close">
                    <span class="icon text-white-50"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span class="text">ยกเลิก</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-------------------- user modal -------------------->