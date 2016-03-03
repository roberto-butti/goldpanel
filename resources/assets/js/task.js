$(document).ready(function(){
  $('#date-deadline').datepicker({
    todayBtn: "linked",
    clearBtn: true,
    language: "it"
  });
});
$('.datepickerz').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d',
    language: "it"
});

