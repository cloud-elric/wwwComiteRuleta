<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

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



.btn-group-casino{
margin-top: 30px;
    text-align: center;
}

.btn-group-casino .btn{
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


<div class="page">
    <div class="container container-full">
        <section class="ruleta">
            <h3>"Gracias por tu donación para ayudar a reconstruir México"</h3>
            <div class="nombre-ganador"><span>Gira la ruleta para conocer al proximo ganador</span></div>
            <div id="casino">
                <div class="content">
                <div>
                    <div id="casino1" class="slotMachine">
                    <?php
                    $elementos = count($boletos);
                    if($elementos==0){?>
                        <div class="slot"><span>Ya no hay más ganadores</span></div>
                    <?php }else{?>
                        <div data-token="-1" class="slot slot-1"><span class="start-msg">Iniciar concurso</span></div>
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
            <div class="empresas-participantes"></div>
        </div>
        </section>
    </div>
    <footer>
      <a class="sponsor" href="http://www.2geeksonemonkey.com">Desarrollo donado por 2 Geeks one Monkey</a>
      <img src="<?=Url::base()?>/webassets/images/2geeks-isotipo.png" alt="Desarrollo donado por 2 Geeks one Monkey">
    </footer>
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
