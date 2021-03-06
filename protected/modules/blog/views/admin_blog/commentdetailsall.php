<script type="text/javascript">
    $(function(){
        $('tr').children('th').css('color','#000');   
        $('tr.even').children('th').css('background','#FFF');

        $(".toggle-column").children('a').click(function(){
            var cls1=$(this).children('i').attr('class');
            if(cls1=="icon-remove-sign"){
              $(this).children('i').removeAttr('class').addClass('icon-ok-circle');   
            }
            else{
                $(this).children('i').removeAttr('class').addClass('icon-remove-sign');   
            }
            
        })
    });
</script>
<br /><div style="float: right;" class="newtable">
    <?php 
        //  Yii::import('zii.widgets.ButtonColumn');

        /*echo "<pre>";
        print_r($m_user_details);
        echo "</pre>";
        */
        $i=1;                                  
        //foreach($m_user_details as $row){ ?>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered',
        // 'dataProvider' => new CActiveDataProvider('dev',array(
        // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
        // ),
        'dataProvider'=>$model->searchAll(),
        'template' => "{summary}{items}{pager}",
        'columns' => array( 
        array( 
        'class'=>'bootstrap.widgets.TbImageColumn',
        'header' => 'Profile Image',
        'imagePathExpression'=>'$data->userImagePath($data->s_prof_image)',
        'usePlaceKitten'=>FALSE,
        'htmlOptions'=>array('style'=>'max-height:100px;max-width:100px;')
        //'placement' => 'right',
        //'inputclass' => 'span3'
        ),
         array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'pr_title',
        'filter' => CHtml::activeTextField($model, 'pr_title'),
        'value' => '$data->pr_title',
        'id'=>'$data[uid]',
        //'sortable'=>true,
        'type'=>'html',

        ), 
                
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 's_fname',
        'filter' => CHtml::activeTextField($model, 's_fname'),
        'value' => '$data->s_fname',
        'id'=>'$data[uid]',
        //'sortable'=>true,
        'type'=>'html',

        ), 
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 's_lname',
        'filter' => CHtml::activeTextField($model, 's_lname'),
        'value' => '$data->s_lname',
        'id'=>'$data[uid]',
        //'sortable'=>true,
        'type'=>'html',

        ), 
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'comment',
        'filter' => CHtml::activeTextField($model, 'comment'),
        'value' => '$data->comment',
        'id'=>'$data[uid]',
        'sortable'=>false,
        'type'=>'html',

        ), 

        array(
        'class'=>'bootstrap.widgets.TbToggleColumn',
        'toggleAction'=>'default/togglecomnt',
        'sortable'=>false,   
        'name' => 'i_active',
        'header' => 'Status'
        ),


        ),


        ) 
        );
    ?>


    <?php 
        //  $i++;
        //   } ?>



</div>