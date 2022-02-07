$(document).ready(function () {
    $('#buying-price').on('keyup change',function () {
        $('#expected-selling-price').val($.fn.expectedSellingPriceCalculator());
    });

    $.fn.expectedSellingPriceCalculator = function()  {
        let cost = $('#buying-price').val();
        return cost * 1.4;
    }
});



