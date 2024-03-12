<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Batch Name *</label>
                                <input type="text" class="form-control" id="bname1">

                                <label class="form-label">Course Name *</label>
                                <select type="text" class="form-control form-select" id="cName2">
                                    <option value="">Select Course </option>
                                </select>

                                <label class="form-label mt-3">Batch Start Date *</label>
                                <input type="text" class="form-control" id="bStart3">


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

async function UpdateFillCategoryDropDown(){
    let res = await axios.get("/course-list")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#cName2").append(option);
    })
}
   
 async function FillUpUpdateForm(id){

    document.getElementById('updateID').value=id;
    UpdateFillCategoryDropDown();
    let res = await axios.post('/batch-ID',{id:id});

    console.log(res.data);
   
    let batch_name = document.getElementById('bname1').value = res.data['batch_name'];
    let course_id = document.getElementById('cName2').value = res.data['course_id'];
    let start_date = document.getElementById('bStart3').value = res.data['start_date'];

    }

    async function Update(){

        let id = document.getElementById('updateID').value;
        let batch_name = document.getElementById('bname1').value;
        let course_id  = document.getElementById('cName2').value;
        let start_date = document.getElementById('bStart3').value;
        if(batch_name=='' || course_id=='' || start_date==''){
            errorToast('All fields are required');
        }else{
            document.getElementById('update-modal-close').click();
        let res = await axios.post('/batch-update',{id:id,batch_name:batch_name,course_id:course_id,start_date:start_date});
        if(res.status===200 && res.data.status==='success'){
                document.getElementById("update-form").reset();
                successToast(res.data.message);
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }

}
</script>

