

/**------  select & Deselect all ------- */
document.getElementById('select-all').addEventListener('click',function(){
    const checkboxes = document.querySelectorAll('input[data-bulk-select-row]');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
})



/**-----JavaScript: Apply Bulk Action ----------- */

document.addEventListener('DOMContentLoaded',function(){

    // select action id and select apply button 
    const actionSelect = document.getElementById('bulk-action-select');
    const applybtn = document.getElementById('bulk-apply-button');

    applybtn.addEventListener('click',function(){

        const selectedAction = actionSelect.value;
        const selectedCheckBox = document.querySelectorAll('input[data-bulk-select-row]:checked');

        let selectedIDs = [];

        selectedCheckBox.forEach(cb=> selectedIDs.push(cb.value))

        if(!selectedAction || selectedIDs.length===0){
            Swal.fire('Warning', 'Please select at least one item and an action.', 'warning');
            return;
        };



        ////////------------

        if(selectedAction === 'delete'){

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


        }else if(selectedAction === 'active'){
            Swal.fire('Activate', `You selected ${selectedIDs.length} items to activate.`, 'info');
        }else if(selectedAction === 'archive'){
            Swal.fire('Archive', `You selected ${selectedIDs.length} items to archive.`, 'info');
        }


    });  // apply button end 

    // Function to send the request to server 

    function sendBulkRequest(ids, actionType) {
        fetch(bulkActionUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
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
    // function end 


});




// ---------------------  live s earch code is here -------------






