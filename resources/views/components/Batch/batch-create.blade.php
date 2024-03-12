<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Batch</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Batch Name *</label>
                                <input type="text" class="form-control" id="bName">
                                <label class="form-label">Course Name *</label>
                                <select type="text" class="form-control form-select" id="cName">
                                    <option value="">Select Course </option>
                                </select>
                                <label class="form-label">Batch Start Date *</label>
                                <input type="date" class="form-control" id="bStart">
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
    let res = await axios.get("/course-list")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#cName").append(option);
    })
}

    async function Save(){
        var batch_name = document.getElementById("bName").value;
        var course_id = document.getElementById("cName").value;
        var bStartDate = document.getElementById("bStart").value;
        if(batch_name.length ==0){
            errorToast("Please Enter Student Name");
        }
        else if(course_id.length ==0){
            errorToast("Please Enter Student Mobile");
        }
        else if(bStartDate.length ==0){
            errorToast("Please Enter Student Address");
        }else{
        document.getElementById('modal-close').click();
        var res = await axios.post('/batch-create',{
            batch_name:batch_name,
            start_date:bStartDate,
            course_id:course_id});

            if(res.status===200 && res.data.status == "success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }
    }
    
</script>
