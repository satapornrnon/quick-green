//=========== UPLOAD IMAGE 
function upload_file_image(e, this_field, field_name, preview, file_size) {

    var validation_type = ["png", "jpeg", "jpg", "gif", "webp"];
    var validation_size = {"1" : "1048576", "2" : "2097152", "3" : "3145728", "4" : "4194304", "5" : "5242880"}
    var size_limit = {"1" : "1MB", "2" : "2MB", "3" : "3MB", "4" : "4MB", "5" : "5MB"}
    var file_type = $(this_field).val().split('.').pop();

    if (validation_type.indexOf(file_type) == -1) {
        swal ("WARNING", 'อัปโหลดไฟล์ อนุญาตเฉพาะ PNG, JPEG, JPG, GIF, WEBP', "warning");
        clear_data_image();
    } else if (this_field.files[0].size > validation_size[file_size]) { 
        swal ("WARNING", 'ขนาดไฟล์เกิน '+ size_limit[file_size], "warning");
        clear_data_image();
    } else {
        $(field_name).val(e.target.files[0].name);

        var reader = new FileReader();
        reader.readAsDataURL(this_field.files[0]);
        reader.onload = function(e) {
            $(preview).html('');

            var preview = '<img class="img-thumbnail" src="'+ e.target.result +'" alt="Preview image" width="200">';
            $(preview).append(preview);
        }
    }

}