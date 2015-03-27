<?php
    $baseUrl =  Yii::app()->baseurl;
    $themeUrl = Yii::app()->theme->baseUrl;  
?>




<div class="login-main">
    <div class="login-logo"><a href="<?php echo Yii::app()->getBaseUrl(true);?>"><img src="<?php echo $themeUrl;?>/images/logo.png"  alt="#"/></a></div>



    <img src="<?php echo $themeUrl;?>/images/login.png"  alt="#" style="display:block; margin:0 auto; margin-top:30px;"/>
    <div class="login-box">

        <h2>CHANGE PASSWORD</h2>

        <?php /** @var TbActiveForm $form */
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); ?>                
              <?php


                        $this->widget('bootstrap.widgets.TbAlert', array(
                        'block' => true,
                        'fade' => true,
                        'closeText' => '&times;', // false equals no close link
                        'events' => array(),
                        'htmlOptions' => array(),
                        //'userComponentId' => 'user',
                        'alerts' => array( // configurations per alert type
                        // success, info, warning, error or danger
                        'success' => array('closeText' => '&times;'),
                        'info', // you don't need to specify full config
                        'warning' => array('block' => false, 'closeText' => false),
                        'error' => array('block' => false, 'closeText' => 'AAARGHH!!')
                        ),
                        ));
                    ?>                
        


        <?php echo $form->passwordFieldRow(
            $model,
            'new_password',
            array('placeholder'=>'Enter new Password')
            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'new_conf_password',
             array('placeholder'=>'Confirm Password')
            ); ?>

 

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'button'),
            ) 
            ); ?>


        <?php
            $this->endWidget(); ?>

        <div class="clear"></div>

    </div>
</div>

