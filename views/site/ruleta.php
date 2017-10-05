<?php
use yii\bootstrap\Html;

$this->registerCssFile ( '@web/webassets/plugins/slot-machine/jquery.slotmachine.min.css', [
    'depends' => [
            \app\assets\AppAsset::className ()
    ]
] );

$this->registerJsFile ( '@web/webassets/plugins/slot-machine/jquery.slotmachine.min.js', [
    'depends' => [
            \app\assets\AppAsset::className ()
    ]
] );


$this->registerJsFile ( '@web/webassets/js/slotMachine.js', [
    'depends' => [
            \app\assets\AppAsset::className ()
    ]
] );

?>

<style>

.slot{
 	height: 99px;
    color: black;
    /* background: green; */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.4vh;
    text-transform: uppercase;
    font-weight: bold;
        padding: 14px;
        
}


#casino{
	width: 80%;
    height: 141px;
    background-image: url(../webAssets/images/nombre.fw.png);
    background-repeat: no-repeat;
    position:relative;
    background-position: 50%;
    background-size: cover;
    margin: 0 auto;
    margin-top: 100px;
    height: 99px;
    border: 1px solid;
}

#casino::after{
    content: '';
    position: absolute;
    height: 80px;
    width: 100%;
    right: 0;
    left: 0;
    top: -89px;
    background-image: url(../webAssets/images/y-el-ganador-es.fw.png);
    background-repeat: no-repeat;
    /* display: flex; */
    background-position: 50%;
    background-size: 100%;
}

.slotMachine{
    height: 99px;
    margin: 0px auto 65px;
    color: white;
    /* align-items: center; */
    /* justify-content: center; */
    width: 80%;
   
}

.btn-group-casino{
margin-top: 30px;
    text-align: center;
}

.btn-group-casino .btn{
/* background: url(../webAssets/images/boton.png); */
    height: 63px;
    width: 236px;
    background-size: cover;
        color: #fff;
    border:0px solid  #5D67A8;
}    

.marco-ganador{
	background-image:url('../webAssets/images/fondo.png')
}

.js-vacio{
height: 30px;
}

</style>


<div class="wrap">
	<div class="marco-ganador">
		<!-- Slot machine example -->
		
		<div id="casino">
			<div class="content">
				<div>
					<div id="casino1" class="slotMachine">
					<?php
					$elementos = count($boletos);
					if($elementos==0){?>
						<div class="slot"><span>Ya no hay más ganadores</span></div>
					<?php }else{?>
						<div data-token="-1" class="slot slot-1"><span>Iniciar concurso</span></div>
					<?php }
					$index = 0;
					foreach($boletos as $boleto){?>
						<div data-token="<?=$boleto->id_boleto?>" class="slot slot<?=$index?>"><span><?=$boleto->txt_codigo?></span></div>
					<?php 
					$index++;
					}?>							
					</div>
					<div class="btn-group btn-group-justified btn-group-casino" role="group">
					<?php if($elementos>0){?>
						<?= Html::submitButton('<span class="ladda-label">Girar</span>', ['id'=>'slotMachineButtonShuffle', 'class' => 'btn btn-primary js-btn-registrar ladda-button animated','data-style'=>'zoom-out'])?>
					<?php }?>	
					</div>
				</div>

			</div>
			<div class="clearfix"></div>
		</div>
		
		
	</div>
</div>

<div id="elements" style="display:none">
<?php 
					$index = 0;
					foreach($boletos as $boleto){?>
						<div data-token="<?=$boleto->id_boleto?>" class="slot slot<?=$index?>"><?=$boleto->txt_codigo?></div>
					<?php 
					$index++;
					}?>	

</div>

<div class="nombre-ganador">

</div>
