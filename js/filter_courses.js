'use strict';

console.log("Javascript is running!");

//script to filter by course naming using searchbar
function myFunction() {
	var input, filter, ul, li, a, i;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	ul = document.getElementById("courselist-boxes");
	li = ul.getElementsByTagName("li");
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("h3")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		    li[i].style.display = "";
		} else {
		    li[i].style.display = "none";

		}
	}
}

//Cite: http://www.w3schools.com/howto/howto_js_filter_lists.asp

//script to filter by grade
$(".grade-filter").change(function() {
  var selectedEventType = this.options[this.selectedIndex].value;
  if (selectedEventType == "all") {
    $('.courselist-boxes li').removeClass('hidden');
  } else {
    $("#reset").checked = false;
    $('.courselist-boxes li').addClass('hidden');
    $('.courselist-boxes li[data-gradetype="' + selectedEventType + '"]').removeClass('hidden');
  }
});

//script to filter by subject
$(".subject-filter").change(function() {
  var selectedEventType = this.options[this.selectedIndex].value;
  if (selectedEventType == "all") {
    $('.courselist-boxes li').removeClass('hidden');
  } else {
    $("#reset").checked = false;
    $('.courselist-boxes li').addClass('hidden');
    $('.courselist-boxes li[data-subjecttype="' + selectedEventType + '"]').removeClass('hidden');
  }
});

//script to filter by term
$(".term-filter").change(function() {
  var selectedEventType = this.options[this.selectedIndex].value;
  if (selectedEventType == "all") {
    $('.courselist-boxes li').removeClass('hidden');
  } else {
    $("#reset").checked = false;
    $('.courselist-boxes li').addClass('hidden');
    $('.courselist-boxes li[data-termtype="' + selectedEventType + '"]').removeClass('hidden');
  }
});

//Cite: http://codepen.io/adrianparr/pen/Eoydz

//script to show all courses
$("#reset").click(function() {
	if ($("#reset").checked = true) {
		$('.courselist-boxes li').removeClass('hidden');
		$(".grade-filter").each(function() { this.selectedIndex = 0 });
		$(".subject-filter").each(function() { this.selectedIndex = 0 });
		$(".term-filter").each(function() { this.selectedIndex = 0 }); 
	}
});