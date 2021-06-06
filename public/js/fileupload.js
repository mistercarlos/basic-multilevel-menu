/*
 * JS file to upload excel table files to the server so as to 
 * update table datas
 *
 * Function to initialize everything related to db files upload
*/
function fileuploadInit({ allowedExtension, isAdminPage }) {
    document.querySelectorAll('.invalid-feedback').forEach((div) => {
        div.innerHTML = "extensions acceptées: " + allowedExtension;
    });

    /* onchange event on file inputs */
    $("input[type='file']").on('change', function () {
        let input = this;
        if (input.value !== null) {
            let filename = input.value.replaceAll('\\', '/');
            let start = filename.lastIndexOf('/') + 1;
            filename = filename.slice(start);
            input.nextElementSibling.innerHTML = filename;
            let extension = filename.slice(filename.lastIndexOf('.')).toLowerCase();

            /*  check if file extension is allowed  */
            if (allowedExtension.split(" ").indexOf(extension) == -1) {
                input.classList.add('is-invalid');
                $('#' + input.id).parents('div.input-group')[0].classList.add('is-invalid');
                $('#' + input.id).parents('div.custom-file')[0].nextElementSibling.innerHTML = "";
            } else {
                input.classList.remove('is-invalid');
                $('#' + input.id).parents('div.input-group')[0].classList.remove('is-invalid');
                if (isAdminPage) {
                    $('#' + input.id).parents('div.custom-file')[0].nextElementSibling.innerHTML = `<button name="admin_upload" type="submit" class="btn btn-outline-info" id="${input.getAttribute('aria-describedby')}"><i class="fa fa-cloud-upload-alt"></i></button>`;
                } else {
                    $('#' + input.id).parents('div.custom-file')[0].nextElementSibling.innerHTML = `<button name="school_upload" type="submit" class="btn btn-outline-info" data-toggle="tooltip" title="Envoyer" id="${input.getAttribute('aria-describedby')}"><i class="fa fa-cloud-upload-alt"></i></button>`;
                }
            }
        }
    });
}
