$(function() {
   $('.goback').click(function() {
       history.go(-1);
   });
   
   $('.askme').click(function() {
       return confirm("Anda pasti untuk hapus data ?");
   });
   
   $('[data-rel="tooltip"]').tooltip({
        placement : 'top'
    });
    
    $('.dt').datepicker({dateFormat:'dd/mm/yy'});
});