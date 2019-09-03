jQuery(document).ready(function(){
    jQuery('.variations select').each(function (selectIndex, selectElement) {

    var select = jQuery(selectElement);
    buildSelectReplacements(selectElement);

    select.parent().on('click', '.radioControl', function(){
        var selectedValue,
        currentlyChecked = jQuery(this).hasClass('checked');
        jQuery(this).parent().parent().find('.radioControl').removeClass('checked');
        if(!currentlyChecked){
            jQuery(this).addClass('checked');
            selectedValue = jQuery(this).data('value');
        } else {
            selectedValue = '';
        }

        select.val(selectedValue);
        select.find('option').each(function(){
            jQuery(this).prop('checked', (jQuery(this).val()==selectedValue) ? true : false);
        });
        select.trigger('change');
    });
    jQuery('.reset_variations').on('mouseup', function(){
        jQuery('.radioControl.checked').removeClass('checked');        
    });

});

jQuery('.variations_form').on('woocommerce_update_variation_values', function(){
    selectValues = {};
    jQuery('.variations_form select').each(function(selectIndex, selectElement){
        var id = $(this).attr('id');
        selectValues[id] = $(this).val();
        jQuery(this).parent().find('label').remove();

        //Rebuild Select Replacement Spans
        buildSelectReplacements(selectElement);

        //Reactivate Selectd Values
        jQuery(this).parent().find('span').each(function(){
            if(selectValues[id]==$(this).data('value')){
                $(this).addClass('checked');
            }
        });
    });
});

function buildSelectReplacements(selectElement){
    var select = $(selectElement);
    var container = select.parent().hasClass('radioSelectContainer') ? select.parent() : jQuery("<div class='radioSelectContainer' />");
    select.after(select.parent().hasClass('radioSelectContainer') ? '' : container);
    container.addClass(select.attr('id'));
    container.append(select);

    select.find('option').each(function (optionIndex, optionElement) {
        if(jQuery(this).val()=="") return;
        var label = jQuery("<label />");
        container.append(label);

        jQuery("<span class='radioControl' data-value='"+$(this).val()+"'>" + $(this).text() + "</span>").appendTo(label);
    });
}
});