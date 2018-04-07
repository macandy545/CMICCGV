$(document).ready(function(){

});
function sendMsg(stud_id)
{
	$.ajax({
		url:"/cgv/admin/getstudDatas/"+stud_id,
		type:"post",
		dataType:"json",
		success:function(response){
			var msgs = '',
					hdmsg = '';
			if(response['sbjct_grds'].length > 0)
			{	
				hdmsg = 'Grades for Current Subjects S.Y. '+response['sbjct_grds'][0]['sy']+' '+response['sbjct_grds'][0]['semester'];
				for (var i = 0; i < response['sbjct_grds'].length; i++) {
					msgs += '• '+response['sbjct_grds'][i]['sub_name']
							+' - [ Prelim ('+noGrade(response['sbjct_grds'][i]['prelim'])+'), '
							+'Midterm ('+noGrade(response['sbjct_grds'][i]['midterm'])+'), '
							+'Semi-final ('+noGrade(response['sbjct_grds'][i]['semi_final'])+'), '
							+'Final ('+noGrade(response['sbjct_grds'][i]['final'])+') ]\n';
				}
				$('#txtmsg').val(hdmsg+'\n'+msgs);
			}
		}
	});
}
function send_Msg(stud_id)
{
	$.ajax({
		url:"/cgv/admin/get_student_info/"+stud_id,
		type:"post",
		dataType:"json",
		success:function(response){
			var msgs = '',
					hdmsg = '';
			if(response['studCurrentGrades'].length > 0)
			{	
				hdmsg = 'Grades for Current Subjects S.Y. '+response['studCurrentGrades'][0]['sy'];
				for (var i = 0; i < response['studCurrentGrades'].length; i++) {
					msgs += '• '+response['studCurrentGrades'][i]['sub_name']
							+' - [ First Grading ('+noGrade(response['studCurrentGrades'][i]['first_grading'])+'), '
							+'Second Grading ('+noGrade(response['studCurrentGrades'][i]['second_grading'])+'), '
							+'Third Grading ('+noGrade(response['studCurrentGrades'][i]['third_grading'])+'), '
							+'Fourth Grading ('+noGrade(response['studCurrentGrades'][i]['fourth_grading'])+') ]\n';
				}
				$('#txt_msg').val(hdmsg+'\n'+msgs);
			}
		}
	});
}
function noGrade(str)
{
	return str == 0 ? 'No grade yet!' : str;
}