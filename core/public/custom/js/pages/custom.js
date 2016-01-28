$(function(){

    var onloads = {
        _init: function(){
            $('.modal-trigger').leanModal();
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 100 // Creates a dropdown of 15 years to control year
            });
            $('select').material_select();
            $('.button-collapse').sideNav();
            if($('#email_address').val() != ""){
                $('#modal-login').openModal();
            }
            $('fixed-action-btn').openFAB();
        }
    };
    var onchanges = {
        _init: function(){
            $('.option-choose-specy').on('change', function(){
                var CSRF_TOKEN = $('#modal-create-character').find('input[name="_token"]').val();
                var sHtml = '';
                var i=0;
                var valHmtl = $('.option-choose-character');

                valHmtl.material_select('destroy');
                valHmtl.html("");
                $('.div-choose-character').find('.caret').html("");
                console.log(valHmtl);
                $.ajax({
                    url: '/family/get_by_specy',
                    type: "POST",
                    dataType: "JSON",
                    data: {'specy_id': $(this).val(),
                        '_token' : CSRF_TOKEN}
                }).done(function(response){
                    console.log(response);
                    for(i; i < response.length; i++){
                        sHtml = sHtml + '<option value=" '+ response[i].id +' ">' + response[i].family_name + '</option>';
                    }
                    console.log(sHtml);
                    valHmtl.append(sHtml);
                    valHmtl.material_select('update');
                });
                //console.log($(this).val());
            });
        }
    };

    var onclicks = {
        _init: function(){
            $('.character-options').on('click', function(e){

                console.log($(this).parents("form").find('input[name="_token"]').val());
                e.preventDefault();
                var character_option = $(this).data('character-option');
                switch (character_option){
                    case 'change_current_character':
                        console.log($(this).parents().closest('.character-details-container').data('character'));
                        var data = $(this).parents().closest('.character-details-container').data('character');

                        var CSRF_TOKEN = $('.character-options-form').find('input[name="_token"]').val();
                        $.ajax({
                            url: '/character/change_character',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                'character_id': data.id,
                                '_token' : CSRF_TOKEN}
                        }).done(function(response){
                            console.log($(this).find(".change_character").text());
                            //Materialize.toast(response, 4000);
                        });
                        break;
                    default:
                        break;
                }


            });
        }
    };
    onloads._init();
    onchanges._init();
    onclicks._init();
});