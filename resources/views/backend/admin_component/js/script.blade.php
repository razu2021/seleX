<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('contents/backend/assets')}}/vendors/popper/popper.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/bootstrap/bootstrap.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/anchorjs/anchor.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/is/is.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/echarts/echarts.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/fontawesome/all.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/lodash/lodash.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/vendors/list.js/list.min.js"></script>
<script src="{{asset('contents/backend/assets')}}/assets/js/theme.js"></script>

<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    Dropzone.autoDiscover = false;

    let myDropzone = new Dropzone("#my-dropzone", {
        url: "/upload",
        autoProcessQueue: false,  // Prevent auto upload
        paramName: "files[]",  // Match the input name
        maxFilesize: 5,  // 5MB max file size
        acceptedFiles: "image/*",  // Accept only images
        addRemoveLinks: true,
        parallelUploads: 10,  // Allow multiple files
        uploadMultiple: true,
    });

    document.querySelector("#my-form").addEventListener("submit", function (e) {
        e.preventDefault();
        myDropzone.processQueue();  // Manually trigger Dropzone upload
    });

    myDropzone.on("sending", function (file, xhr, formData) {
        formData.append("_token", document.querySelector('input[name="_token"]').value);
    });
</script>


