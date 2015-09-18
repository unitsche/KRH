$(document).ready(function() {
   $('button').on('click', function() {
     var txt = $('<p class=".ach"<p>NIX geht; leider!</p><p><h2>hallo welt, ich komme!</p>');
     $('.ach').append(txt);
     $('.buttonI').remove(); 
   });
 });

function showDetails() {
 $(this).closest('.t').find('.lielement').slideToggle(200);
}

$(document).ready(function() {
  $('.t').on('mouseenter','h4', showDetails); 
  $('.t').on('mouseleave','h4', showDetails);
});
