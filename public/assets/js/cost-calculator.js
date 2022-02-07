$(document).ready(function () {
    $('#academic-level-calculator').on('keyup change',function () {
        console.log($.fn.cppCost());
        $('#cost-per-page-calculator').val($.fn.cppCost());
        $('#total-cost-calculator').val($.fn.costRecalculate());
    });

    $('#number-pages-calculator').on('keyup change',function () {
        console.log($.fn.cppCost());
        $('#cost-per-page-calculator').val($.fn.cppCost());
        $('#total-cost-calculator').val($.fn.costRecalculate());
    });

    $.fn.costRecalculate = function() {
        let numberPages = $('#number-pages-calculator').val();
        return numberPages * $.fn.cppCost();
    };

    $.fn.cppCost = function()  {
        let cost = 0;
        let academicLevel = $('#academic-level-calculator option:selected').val();
        switch (academicLevel) {
            case "High":
                return 15;
            case "Under":
                return 17;
            case "Masters":
                return 20;
            case "PhD":
                return 24.5;
        }
        return cost;
    }
});



