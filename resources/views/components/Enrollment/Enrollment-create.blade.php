<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Enrollment Student</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Enrollment No *</label>
                                <input type="text" class="form-control" id="enroll_no">

                              
                                <label class="form-label">Batch Name *</label>
                                <select type="text" class="form-control form-select" id="batch_id">
                                    <option value="">Select Batch </option>
                                </select>

                                <label class="form-label">Student Name *</label>
                                <select type="text" class="form-control form-select" id="student_id">
                                    <option value="">Select Student </option>
                                </select>

                                <label class="form-label"> Enrollment Fee *</label>
                                <input type="text" class="form-control" id="fee">
                              
                                <label class="form-label"> Enrollment Start Date *</label>
                                <input type="date" class="form-control" id="enroll_date">
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
    
    FillCategoryDropDown();
async function FillCategoryDropDown(){
    let res = await axios.get("/student-list")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#student_id").append(option);
    })
}

    FillCategoryDropDown1();
async function FillCategoryDropDown1(){
    let res = await axios.get("/batch-list")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['batch_name']}</option>`
        $("#batch_id").append(option);
    })
}

    async function Save(){
        var batch_id = document.getElementById("batch_id").value;
        var student_id = document.getElementById("student_id").value;
        var enroll_no = document.getElementById("enroll_no").value;
        var enroll_date = document.getElementById("enroll_date").value;
        var fee = document.getElementById("fee").value;
        if(student_id.length ==0){
            errorToast("Please Enter Enrollment No ");
        }
        else if(batch_id.length ==0){
            errorToast("Please Enter Student Name");
        }
        else if(enroll_date.length ==0){
            errorToast("Please Enter Course Name");
        }
        else if(enroll_no.length ==0){
            errorToast("Please Enter Enrollment Date ");
        }
        else if(fee.length ==0){
            errorToast("Please Enter Enrollment Fee");
        }

        else{
        document.getElementById('modal-close').click();
        var res = await axios.post('/enrollment-create',{
            batch_id:batch_id,
            student_id:student_id,
            enroll_no:enroll_no,
            enroll_date:enroll_date,
            fee:fee
        });

            if(res.status===200 && res.data.status == "success"){
                successToast(res.data.message);
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }
    }
    
</script>
