var machine4 = $("#casino1").slotMachine({
    active : 0,
    delay : 2000
});

var eliminar = $('.slot-1');
var numElementos = 0;

$(document).ready(function() {

$("#slotMachineButtonShuffle").click(function() {
    $(".nombre-ganador").html("");
    var l = Ladda.create(this);
     l.start();
    
    if(eliminar){
        eliminar.remove();
        machine4.destroy();
        $('.slotMachine').html($('#elements').html());
        if($("#elements .slot").size()>0){
        machine4 = $("#casino1").slotMachine({
            active : 0,
            delay : 2000
        });
        }
    }
    
    if($("#elements .slot").size()==0){
        l.stop();
        $('.slotMachine').html('<div class="slot">Ya no hay más ganadores</div>');
        return false;
    }
    
    machine4.shuffle();
    
    setTimeout(function(){ 

            machine4.stop();
            
            //alert(machine4.active+' '+$('.slot'+machine4.active).data('token'));
            
            var data = $('.slot'+machine4.active).data('token');
            
            var url = baseUrl+'site/ganador?token='+data
            $.ajax({
                url: url,
                success:function(resp){
                     eliminar = $('.slot'+machine4.active);
                     
                     $('#elements .slot'+machine4.active).remove();
                     
                     $('#elements .slot').each(function(index){
                         $(this).attr('class', ' ');
                         $(this).addClass('slot');
                         $(this).addClass('slot'+index);
                     });
                     
                     setTimeout(function(){ 
                     $(".nombre-ganador").html(resp);
                        l.stop();
                     }, 3000);		
                }
            })
            
    
    }, 4000);
      
});

});