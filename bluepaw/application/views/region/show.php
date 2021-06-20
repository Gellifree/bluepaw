<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('region_title_one') ?> </title>



<div class = 'container p-2 my-3 border shadow text-white bg-dark rounded'>
<h3><?=$title ?></h3>
</div>
<div class = 'container '>
    <div class="row">
        <div class="col-">
        <div class="card shadow-sm bg-light m-0" style="width: 250px">
            
            <img src='/bluepaw/public/img/region_rect.png' width='' class="card-img-top"/>
            
            <div class="card-body ">
                <!-- <p class="card-text"></p> -->
                <!-- <a href="#" class="btn btn-warning">Gomb</a> -->

                <ul class="list-group">
                    <h4> <?php echo lang('identification'); ?> </h4>
                    <li class="list-group-item">
                        <p class="card-text"><?=$record->id?></p>
                    </li>
                    <h4 class="card-title"> <?php echo lang('region_name'); ?> </h4>
                    <li class="list-group-item">
                        <p class="card-text"><?=$record->nev?></p>
                    </li>
                   
                    
                </ul>

            </div>

            <?php echo anchor(base_url('region/list'), lang('back_to_list'), ['class' => 'btn btn-primary p-2']); ?>
        </div>
        </div>
        
        <div class="col">
            <div class="card shadow-sm bg-light m-0 p-3 ">
            <h4 class="card-title"> <?php echo lang('description'); ?> </h4>
            <p class="card-text"><?=($record->leiras == NULL ? lang('no_description_found') : $record->leiras)?></p>
            <?php echo anchor(base_url('region/update/'.$record->id), lang('edit'), ['class' => 'btn btn-warning']); ?>
            </div>
        </div>

    </div>
    
</div>