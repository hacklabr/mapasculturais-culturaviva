(function ($) {
    $(function () {
        /**
         * Mostra SEM CNPJ
         */
        $('.js-btn-sem-cnpj').on('click', function (e) {
            e.preventDefault();
            $('.js-com-cnpj').hide(100);
            $('.js-btn-com-cnpj').removeClass('bg-laranja');
            $('.js-sem-cnpj').show(100);
            $('.js-btn-sem-cnpj').addClass('bg-laranja');
        });

        /**
         * Mostra COM CNPJ
         */
        $('.js-btn-com-cnpj').on('click', function (e) {
            e.preventDefault();
            $('.js-sem-cnpj').hide(100);
            $('.js-btn-sem-cnpj').removeClass('bg-laranja');

            $('.js-com-cnpj').show(100);
            $('.js-btn-com-cnpj').addClass('bg-laranja');
        });

         /**
         * MODAL
         */
        $('.js-modal').on('click', function (e) {
            e.preventDefault();
            $('.modal').show(100);
        });

        $('.js-close-modal').on('click', function (e) {
            e.preventDefault();
            $('.modal').hide(100);
        });

        /**
         * Mostrar Criterios boxs Click
         */
        $('.js-icons span').on('click', function () {
            $('.slide').hide(100);
            var className = $(this).attr('class');
            className = className.split(" ");        
            var name = className[0].replace('icon-','js-');
            $('.'+name).show(100);
        });
            
        /*
        * Slide Criterios Boxs
        */
        var contI;
        function slide(){
            var cont = $(".slide").length;
            if(contI < cont){
                contI = contI+1;
            }else{
                contI = 1;
            }
            var slide = ".sl"+contI;
            
            var icon = ".ic"+contI;

            $(".slide").hide(400);
            $(slide).show(400);
            
            $(".active").removeClass("active");
            $(icon).addClass("active");

        }
        setInterval(slide,6000);

    });



})(jQuery);
