<!-------------------- roles modal -------------------->
<div class="modal fade bd-example-modal-lg" id="roles-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="" class="form-validation" id="roles-form" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group row">
                        <label for="roles_name" class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-form-label">บทบาท<span class="required">*</span> :</label>
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="roles_name" name="roles_name" data-rule-required="true" data-msg-required="กรุณากรอกบทบาท">
                        </div>
                    </div>
                    <div class="row">
                        <label for="can_manage_all" class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-form-label">เลือก :</label>
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                            <div class="form-group mt-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check-all" type="checkbox" id="can_manage_all" name="can_manage_all" value="1">
                                    <label class="form-check-label" for="can_manage_all">ทั้งหมด</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach(config('myarrays.roles_check') as $key => $value)
                        <div class="row">
                            <label for="<?php echo $key; ?>" class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-form-label"><?php echo $value; ?> :</label>
                            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                                <div class="form-group mt-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input check-single" type="checkbox" id="can_view_<?php echo $key; ?>" name="can_view_<?php echo $key; ?>" value="1">
                                        <label class="form-check-label" for="can_view_<?php echo $key; ?>">ดู</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input check-single" type="checkbox" id="can_create_<?php echo $key; ?>" name="can_create_<?php echo $key; ?>" value="1">
                                        <label class="form-check-label" for="can_create_<?php echo $key; ?>">เพิ่ม</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input check-single" type="checkbox" id="can_edit_<?php echo $key; ?>" name="can_edit_<?php echo $key; ?>" value="1">
                                        <label class="form-check-label" for="can_edit_<?php echo $key; ?>">แก้ไข</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input check-single" type="checkbox" id="can_deleted_<?php echo $key; ?>" name="can_deleted_<?php echo $key; ?>" value="1">
                                        <label class="form-check-label" for="can_deleted_<?php echo $key; ?>">ลบ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control form-control-sm" id="roles_id" name="roles_id">

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
<!-------------------- roles modal -------------------->

<!-------------------- roles view modal -------------------->
<div class="modal fade bd-example-modal-lg" id="roles-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
                    <div class="table-responsive" style="overflow-y: auto;">
                        <table class="table table-hover display nowrap" id="table_permissions">
                            <thead class="text-center">
                                <td><strong>สิทธิการใช้งาน</strong></td>
                                <td><strong>ดู</strong></td>
                                <td><strong>เพิ่ม</strong></td>
                                <td><strong>แก้ไข</strong></td>
                                <td><strong>ลบ</strong></td>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary btn-icon-split" data-bs-dismiss="modal">
                    <span class="icon text-white-50"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span class="text">ยกเลิก</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-------------------- roles view modal -------------------->