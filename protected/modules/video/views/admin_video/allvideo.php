<style>    .imgdiv{         float: left;          margin: 6px 6px;           border: solid 8px #fff;          position:relative;    }    .imgdiv1{         float: left;          margin: 6px 6px;           border: solid 8px #fff;          position:relative;         width: 200px;         height: 112px;         background-color: #000;    }     .playimg,.playimg1{        width: 20%;         left: 40%;         position: absolute;         top: 40%;         cursor:pointer;    }</style><div id="main"><div id="content"><h2 id="pageTitle">Torqkd TV</h2><?php Yii::import('zii.widgets.ButtonColumn');  ?><?php$this->widget('bootstrap.widgets.TbExtendedGridView', array(    'type' => 'striped bordered',    // 'dataProvider' => new CActiveDataProvider('dev',array(    // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed    // ),    'dataProvider'=>$model->getvalue1(),    'template' => "{summary}{items}{pager}",    'id' =>'all-user-grid',    'ajaxUrl'=> Yii::app()->request->getUrl(),    //---------------------------------------------- this widget code is written add a bulk action------    'bulkActions' => array(),    //----------------------------------------------End of bulk action-------    'enablePagination' => true,    'summaryText'=>'Displaying {start}-{end} of {count} results.',    'filter'=>$model,    'columns' => array(        array(            'class' => 'bootstrap.widgets.TbDataColumn',            'name' => 'name',            'filter' => false,           'id'=>'$data[id]',                 'value' => '($data["type"])?"<div class=\"imgdiv\"><img src=\"//i1.ytimg.com/vi/".$data["value"]."/mqdefault.jpg\" alt=\"Thumbnail\" width=\"200px\"><img class=\"playimg\" src=\"".Yii::app()->theme->baseUrl."/images/youplay.png\" alt=\"".$data["value"]."\"></div>":"<div class=\"imgdiv1\" ><img class=\"playimg1\" src=\"".Yii::app()->theme->baseUrl."/images/youplay.png\" alt=\"".$data["value"]."\"></div>"',            'sortable'=>true,               'type'=>'html',                        ),        array(            'class' => 'bootstrap.widgets.TbDataColumn',            'name' => 'time',            'filter' => false,            'value' => 'date("m/d/y",$data["time"])',            'id'=>'$data[id]',            'header'=>'Date',            'sortable'=>true,        ),        array(            'class' => 'bootstrap.widgets.TbDataColumn',            'name' => 'type',            'filter' => false,            'value' => '($data["type"]==1)?"Active":"Inactive"',            'id'=>'$data[id]',            'header'=>'Status',            'sortable'=>true,        ),        //------------------------- End Additional Action Links----------------------------    )));?></div><?php $this->beginWidget(    'bootstrap.widgets.TbModal',    array('id' => 'myModal')); ?><div class="modal-header">    <a class="close" data-dismiss="modal">&times;</a>    <h4>Sports Description:</h4></div><div class="modal-body" id="swdesc"></div><div class="modal-footer">    <?php $this->widget(        'bootstrap.widgets.TbButton',        array(            'label' => 'Close',            'url' => '#',            'htmlOptions' => array('data-dismiss' => 'modal','class'=>'modal-btn'),        )    ); ?></div><?php $this->endWidget(); ?>    <?php $this->beginWidget(        'bootstrap.widgets.TbModal',        array('id' => 'myModal1')        ); ?>    <div class="modal-header">        <a class="close" data-dismiss="modal">&times;</a>        <h4>Video</h4>    </div>    <div class="modal-body" id="swdesc1">        <!--<input class="vid_id" type="text" readonly="readonly" style="margin: 10px;">  -->        <a href="res" id="player"  style="display:block;width:400px;height:300px;margin:10px;padding:1px;border:2px solid #ccc" > </a>    </div>         <?php $this->endWidget(); ?>                <?php $this->beginWidget(        'bootstrap.widgets.TbModal',        array('id' => 'myModal2')        ); ?>    <div class="modal-header">        <a class="close" data-dismiss="modal">&times;</a>        <h4>Video</h4>    </div>    <div class="modal-body" id="swdesc2" style="height: 500px;">    <!--<object width="100%" height="100%"><a id="related" class="youflow" href="api:Q_6qRyYn-68" style="width:480px;height:320px"></a></object>-->                 </div>    </div>         <?php $this->endWidget(); ?></div></div><script type="text/javascript">function play_vid(vidid){                                        $f("relate", "<?php echo yii::app()->getBaseUrl(true) ?>/swf/flowplayer.swf", {                                            plugins:  {                                                youtube: {                                                    url:'<?php echo yii::app()->getBaseUrl(true) ?>/swf/flowplayer.youtube-3.2.11.swf',                                                    enableGdata: false,                                                    loadOnStart: false,                                                    displayErrors: true                                                }                                            },                                            clip: {                                                provider: 'youtube',                                                url: 'api:'+vidid,                                                autoPlay: false,                                                //duration: 10                                                //autoBuffering: true                                            },                                        }) }                                      </script>