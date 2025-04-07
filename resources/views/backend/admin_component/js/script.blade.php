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
<script src="{{asset('contents/backend/assets')}}/assets/js/custom.js"></script>

<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    // Wait for the DOM to load before adding event listeners
    document.addEventListener("DOMContentLoaded", function() {
        // Get all delete buttons
        const deleteButtons = document.querySelectorAll('.dropdown-item.text-danger');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const formId = 'deleteForm' + id;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't to Delete this Record!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form programmatically if confirmed
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    });
</script>

{{-- <script>
    document.querySelectorAll('.deleteButton').forEach(button => {
    button.addEventListener('click', function() {
        var button = this; // Button clicked
        var id = button.getAttribute('data-id'); // Get the id from data-id attribute

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Disable the button or hide it after clicking
                button.disabled = true; // Disable button
                button.innerHTML = 'Deleting...'; // Optional: Change button text

                // Submit the form programmatically if confirmed
                document.getElementById('deleteForm').submit();
            }
        });
    });
});
</script> --}}



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



{{-- bulk selection and delete  --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const applyBtn = document.getElementById('bulk-apply-btn');
      const actionSelect = document.getElementById('bulk-action-select');
      

  
      applyBtn.addEventListener('click', function () {
        const selectedAction = actionSelect.value;
        const selectedCheckboxes = document.querySelectorAll('input[data-bulk-select-row]:checked');
        let selectedIDs = [];
  
        selectedCheckboxes.forEach(cb => selectedIDs.push(cb.value));
  
        if (!selectedAction || selectedIDs.length === 0) {
          Swal.fire('Warning', 'Please select at least one item and an action.', 'warning');
          return;
        }
  
        if (selectedAction === 'delete') {
          Swal.fire({
            title: 'Are you sure?',
            text: `You are about to DELETE ${selectedIDs.length} items!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete!',
            confirmButtonColor: '#d33'
          }).then((result) => {
            if (result.isConfirmed) {
              sendBulkRequest(selectedIDs, 'delete');
            }
          });
        } else if (selectedAction === 'refund') {
          Swal.fire('Refund', `You selected ${selectedIDs.length} items to refund.`, 'info');
          // sendBulkRequest(selectedIDs, 'refund');
        } else if (selectedAction === 'archive') {
          Swal.fire('Archive', `You selected ${selectedIDs.length} items to archive.`, 'info');
          // sendBulkRequest(selectedIDs, 'archive');
        }
      });

  
      function sendBulkRequest(ids, actionType) {
        fetch("{{ route('category.bulkAction') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({ ids: ids, action: actionType })
        })
        .then(response => response.json())
        .then(data => {
          if(data.success) {
            Swal.fire('Done!', data.message, 'success').then(() => location.reload());
          } else {
            Swal.fire('Error', data.message || 'Something went wrong!', 'error');
          }
        });
      }
    });
  </script>
  