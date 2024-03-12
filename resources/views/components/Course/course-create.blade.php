<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Course Name *</label>
                                <input type="text" class="form-control" id="cname">
                                <label class="form-label">Course Syllabus *</label>
                                <input type="text" class="form-control" id="csyllabus">
                                <label class="form-label">Course Duration *</label>
                                <input type="text" class="form-control" id="cduration">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn  bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>
<script>
    async function Save(){
        var cname = document.getElementById("cname").value;
        var csyllabus = document.getElementById("csyllabus").value;
        var cduration = document.getElementById("cduration").value;
        if(cname.length == 0){
            errorToast("Please Enter Course Name");
        }
        else if(csyllabus.length == 0){
            errorToast("Please Enter Course Syllabus");
        }
        else if(cduration.length == 0){
            errorToast("Please Enter Course Duration");
        } else {
            document.getElementById('modal-close').click();
            try {
                var res = await axios.post('/course-create',{
                    cname: cname,
                    csyllabus: csyllabus,
                    cduration: cduration
                });

                if(res.status === 201 && res.data.status === 'success'){
                    document.getElementById("update-form").reset();
                    successToast("Request Created Successfully!")
                    await getList();
                }
                else{
                    errorToast("Request Failed!")
                }
            } catch (error) {
                console.error("Error:", error);
                errorToast("Request Failed!");
            }
        }
    }
</script>
