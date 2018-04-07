$(document).ready(function(){
  var count_div = $('div#com_lau').children().length,
      curcom_lau = $('div#curcom_lau').children().length;
  if(count_div == 0){
    $('div#com_lau').html(
      '<div class="col-sm-12 col-md-12">'
        +'<div class="thumbnail text-center">'
          +'<h3>No candidates yet!</h3>'
        +'</div>'
    +'</div>'
    );
  }
  if(curcom_lau == 0){
    $('div#curcom_lau').html(
      '<div class="col-sm-12 col-md-12">'
        +'<div class="thumbnail text-center">'
          +'<h3>No candidates yet!</h3>'
        +'</div>'
    +'</div>'
    );
  }
  $('#current_comlaude').hide();
  $('#comlaude').hide();
  $('#_loader').hide();
  $('#show').on('click', function(){
    $('#_loader').show();
    $('#show').hide();
    $('#current_comlaude').hide();
    setTimeout(function(){
        $('#comlaude').show();
        $('#_loader').hide();
    },1000);
  });
  $('#current').on('click', function(){
    $('#comlaude').hide();
    $('#current').hide();
    $('#_loader').show();
    setTimeout(function(){
      $('#current_comlaude').show();
      $('#show').show();
      $('#_loader').hide();
    },1000);
  });
  $('#grade_period').on('change', function(){
    var get = $(this).val()
    $('#_period').val(get).change();
    if(get == 'prelim'){
      $('#old_grade').val($('#_prelim').val());
    }else if(get == 'midterm'){
      $('#old_grade').val($('#_midterm').val());
    }else if(get == 'semifinal'){
      $('#old_grade').val($('#_semifinal').val());
    }else if(get == 'final'){
      $('#old_grade').val($('#_final').val());
    }else{
      $('#old_grade').val('');
    }
  });
  $('#approvedGrade').on('hidden.bs.modal', function(){
    $('#_first_grading').val('');
    $('#_second_grading').val('');
    $('#_third_grading').val('');
    $('#_fourth_grading').val('');
    $('#_period').val('');
    $('#form_approval')[0].reset();
    $('#old_grade').val('');
  });
  $('#approved_grade').on('hidden.bs.modal', function(){
    $('#_prelim').val('');
    $('#_midterm').val('');
    $('#_semifinal').val('');
    $('#_final').val('');
    $('#_period').val('');
    $('#form_approval')[0].reset();
    $('#old_grade').val('');
  });
  $('#img2').on('change', function(){
    var val = $(this).val();
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length)
    $('#_studimagename').val(fileName).change();  
    $('#_teacherimagename').val(fileName).change();
    $('#_imagename').val(fileName).change();
  });
  //auto load message
  setInterval(function(){
    auto_refresh();
  }, 3000);
  //end
  //for adding stud image
  $('#img').change(function(){
    var val = $(this).val(),
        imgPath = $(this)[0].value,
        extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    $('#_studimagename').val(val.substr(val.lastIndexOf("\\")+1, val.length)).change();
    if (extn == "png" || extn == "jpg" || extn == "jpeg") {
        previewFile(); 
    } else {
        alert("Pls select only images");
        $('#img').val('');
        $("#_studimagename").val('user.png');
        $('#imgadmin').attr('src','/cgv/webroot/images/user.png');
    }
  });
  //end for adding stud image
  //for adding teacher image
  $('#teacher_img').change(function(){
    var val = $(this).val(),
        imgPath = $(this)[0].value,
        extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    $('#_teacherimagename').val(val.substr(val.lastIndexOf("\\")+1, val.length)).change();
    if (extn == "png" || extn == "jpg" || extn == "jpeg") {
        previewFile(); 
    } else {
        alert("Pls select only images");
        $('#teacher_img').val('');
        $("#_teacherimagename").val('user.png');
        $('#imgadmin').attr('src','/cgv/webroot/images/user.png');
    }
  });
  //end for adding teacher image
});
 //for approval grade
 function auto_refresh(){
    $.ajax({
        url:'/cgv/admin/count_reports',
        type: 'post',
        dataType:'json',
        success: function(response){
          if(response > 0){
            $('#message_count').html(response);
          }else{
            $('#message_count').html('');
          }
          
        }
    });
  }
  // function auto_refresh(){
  //   $.ajax({
  //       url:'/webogs/admin/message',
  //       type: 'post',
  //       dataType:'json',
  //       success: function(response){
  //         if(response > 0){
  //           $('#message').html(response);
  //         }else{
  //           $('#message').html('');
  //         }
          
  //       }
  //   });
  // }
function approvalGrades(subject_id,sub_name,student_id)
{
  $.ajax({
    url:'/cgv/teacher/approvalGrades/'+subject_id+'/'+sub_name+'/'+student_id,
    type: 'post',
    dataType: 'json',
    success: function(response){
      $('#sub_name').val(response[0].sub_name);
      $('#stud_name').val(response[0].fname+' '+response[0].middle+' '+response[0].lname);
      $('#_prelim').val(response[0].prelim);
      $('#_midterm').val(response[0].midterm);
      $('#_semifinal').val(response[0].semi_final);
      $('#_final').val(response[0].final);
      $('#teacher_id').val(response[0].teacher_id);
      $('#sub_id').val(response[0].sub_id);
      $('#sy').val(response[0].sy);
      $('#stud_id').val(response[0].stud_id);
      $('#form_approval').attr('action', '/cgv/teacher/send_report_grade/'+response[0].sub_id+'/'+response[0].sub_name);
    }
  });
}
function approval_grades(basic_subject_id,sub_name,student_id)
{
  $.ajax({
    url:'/cgv/teacher/approval_grades/'+basic_subject_id+'/'+sub_name+'/'+student_id,
    type: 'post',
    dataType: 'json',
    success: function(response){
      $('#sub_name').val(response[0].sub_name);
      $('#stud_name').val(response[0].fname+' '+response[0].middle+' '+response[0].lname);
      $('#_prelim').val(response[0].prelim);
      $('#_midterm').val(response[0].midterm);
      $('#_semifinal').val(response[0].semi_final);
      $('#_final').val(response[0].final);
      $('#teacher_id').val(response[0].teacher_id);
      $('#sub_id').val(response[0].sub_id);
      $('#sy').val(response[0].sy);
      $('#stud_id').val(response[0].stud_id);
      $('#form_approval').attr('action', '/cgv/teacher/report_grade/'+response[0].basic_subject_id+'/'+response[0].sub_name);
    }
  });
}
 //end

// function previewFile(){
//    var preview = document.querySelector('#img'); //selects the query named img
//    var file    = document.querySelector('input[type=file]').files[0]; //sames as here
//    var reader  = new FileReader();

//    reader.onloadend = function () {
//       preview.src = reader.result;
//    }
//    if (file) {
//        reader.readAsDataURL(file); //reads the data as a URL
//    } else {
//        preview.src = "";
//    }
// }
function previewFile(){
   var preview = document.querySelector('#imgadmin'); //selects the query named img
   var file    = document.querySelector('input[type=file]').files[0]; //sames as here
   var reader  = new FileReader();

   reader.onloadend = function () {
       preview.src = reader.result;
   }
   if (file) {
       reader.readAsDataURL(file); //reads the data as a URL
   } else {
       preview.src = "";
   }
}
// function setfilename(val)
// {
//   var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
//   document.getElementById("img2").value = fileName;
// }
// function setfilenameimage(val)
// {
//   var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
//   document.getElementById("_studimagename").value = fileName;
// }
function prelimTotalGrade(id = null)
{
  if(id)
  {
    $.ajax({
      url:'prelimviewsubjecttotalgrade/'+id,
      type: 'post',
      dataType: 'json',
      success: function(response){
        $('#prelim_Subgrade').val(response);
      }
    });
  }
}
function midtermTotalGrade(id = null)
{
  if(id)
  {
    $.ajax({
      url:'midtermviewsubjecttotalgrade/'+id,
      type: 'post',
      dataType: 'json',
      success: function(response){
        $('#midterm_Subgrade').val(response);
      }
    });
  }
}
function sfinalTotalGrade(id = null)
{
  if(id)
  {
    $.ajax({
      url:'sfinalviewsubjecttotalgrade/'+id,
      type: 'post',
      dataType: 'json',
      success: function(response){
        $('#sfinal_Subgrade').val(response);
      }
    });
  }
}
function finalTotalGrade(id = null)
{
  if(id)
  {
    $.ajax({
      url:'finalviewsubjecttotalgrade/'+id,
      type: 'post',
      dataType: 'json',
      success: function(response){
        $('#final_Subgrade').val(response);
      }
    });
  }
}