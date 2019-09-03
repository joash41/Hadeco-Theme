<?php
$instructions = get_field('product_instruction');
if($instructions){
    foreach ($instructions as $instruction) {;?>
    <div class="instruction">
        <div class="icon">
            <img src="<?php echo get_template_directory_uri();?>/images/svg/<?php echo $instruction['product_instr_icon'];?>"/>
        </div>
        <div class="instructionContent">
            <?php echo $instruction['product_instr_content'];?>
        </div>
    </div>
    <?php }
} else $defaultInstructions = get_field('default_planting_instructions');
if($defaultInstructions){?>
    <div class="default-instruction">
        <?php the_field('default_planting_instructions'); ?>
    </div>
<?php }; ?>