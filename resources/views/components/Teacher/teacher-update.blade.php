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
                                <label class="form-label">Student Name *</label>
                                <input type="text" class="form-control" id="tname">

                                <label class="form-label mt-3">Student Mobile *</label>
                                <input type="text" class="form-control" id="tphone">

                                <label class="form-label mt-3">Student Address *</label>
                                <input type="text" class="form-control" id="tAddress">


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
    let res = await axios.post('/teacher-ID',{id:id});
    console.log(res.data);
    let name = document.getElementById('tname').value = res.data['name'];
    let mobile = document.getElementById('tphone').value = res.data['phone'];
    let address = document.getElementById('tAddress').value = res.data['address'];

    }

    async function Update(){

        let id = document.getElementById('updateID').value;
        let name = document.getElementById('tname').value;
        let mobile = document.getElementById('tphone').value;
        let address = document.getElementById('tAddress').value;
        if(name=='' || mobile=='' || address==''){
            errorToast('All fields are required');
        }else{
            document.getElementById('update-modal-close').click();
        let res = await axios.post('/teacher-update',{id:id,name:name,phone:mobile,address:address});
        if(res.status===200 && res.data===1){
                document.getElementById("update-form").reset();
                successToast("Request Update successfully !")
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }

}
</script>

