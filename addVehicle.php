<style type="text/css">
  span.select2-selection.select2-selection--single {
    height: auto;
  }
  #imgupload{
    margin-left: 8px;
  }
</style>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/topbar'); ?>


<!-- include side bar start here -->

<?php if ($this->session->userdata('user_basic') != '') {
  $this->load->view('includes/sidebar');
} ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Vehicle</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?php $year = date("Y");
  $count = $year - 30; ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" id="vehiclessave" action="<?php echo $this->config->item('base_url') . "vehicles/Added"; ?>">
                <div class="box box-default">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputStatus">Year</label>
                          <select id="VehicleYear" name="VehicleYear" class="form-control  select2">
                            <option selected value="0">Select Vehicle Year</option>
                            <?php
                            for ($i = $year; $i >= $count; $i--) { ?>
                              <option value="<?php echo $i; ?>"><?php echo  $i; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group" id="VMake">
                          <label for="inputStatus">Make</label>
                          <span>  <a  type="button" onclick="addMake()" class=" "> Add</a>  </span>/
                          <span>  <a  type="button" onclick="editMake()" class=" ">Edit</a>  </span>
                          <select id="VehicleMake" name="VehicleMake" class="form-control  select2">
                            <option selected value="0">Select Vehicle Make</option>
                            <?php foreach ($vehiclesMakeList as $vehMList)
                            // <?php foreach($partIDs as $partname => $partID)
                            { ?> <option value="<?php echo $vehMList->MakeID; ?>"><?php echo $vehMList->MakeName; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group" style="display:none" id="AMake">
                          <label for="inputStatus">Make</label>
                           <span style="padding-left: 4px"> <a  type="button" onclick="closeAMake()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-11">
                                <input type="text" class="form-control" id="Make" name="Make" placeholder="Make">
                              </div>
                              <div class="col-1">
                                 <button id="Makesave" type="button" onclick="saveMake()" class="btn btn-primary btn-md ">Save</button>
                              </div>
                            </div>
                        </div>
                        <div class="form-group" style="display:none" id="EvMake">
                          <label for="inputStatus">Edit Make</label>
                           <span style="padding-left: 4px"> <a  type="button" onclick="closeEMake()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-10">
                                <input type="text" class="form-control" name="EMake" id="EMake" placeholder="Make">
                              </div>
                              
                              <div class="col-1">
                                 <button id="EditMakesave" type="button" onclick="updateMake()" class="btn btn-primary btn-md ">Update</button>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="text" class="form-label">Model</label>
                          <input type="text" class="form-control" id="modelName" name="modelName" placeholder="Model Name">
                        </div>
                        <div class="form-group">
                          <label for="text" class="form-label">Sub Model</label>
                          <input type="text" class="form-control" id="SubModelName" name="SubModelName" placeholder="Sub Model Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group" id="VbodyType">
                          <label for="inputStatus">Body Type</label>
                          <span>  <a  type="button" onclick="addbody()" class=" "> Add</a>  </span>/
                          <span>  <a  type="button" onclick="editbody()" class=" ">Edit</a>  </span>
                          <select id="VehicleBodyType" name="VehicleBodyType" class="form-control  select2" >
                            <option selected value="0">Select Vehicle Body Type</option>
                            <?php foreach ($vehiclesBodyTypeList as $vehBList)
                            // <?php foreach($partIDs as $partname => $partID)
                            { ?> <option value="<?php echo $vehBList->BodyTypeID; ?>"><?php echo $vehBList->BodyTypeName; ?>
                              </option>
                            <?php } ?>
                          </select>
                          
                        </div>
                        
                        <div class="form-group" style="display:none" id="EbodyType">
                          <label for="inputStatus">Edit Body Type</label>
                           <span style="padding-left: 4px"> <a  type="button" onclick="closeEbodyType()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-10">
                                <input type="text" class="form-control" name="Ebodytype" id="Ebodytype" placeholder="Body Type">
                              </div>
                              
                              <div class="col-1">
                                 <button id="EditBodytypessave" type="button" onclick="updateBodytype()" class="btn btn-primary btn-md ">Update</button>
                              </div>
                            </div>
                        </div>
                       
                        
                        <div class="form-group" style="display:none" id="AbodyType">
                          <label for="inputStatus">Body Type</label>
                          <span style="padding-left: 4px"> <a  type="button" onclick="closeAbodyType()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-11">
                                <input type="text" class="form-control" id="bodytype" name="bodytype" placeholder="Body Type">
                              </div>
                              <div class="col-1">
                                 <button id="Bodytypessave" type="button" onclick="saveBodytype()" class="btn btn-primary btn-md ">Save</button>
                              </div>
                            </div>
                        </div>
  
                        <div class="form-group" id="VEngine">
                          <label for="inputStatus">Engine</label>
                          <span>  <a  type="button" onclick="addEngine()" class=" "> Add</a>  </span>/
                          <span>  <a  type="button" onclick="editEngine()" class=" ">Edit</a>  </span>
                          <select id="VehicleEngine" name="VehicleEngine" class="form-control  select2">
                            <option selected value="0">Select Vehicle Engine</option>
                            <?php foreach ($vehiclesEngineList as $vehEList)
                            // <?php foreach($partIDs as $partname => $partID)
                            { ?> <option value="<?php echo $vehEList->EngineID; ?>"><?php echo $vehEList->EngineName; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                       
                        <div class="form-group" style="display:none" id="EvEngine">
                          <label for="inputStatus">Edit Engine</label>
                           <span style="padding-left: 4px"> <a  type="button" onclick="closeEEngine()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-10">
                                <input type="text" class="form-control" name="EEngine" id="EEngine" placeholder="Engine">
                              </div>
                              
                              <div class="col-1">
                                 <button id="EditEnginesave" type="button" onclick="updateEngine()" class="btn btn-primary btn-md ">Update</button>
                              </div>
                            </div>
                        </div>

                        <div class="form-group" style="display:none" id="AEngine">
                          <label for="inputStatus">Engine</label>
                          <span style="padding-left: 4px"> <a  type="button" onclick="closeAEngine()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-11">
                                <input type="text" class="form-control" id="Engine" name="Engine" placeholder="Engine">
                              </div>
                              <div class="col-1">
                                 <button id="Enginesave" type="button" onclick="saveEngine()" class="btn btn-primary btn-md ">Save</button>
                              </div>
                            </div>
                        </div>
                        
                        <div class="form-group" id="VTransmission">
                          <label for="inputStatus">Transmission</label>
                          <span>  <a  type="button" onclick="addTransmission()" class=" "> Add</a>  </span>/
                          <span>  <a  type="button" onclick="editTransmission()" class=" ">Edit</a>  </span>
                          <select id="VehicleTransmission" name="VehicleTransmission" class="form-control  select2">
                            <option selected value="0">Select Vehicle Transmission</option>
                            <?php foreach ($vehiclesTransmissionList as $vehTList)
                            // <?php foreach($partIDs as $partname => $partID)
                            { ?> <option value="<?php echo $vehTList->TransmissionID; ?>"><?php echo $vehTList->TransmissionName; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                       <div class="form-group" style="display:none" id="EvTransmission">
                          <label for="inputStatus">Edit Transmission</label>
                           <span style="padding-left: 4px"> <a  type="button" onclick="closeETransmission()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-10">
                                <input type="text" class="form-control" name="ETransmission" id="ETransmission" placeholder="Transmission">
                              </div>
                              
                              <div class="col-1">
                                 <button id="EditTransmissionsave" type="button" onclick="updateTransmission()" class="btn btn-primary btn-md ">Update</button>
                              </div>
                            </div>
                        </div>
                        <div class="form-group" style="display:none" id="ATransmission">
                          <label for="inputStatus">Transmission</label>
                          <span style="padding-left: 4px"> <a  type="button" onclick="closeATransmission()" class=" "> <i class="fa fa-times" aria-hidden="true" style="font-size:14px"></i>Close</a>  </span>
                            <div class="row">
                              <div class="col-11">
                                <input type="text" class="form-control" id="Transmission" name="Transmission" placeholder="Transmission">
                              </div>
                              <div class="col-1">
                                 <button id="Transmissionsave" type="button" onclick="saveTransmission()" class="btn btn-primary btn-md ">Save</button>
                              </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="row">
                            <label for="text" class="form-label" style="margin-left: 10px ;">Your Image</label>
                            <button type="button" id="imgupload" onclick="uploadlogo();" class="btn btn-primary ">
                              Upload Image
                            </button>
                          </div>
                          <input accept="image/*" type='file' id="imgInp" class="btn btn-tool" style="display: none" />
                          <input type="hidden" name="sbimage" id="sbimage" />
                          <img id="blah" name="blah" src="" alt=" your image" style="width: 200px;height: 200px;border:outset; margin-top: 8px; display:none" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <button id="vehiclessave" type="submit" onclick="saveValid()" class="btn btn-primary btn-lg ">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>

<?php $this->load->view('includes/footer'); ?>

<script>




  function saveValid() {
    // $(".vehiclessbtn btn-primary btn-lgave").hide();

    var vehicleyear = $('#VehicleYear').val();
    var vehiclemake = $('#VehicleMake').val();
    var modelname = $('#modelName').val();
    var submodelname = $('#SubModelName').val();
    var vehiclebodytype = $('#VehicleBodyType').val();
    var vehicleengine = $('#VehicleEngine').val();
    var vehicletransmission = $('#VehicleTransmission').val();
    var img = $('#sbimage').val();


    
    if (vehicleyear == '0') {
      toastr.error("Required vehicle Year");
      return false;
    }
    if (vehiclemake == '0') {
      toastr.error("Required Vehicle Make");
      return false;
    }
    if (modelname == '') {
      toastr.error("Required Model Name");
      return false;
    }
    if (submodelname == '') {
      toastr.error("Required  Sub Model Name");
      return false;
    }
    if (vehiclebodytype == '0') {
      toastr.error("Required Vehicle Body Type");
      return false;
    }
    if (vehicleengine == '0') {
      toastr.error("Required Vehicle Engine");
      return false;
    }
    if (vehicletransmission == '0') {
      toastr.error("Required Vehicle Transmission");
      return false;
    }
    if (img == '') {
      toastr.error("Required Image");
      return false;
    }
    if (checkbodyedit ==1 || checkEngineedit ==1 || checkMakeedit == 1 || checkTransmissionedit ==1 ) {
      toastr.error("Select all required Fields");
      return false;
    }
  

    $('#vehiclessave').submit();
   


  }

  function readFile() {

    if (!this.files || !this.files[0]) return;

    const FR = new FileReader();

    FR.addEventListener("load", function(evt) {
      document.querySelector("#blah").src = evt.target.result;
      $("#sbimage").val(evt.target.result);
      console.log(evt.target.result);
    });

    FR.readAsDataURL(this.files[0]);
    $("#blah").show();

  }

  document.querySelector("#imgInp").addEventListener("change", readFile);

  function uploadlogo() {

    
    $("#imgInp").trigger("click");

  }
  $(document).ready(function() {
     $(".select2").select2();

//     $(".select2").select2({
//   tags: true
// });
  });
 
   
    function closeAMake(){
         $('#VMake').show(); 
         $('#AMake').hide();
         
    }
    function closeAbodyType(){
         $('#VbodyType').show(); 
         $('#AbodyType').hide();
        
    }
     function closeAEngine(){
         $('#VEngine').show(); 
         $('#AEngine').hide();
         

    }
     function closeATransmission(){
         $('#VTransmission').show(); 
         $('#ATransmission').hide();
        

    }
    function closeEMake(){
         $('#VMake').show(); 
         $('#EvMake').hide();
         checkMakeedit=0;

    }
     function closeEbodyType(){
         $('#VbodyType').show(); 
         $('#EbodyType').hide();
         checkbodyedit=0;

    }
     function closeEEngine(){
         $('#VEngine').show(); 
         $('#EvEngine').hide();
         checkEngineedit=0;

    }
     function closeETransmission(){
         $('#VTransmission').show(); 
         $('#EvTransmission').hide();
         checkTransmissionedit=0;

    }
    
    function addbody(){
      
         $('#AbodyType').show(); 
         $('#VbodyType').hide();
    }
    function addEngine(){
         $('#AEngine').show(); 
         $('#VEngine').hide();
    }
    function addTransmission(){
         $('#ATransmission').show(); 
         $('#VTransmission').hide();
    }
    function addMake(){
         $('#AMake').show(); 
         $('#VMake').hide();

    }

    function updateBodytype()
  {
    var Ebodytype = $('#Ebodytype').val();
   
    if(Ebodytype)
      {
        $.ajax({
                  url : "<?php echo $this->config->item('base_url');?>EditBodyType",
                  type : "POST",
                  data : {
                    "Ebodytype" : Ebodytype,
                    "BodyTypekey" :BodyTypekey
                  },
                  success : function(data) {

                    var jsondata=JSON.parse(data);
                        console.log(jsondata);

                        $('#AbodyType').hide();
                        $('#VehicleBodyType').append();
                        $('#VehicleBodyType').empty();
                        var seloption='';
                        if(jsondata.bodynewlist.length>0)
                              {
                              for( var k=0;k<jsondata.bodynewlist.length;k++)
                              {
                              
                                seloption+="<option  value="+jsondata.bodynewlist[k]['BodyTypeID']+"> "+jsondata.bodynewlist[k]['BodyTypeName']+"</option>";
                              
                              }
                                 $('#VehicleBodyType').append(seloption);
                             }
                           $('#VbodyType').show();
                           $('#EbodyType').hide();
                            
                    // console.log(json_encode(data));

                  },
                  error : function(data) {
                      // do something
                  }
                    });

        checkbodyedit=0;
      }else{
        toastr.error("Required Vehicle Body Type");
      }
  }
  function updateMake()
  {
    var EMake = $('#EMake').val();
   
    if(EMake)
      {
        $.ajax({
                  url : "<?php echo $this->config->item('base_url');?>EditMake",
                  type : "POST",
                  data : {
                    "EMake" : EMake,
                    "Makekey" :Makekey
                  },
                  success : function(data) {

                    var jsondata=JSON.parse(data);
                    console.log(jsondata);

                    $('#AMake').hide();
                    $('#VehicleMake').append();
                    $('#VehicleMake').empty();
                    var seloption='';
                    if(jsondata.vehiclesMakeList.length>0)
                          {
                             seloption+="<option  value='0' selected  disabled='true'> select make </option>";
                          for( var k=0;k<jsondata.vehiclesMakeList.length;k++)
                          {
                          
                            seloption+="<option  value="+jsondata.vehiclesMakeList[k]['MakeID']+"> "+jsondata.vehiclesMakeList[k]['MakeName']+"</option>";
                          
                          }
                             $('#VehicleMake').append(seloption);
                         }
                       $('#VMake').show(); 
                       $("#EvMake").hide();
                // console.log(json_encode(data));

              },
                  error : function(data) {
                      // do something
                  }
                    });
        checkMakeedit=0;
      }else{
        toastr.error("Required Vehicle Make");
      }
  }
 function updateEngine()
  {
    var EEngine = $('#EEngine').val();
   
    if(EEngine)
      {
        $.ajax({
                  url : "<?php echo $this->config->item('base_url');?>EditEngine",
                  type : "POST",
                  data : {
                    "EEngine" : EEngine,
                    "Enginekey" :Enginekey
                  },
                  success : function(data) {

                    var jsondata=JSON.parse(data);
                    console.log(jsondata);

                    $('#AEngine').hide();
                    $('#VehicleEngine').append();
                    $('#VehicleEngine').empty();
                    var seloption='';
                    if(jsondata.vehiclesEngineList.length>0)
                          {
                          for( var k=0;k<jsondata.vehiclesEngineList.length;k++)
                          {
                          
                            seloption+="<option  value="+jsondata.vehiclesEngineList[k]['EngineID']+"> "+jsondata.vehiclesEngineList[k]['EngineName']+"</option>";
                          
                          }
                             $('#VehicleEngine').append(seloption);
                         }
                       $('#VEngine').show();  
                       $("#EvEngine").hide();
                // console.log(json_encode(data));

              },
                  error : function(data) {
                      // do something
                  }
                    });
         checkEngineedit=0;
      }else{
        toastr.error("Required Vehicle Engine");
      }
  }

  function updateTransmission()
  {
    var ETransmission = $('#ETransmission').val();
   
    if(ETransmission)
      {
        $.ajax({
                  url : "<?php echo $this->config->item('base_url');?>EditTransmission",
                  type : "POST",
                  data : {
                    "ETransmission" : ETransmission,
                    "Transmissionkey" :Transmissionkey
                  },
                  success : function(data) {

                    var jsondata=JSON.parse(data);
                    console.log(jsondata);

                    $('#ATransmission').hide();
                    $('#VehicleTransmission').append();
                    $('#VehicleTransmission').empty();
                    var seloption='';
                    if(jsondata.vehiclesTransmissionList.length>0)
                          {
                          for( var k=0;k<jsondata.vehiclesTransmissionList.length;k++)
                          {
                          
                            seloption+="<option  value="+jsondata.vehiclesTransmissionList[k]['TransmissionID']+"> "+jsondata.vehiclesTransmissionList[k]['TransmissionName']+"</option>";
                          
                          }
                             $('#VehicleTransmission').append(seloption);
                         }
                       $('#VTransmission').show(); 
                       $("#EvTransmission").hide();
                // console.log(json_encode(data));

              },
                  error : function(data) {
                      // do something
                  }
                    });
        checkTransmissionedit=0;
      }else{
        toastr.error("Required Vehicle Transmission");
      }
  }

    function saveBodytype(){
  
      var bodytype = $('#bodytype').val();
      if(bodytype)
      {
        $.ajax({
                  url : "<?php echo $this->config->item('base_url');?>AddBodyType",
                  type : "POST",
                  data : {
                    "bodytype" : bodytype
                  
                  },
                  success : function(data) {

                    var jsondata=JSON.parse(data);
                        console.log(jsondata);

                        $('#AbodyType').hide();
                        $('#VehicleBodyType').append();
                        $('#VehicleBodyType').empty();
                        var seloption='';
                        if(jsondata.bodynewlist.length>0)
                              {
                                seloption+="<option  value='0' selected  disabled='true'> Select BodyType </option>";
                              for( var k=0;k<jsondata.bodynewlist.length;k++)
                              {
                              
                                seloption+="<option  value="+jsondata.bodynewlist[k]['BodyTypeID']+"> "+jsondata.bodynewlist[k]['BodyTypeName']+"</option>";
                              
                              }
                                 $('#VehicleBodyType').append(seloption);
                             }
                           $('#VbodyType').show(); 
                    // console.log(json_encode(data));

                  },
                  error : function(data) {
                      // do something
                  }
                    });
      }else{
        toastr.error("Required Vehicle Body Type");
      }

   
     
    }

    function saveEngine(){
  
  var Engine = $('#Engine').val();
  if(Engine)
  {
    $.ajax({
              url : "<?php echo $this->config->item('base_url');?>AddEngine",
              type : "POST",
              data : {
                "Engine" : Engine
              
              },
              success : function(data) {

                var jsondata=JSON.parse(data);
                    console.log(jsondata);

                    $('#AEngine').hide();
                    $('#VehicleEngine').append();
                    $('#VehicleEngine').empty();
                    var seloption='';
                    if(jsondata.vehiclesEngineList.length>0)
                          {
                            seloption+="<option  value='0' selected  disabled='true'> Select Engine </option>";
                          for( var k=0;k<jsondata.vehiclesEngineList.length;k++)
                          {
                          
                            seloption+="<option  value="+jsondata.vehiclesEngineList[k]['EngineID']+"> "+jsondata.vehiclesEngineList[k]['EngineName']+"</option>";
                          
                          }
                             $('#VehicleEngine').append(seloption);
                         }
                       $('#VEngine').show(); 
                // console.log(json_encode(data));

              },
              error : function(data) {
                  // do something
              }
                });
  }else{
    toastr.error("Required Vehicle Engine");
  }


 
}

function saveTransmission(){
  
  var Transmission = $('#Transmission').val();
  if(Transmission)
  {
    $.ajax({
              url : "<?php echo $this->config->item('base_url');?>AddTransmission",
              type : "POST",
              data : {
                "Transmission" : Transmission
              
              },
              success : function(data) {

                var jsondata=JSON.parse(data);
                    console.log(jsondata);

                    $('#ATransmission').hide();
                    $('#VehicleTransmission').append();
                    $('#VehicleTransmission').empty();
                    var seloption='';
                    if(jsondata.vehiclesTransmissionList.length>0)
                          {
                             seloption+="<option  value='0' selected  disabled='true'> Select Transmission </option>";
                          for( var k=0;k<jsondata.vehiclesTransmissionList.length;k++)
                          {
                          
                            seloption+="<option  value="+jsondata.vehiclesTransmissionList[k]['TransmissionID']+"> "+jsondata.vehiclesTransmissionList[k]['TransmissionName']+"</option>";
                          
                          }
                             $('#VehicleTransmission').append(seloption);
                         }
                       $('#VTransmission').show(); 
                // console.log(json_encode(data));

              },
              error : function(data) {
                  // do something
              }
                });
  }else{
    toastr.error("Required Vehicle Transmission");
  }

}


function saveMake(){
  
  var Make = $('#Make').val();
  if(Make)
  {
    $.ajax({
              url : "<?php echo $this->config->item('base_url');?>AddMake",
              type : "POST",
              data : {
                "Make" : Make
              
              },
              success : function(data) {

                var jsondata=JSON.parse(data);
                    console.log(jsondata);
                    console.log();

                    $('#AMake').hide();
                    $('#VehicleMake').append();
                    $('#VehicleMake').empty();
                    var seloption='';
                    // seloption+="<option  value='0' selected  disabled='true'> Select make </option>";
                    if(jsondata.vehiclesMakeList.length>0)
                          {
                              
                          for( var k=0;k<jsondata.vehiclesMakeList.length;k++)
                          {
                            //console.log(jsondata.vehiclesMakeList[k]['MakeID']);
                            seloption+="<option  value="+jsondata.vehiclesMakeList[k]['MakeID']+"> "+jsondata.vehiclesMakeList[k]['MakeName']+"</option>";
                          
                          }
                             $('#VehicleMake').append(seloption);
                         }
                       $('#VMake').show(); 
                // console.log(json_encode(data));

              },
              error : function(data) {
                  // do something
              }
                });
  }else{
    toastr.error("Required Vehicle Make");
  }


 
}


    var  checkbodyedit=0;
    function editbody()
    {
 
      checkbodyedit=1;
      $('#VehicleBodyType').select2('open');

      // $("#VehicleBodyType").trigger("click");
      // alert('jkhsssb');
    }

    var BodyTypekey ='';
 
 $('#VehicleBodyType').on('change', function(){
   BodyTypekey = $('#VehicleBodyType option:selected').val();
   var BodyTypetext = $('#VehicleBodyType option:selected').text();
  if(checkbodyedit==1)
  {
   //alert(BodyType);
   $("#EbodyType").show();
   $("#VbodyType").hide();
   $("#Ebodytype").val(BodyTypetext);
  } 
 });

 $('#VehicleBodyType').on('select2:close', function (e) {
  BodyTypekey = $('#VehicleBodyType option:selected').val();
      //alert(Makekey);
      var BodyTypetext = $('#VehicleBodyType option:selected').text();
      //alert(checkMakeedit);
     if(checkbodyedit==1)
     {
      //alert(BodyType);
      $("#EbodyType").show();
   $("#VbodyType").hide();
   $("#Ebodytype").val(BodyTypetext);
     } 
  // Do something
});
   
    $('#VehicleMake').on('select2:close', function (e) {
        Makekey = $('#VehicleMake option:selected').val();
      //alert(Makekey);
      var Maketext = $('#VehicleMake option:selected').text();
      //alert(checkMakeedit);
     if(checkMakeedit==1)
     {
      //alert(BodyType);
      $("#EvMake").show();
      $("#VMake").hide();
      $("#EMake").val(Maketext);
     } 
  // Do something
});

    var  checkMakeedit=0;
    function editMake()
    {
      checkMakeedit=1;
      $('#VehicleMake').select2('open');
    }
    
    $('#VehicleMake').on('change', function(){
     
      Makekey = $('#VehicleMake option:selected').val();
      var Maketext = $('#VehicleMake option:selected').text();
      //alert(Makekey);
      //alert(Maketext);
     if(checkMakeedit==1)
     {
      //alert(BodyType);
      $("#EvMake").show();
      $("#VMake").hide();
      $("#EMake").val(Maketext);
       
     } 
     checkMakeedit=0;
    });



    var  checkEngineedit=0;
    function editEngine()
    {
 
      checkEngineedit=1;
      $('#VehicleEngine').select2('open');

      // $("#VehicleBodyType").trigger("click");
      // alert('jkhsssb');
    }

    $('#VehicleEngine').on('change', function(){
      Enginekey = $('#VehicleEngine option:selected').val();
      var Enginetext = $('#VehicleEngine option:selected').text();
      //alert(BodyTypetext);
     if(checkEngineedit==1)
     {
      //alert(BodyType);
      $("#EvEngine").show();
      $("#VEngine").hide();
      $("#EEngine").val(Enginetext);
     } 
    });
    $('#VehicleEngine').on('select2:close', function (e) {
      Enginekey = $('#VehicleEngine option:selected').val();
      var Enginetext = $('#VehicleEngine option:selected').text();
      //alert(BodyTypetext);
     if(checkEngineedit==1)
     {
      //alert(BodyType);
      $("#EvEngine").show();
      $("#VEngine").hide();
      $("#EEngine").val(Enginetext);
     } 
  // Do something
});

    var  checkTransmissionedit=0;
    function editTransmission()
    {
 
      checkTransmissionedit=1;
      $('#VehicleTransmission').select2('open');

      // $("#VehicleBodyType").trigger("click");
      // alert('jkhsssb');
    }

    $('#VehicleTransmission').on('change', function(){
      Transmissionkey = $('#VehicleTransmission option:selected').val();
      var Transmissiontext = $('#VehicleTransmission option:selected').text();
      //alert(BodyTypetext);
     if(checkTransmissionedit==1)
     {
      //alert(BodyType);
      $("#EvTransmission").show();
      $("#VTransmission").hide();
      $("#ETransmission").val(Transmissiontext);
     } 
    });
    $('#VehicleTransmission').on('select2:close', function (e) {
      Transmissionkey = $('#VehicleTransmission option:selected').val();
      var Transmissiontext = $('#VehicleTransmission option:selected').text();
      //alert(BodyTypetext);
     if(checkTransmissionedit==1)
     {
      //alert(BodyType);
      $("#EvTransmission").show();
      $("#VTransmission").hide();
      $("#ETransmission").val(Transmissiontext);
     } 
  // Do something
});

</script>