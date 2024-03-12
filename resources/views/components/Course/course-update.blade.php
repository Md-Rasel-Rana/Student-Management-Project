<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Course Name *</label>
                                <input type="text" class="form-control" id="cname1">

                                <label class="form-label mt-3">Course syllabus *</label>
                                <input type="text" class="form-control" id="csyllabus2">

                                <label class="form-label mt-3">Student Duration *</label>
                                <input type="text" class="form-control" id="cduration3">


                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>
   
 async function FillUpUpdateForm(id){
    document.getElementById('updateID').value=id;
    //console.log(id);
    let res = await axios.post('/course-ID',{id:id});
    console.log(res.data);
    let name = document.getElementById('cname1').value = res.data['name'];
    let syllabus = document.getElementById('csyllabus2').value = res.data['syllabus'];
    let duration = document.getElementById('cduration3').value = res.data['duration'];

    }

    async function Update() {
    let id = document.getElementById('updateID').value;
    let name = document.getElementById('cname1').value;
    let syllabus = document.getElementById('csyllabus2').value;
    let duration = document.getElementById('cduration3').value;

    if (name === '' || syllabus === '' || duration === '') {
        errorToast('All fields are required');
    } else {
        document.getElementById('update-modal-close').click();
        try {
            let res = await axios.post('/course-update', {
                id: id,
                name: name,
                syllabus: syllabus,
                duration: duration
            });

            if (res.status === 200 && res.data.status === 'success') {
                document.getElementById("update-form").reset();
                successToast(res.data.message);
                await getList();
            } else {
                errorToast("Request failed!")
            }
        } catch (error) {
            console.error("Error:", error);
            errorToast("Request failed!");
        }
    }
}


</script>

