function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function removeCommas(nStr){
    return nStr.replace(/,/g, '')
}

$(function () {
    $('[data-bs-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
  $( ".my-navigation .nav-item" ).bind( "click", function(event) {
      event.preventDefault();
      var clickedItem = $( this );
      $( ".mr-auto .nav-item" ).each( function() {
          $( this ).removeClass( "active" );
      });
      clickedItem.addClass( "active" );
  });
});

$('.star').on('click',  function () {
  if($(this).hasClass('rate_5')){
    $('.rate_5').css('color', '#FFC107')
    $('.rate_4').css('color', '#FFC107')
    $('.rate_3').css('color', '#FFC107')
    $('.rate_2').css('color', '#FFC107')
    $('.rate_1').css('color', '#FFC107')
    $('.rating-input').val(5)
  } else if($(this).hasClass('rate_4')){
    $('.rate_5').css('color', '#212529')
    $('.rate_4').css('color', '#FFC107')
    $('.rate_3').css('color', '#FFC107')
    $('.rate_2').css('color', '#FFC107')
    $('.rate_1').css('color', '#FFC107')
    $('.rating-input').val(4)
  } else if($(this).hasClass('rate_3')){
    $('.rate_5').css('color', '#212529')
    $('.rate_4').css('color', '#212529')
    $('.rate_3').css('color', '#FFC107')
    $('.rate_2').css('color', '#FFC107')
    $('.rate_1').css('color', '#FFC107')
    $('.rating-input').val(3)
  } else if($(this).hasClass('rate_2')){
    $('.rate_5').css('color', '#212529')
    $('.rate_4').css('color', '#212529')
    $('.rate_3').css('color', '#212529')
    $('.rate_2').css('color', '#FFC107')
    $('.rate_1').css('color', '#FFC107')
    $('.rating-input').val(2)
  } else if($(this).hasClass('rate_1')){
    $('.rate_5').css('color', '#212529')
    $('.rate_4').css('color', '#212529')
    $('.rate_3').css('color', '#212529')
    $('.rate_2').css('color', '#212529')
    $('.rate_1').css('color', '#FFC107')
    $('.rating-input').val(1)
  }
})

$(function () {
  newVal=0;
  $('input.subtotal').each(function () {
    newVal += parseFloat(removeCommas($(this).val()))
  })

  $('.total').val(addCommas(newVal))
})

$('input[data-name="quantity"]').on('change', function () {
  subtotal = $(this).parent().parent().parent().find('.subtotal')
  cost = parseFloat(($(this).data('price')))
  quantity = parseFloat(removeCommas($(this).val()))
  console.log(subtotal.val())
  subtotal.val(addCommas(cost*quantity))

  newVal=0;
  $('input.subtotal').each(function () {
    newVal += parseFloat(removeCommas($(this).val()))
  })

  $('.total').val(addCommas(newVal))
})