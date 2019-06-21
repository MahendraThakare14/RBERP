<script type="text/javascript">
 
    function fnAllowNumeric(event) {
      if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 8) {
          event.keyCode = 0;
          return false;
      }
    }

 $(".datepicker_id").datepicker({ dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
    
        });
    
</script>





<script type="text/javascript">
  function AllowAlphabet(e)
{
  isIE = document.all ? 1 : 0
  keyEntry = !isIE ? e.which : event.keyCode;
  if (((keyEntry >= '65') && (keyEntry <= '90')) || ((keyEntry >= '97') && (keyEntry <= '122')) || (keyEntry == '46') || (keyEntry == '32') || keyEntry == '45')
     return true;
  else
{   
    return false;
      }
}
</script>


<script type="text/javascript">
  function pancard(obj,val){
    // console.log(obj);
    if(obj=='PanNo' ){
                   var str =$('#PanNo').val();
                   var pancardPattern = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
                   var res = str.match(pancardPattern);
                   if(res){                    
                      $('#pannumber').hide();                     

                  }else{                   
                    $('#pannumber').show();                

                    return false;
                  }                  
  }
}


</script>



<script type="text/javascript">
          function mail(obj,val){
         // console.log(obj);
         if(obj=='email' ){
                        var str =$('#email').val();
                        var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
                        var res = str.match(emailPattern);
                        if(res){
                          // console.log('Pancard is valid one.!!');
                           $('#email_id').hide();
     
                       }else{
                         // console.log('Oops.Please Enter Valid Pan Number.!!');
                         $('#email_id').show();
     
                         return false;
                       }
                       
       }
     }
     </script>

     <script type="text/javascript">
    var d = new Date();
    var year = d.getFullYear();
    d.setFullYear(year);
    $(".datepicker_id").datepicker({ dateFormat: "dd/mm/yy",
      changeMonth: true,
      changeYear: true,
      maxDate: year,
      minDate: "-100Y",
     yearRange: '100:' + year + '',
    //  yearRange: "c-5:c+50", // last hundred years and future hundred years
      //yearRange : 'c-65:c+10'
      defaultDate: d
    });
</script>
     
                      

 