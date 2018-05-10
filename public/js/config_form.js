$(function(){
  
  function parser_config_form_submit(e){    
    var form = $(this);
    var url = $(form).attr('action');
    var cell_order = '';
    $('.catalogue__parser_wrap').find('td.cell_item').each(function(i,e){
      $("#parser_config_columns").val(cell_order += $(e).attr('name') + ';');  
    })
    cell_data = {cell_order: cell_order};
    return true;
  }
  
  function cell_delete(){
    var item = $(this).closest('td.cell_item');
    var name = $(this).closest('td.cell-name').text();
    var link = '<li><a href="javascript:void(0);" class="ajax cell_restore" name="'+$(item).attr('name')+'">'+name+'</a></li>';
    $('#parser_cells_deleted .box ul').append(link);
    if ($('#parser_cells_deleted').is(':hidden'))
      $('#parser_cells_deleted').show();
    $(item).remove();
    $('.first-row td:last').remove();
    parser_config_init();

  }
  
  function cell_restore(){
      var cell = $('td.cell_item.prototype').clone();
      $(cell).removeClass('prototype')
          .attr('name', $(this).attr('name'))
          .find('td.cell-name .cell-name-block')
          .text($(this).text() + ' ');
      var del_link = $('.cell_delete.prototype').clone();
      $(del_link).removeClass('prototype')
          .appendTo($(cell).find('td.cell-name .cell-name-block'));
      var last = $.trim($('.first-row td:last').text());
      var next = String.fromCharCode(last.charCodeAt(0) + 1);
      $('<td>' + next + '</td>').appendTo($('.first-row'));

      $('#parser_cells').append(cell);
      $(this).parent().remove();
      if (!$('#parser_cells_deleted .box a').length)
          $('#parser_cells_deleted').hide();
      parser_config_init()
  }
  
  function message_form() {
    $('#message_form').remove();
  }
  
  function recount_level(){
    var catlevel = parseInt($('#parser_config_parser_price_subcategory').val()),
        current_catlevel = $('.column-category-char').length,
        diff = catlevel - current_catlevel;

    if (diff > 0){
      var cell, text, i;
      for (i = 0; i < diff; i++){
        if ((current_catlevel + i) == 1)
          text = 'Подраздел <br /> (2 уровень)';
        if ((current_catlevel + i) == 2)
          text = 'Подраздел <br /> (3 уровень)';
        $('.column-category-char:last').after($('.column-category-char:first').clone());

        cell = $('.cell-category:last').clone();
        $(cell).find('.cell-name').html(text);
        
        $('.cell-category:last').after(cell);
      }
    }
    
    else {
      var i;
      for (i = diff; i < 0; i++){
        $('.column-category-char:last').remove();
        $('.cell-category:last').remove();
      }
    }
    recount_columns();
  }
  
  function recount_columns(){
    var value = $('#parser_config_parser_price_first_column').val();
    if (isNaN(value))
      var fcolumn = String.charCodeAt(value) - 64;
    else 
      var fcolumn = parseInt(value);
    if (fcolumn > 0){
      $('.column-char').each(function (index, element){
        $(element).text(String.fromCharCode(65 + fcolumn - 1 + index));
      })
    }
  }
  
  function parser_config_init(){
    $('.catalogue__parser_wrap').sortable({items: '.cell_item'});
    $('.cell_delete').unbind('click').bind('click', cell_delete);
    $('.cell_restore').unbind('click').bind('click',cell_restore)
    $('#parser_config_form').bind('submit', parser_config_form_submit);
    setTimeout(message_form, 3000);
    // $('select').as_select();
    $('#parser_config_parser_price_subcategory').unbind('change').bind('change', recount_level);
    $('#parser_config_parser_price_first_column').unbind('change').bind('change', recount_columns);
  }
  
  parser_config_init();
  
})
