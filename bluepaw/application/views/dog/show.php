<?php $this->load->view('common/bootstrap'); ?>


<title> <?php echo lang('dog_title_one') ?> </title>
<div class = 'container p-2 my-3 border shadow-sm'>
<h3><?=$title ?></h3>
</div>










<div class = 'container '>
    

    <div class="row">
    
        <div class="col-">
        <div class="card shadow-sm bg-light m-0" style="width: 250px">

            <?php if($record->kep_eleres == 'NULL' ): ?>
            <?php echo '<img src="/bluepaw/public/img/dog_rect.png" class="card-img-top" />'; ?>
            <?php else: ?>
            <?php echo '<img src='.'"/'.$record->kep_eleres.'"'.' width="150px" class="card-img-top"/>' ?>
            <?php endif ?>

            <div class="card-body ">
                <!-- <p class="card-text"></p> -->
                <!-- <a href="#" class="btn btn-warning">Gomb</a> -->



                <ul class="list-group">
                    <h4 class="card-title"> <?php echo lang('dog_name'); ?> </h4>
                    <li class="list-group-item">
                        <p class="card-text"><?=$record->nev?></p>
                    </li>
                    <h4 class=""card-title"> <?php echo lang('dog_gender'); ?> </h4>
                    <li class="list-group-item">      
                        <p class="card-text"><?=($record->nem == NULL ? lang('gender_not_recorded') : $record->nem)?></p>
                    </li>
                    <h4> <?php echo lang('dog_birth_year'); ?> </h4>
                    <li class="list-group-item">
                        <p class="card-text"><?=($record->szul_ev == NULL ? lang('unknown_birthday') : $record->szul_ev)?></p>
                    </li>
                </ul>

            </div>

            <?php echo anchor(base_url('dog/list'), lang('back_to_list'), ['class' => 'btn btn-primary p-2']); ?>
        </div>
        </div>
        
        <div class="col">
            <div class="card shadow-sm bg-light m-0 p-3 ">
            <h4 class="card-title"> <?php echo lang('description'); ?> </h4>
            <p class="card-text"><?=($record->leiras == NULL ? lang('no_description_found') : $record->leiras)?></p>
            <?php echo anchor(base_url('dog/update/'.$record->id), lang('edit'), ['class' => 'btn btn-info']); ?>
            </div>
        </div>

    </div>
    
</div>