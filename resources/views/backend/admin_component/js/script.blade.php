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



{{--   image preview and deleter or remove item --}}
<script>
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('previewContainer');

    imageInput.addEventListener('change', function () {
        previewContainer.innerHTML = ''; // পুরাতন preview clear

        Array.from(this.files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const col = document.createElement('div');
                    col.classList.add('col-md-3', 'position-relative', 'mb-3');

                    col.innerHTML = `
                        <img src="${e.target.result}" class="img-fluid rounded shadow-sm border" style="height: 100px;with:auto; object-fit: cover;">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-btn" data-index="${index}">X</button>
                    `;

                    previewContainer.appendChild(col);
                };

                reader.readAsDataURL(file);
            }
        });
    });

    // Remove Preview Item (UI only)
    previewContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-btn')) {
            const index = e.target.getAttribute('data-index');
            const dt = new DataTransfer();

            const files = imageInput.files;
            Array.from(files).forEach((file, i) => {
                if (i != index) {
                    dt.items.add(file); // যেটা remove হয়নি সেটা রাখো
                }
            });

            imageInput.files = dt.files;
            e.target.parentElement.remove(); // UI থেকে remove
        }
    });
</script>
