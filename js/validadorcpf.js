<script>
$(document).ready(function() {
   
    $('#cpf_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cpf: {
                validators: {
                    callback: {
                        message: 'CPF Invalido',
                        callback: function(value) {
                            
       //retira mascara e nao numeros       
       cpf = value.replace(/[^\d]+/g,'');    
       if(cpf == '') return false; 
           
       if (cpf.length != 11) return false;
       
       // testa se os 11 digitos são iguais, que não pode.
       var valido = 0; 
       for (i=1; i < 11; i++){
        if (cpf.charAt(0)!=cpf.charAt(i)) valido =1;
       }
       if (valido==0) return false;
             
       //  calculo primeira parte  
       aux = 0;    
       for (i=0; i < 9; i ++)       
        aux += parseInt(cpf.charAt(i)) * (10 - i);  
        check = 11 - (aux % 11);  
        if (check == 10 || check == 11)     
         check = 0;    
        if (check != parseInt(cpf.charAt(9)))     
         return false;      
 
       // calculo segunda parte  
       aux = 0;    
       for (i = 0; i < 10; i ++)        
        aux += parseInt(cpf.charAt(i)) * (11 - i);  
       check = 11 - (aux % 11);  
       if (check == 10 || check == 11) 
        check = 0;    
       if (check != parseInt(cpf.charAt(10)))
        return false;       
       return true; 
      
       
                        }
                   }
                }
           }
        }
    })
});
</script>