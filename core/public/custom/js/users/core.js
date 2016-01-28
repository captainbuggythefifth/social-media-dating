//Controller
var dating = dating || {};

dating.core = {
    init: {
        onload: function(){
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
            $('.collapsible').collapsible();
            $('.tooltipped').tooltip({
                position: "top",
                delay: 0,
                tooltip: $(this).data('tooltip')
            });
            $('.parallax').parallax();
            $('.slider').slider();

            /*var options = [
                {selector: '.parallax-container', offset: 100, callback: '$(".add-character").fadeOut("")'},
                {selector: '.character-main-container', offset: 100, callback: '$(".add-character").fadeIn("")'}
            ];
            Materialize.scrollFire(options);*/
            $('.materialboxed').materialbox();

        },
        _reload: function(){
            $('.collapsible').collapsible();
            $('.tooltipped').tooltip({
                position: "top",
                delay: 0,
                tooltip: $(this).data('tooltip')
            });
        }
    },

    Binders: {
        _user: {
            _create: {},
            _display: {
                _get_list: function(){

                },
                _get_info: function(e){
                    var $this = $(e.target);
                    $this.hide();
                    $this.siblings('span').show();
                    var _attr_name = $this.siblings('span').find('input').attr("name");
                    var _user_info = $this.data('user-info');
                    $this.siblings('span').find('input[name="'+ _attr_name +'"]').val(_user_info).focus();
                    $this.siblings('div').find('input[name="'+ _attr_name +'"]').on("blur", function() {
                        $(this).parents('span').hide();
                        $this.show();
                    });
                    //$('.user-info-container').click();
                }
            },
            _update: {
                _settings: {
                    _profile: function(e){

                        var $this = $(e.target);
                        var data = {
                            'option' : $this.data('user-profile-settings-list'),
                            'settings_type' : 'user_profile',
                            '_token': $this.parents('#user-profile-settings-form').find('input[name="_token"]').val()
                        };
                        dating.service._user._update._settings._profile(data, {
                            success: function(result){
                                if(result.status == true){
                                    $this.parents().find('.user-profile-privacy-settings-badge').text($this.text());
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function(result){

                            }
                        });
                    },
                    _chat: function(e){

                        var $this = $(e.target);
                        var data = {
                            'option' : $this.data('user-chat-settings-list'),
                            'settings_type' : 'user_chat',
                            '_token': $this.parents('#user-chat-settings-form').find('input[name="_token"]').val()
                        };
                        dating.service._user._update._settings._chat(data, {
                            success: function(result){
                                if(result.status == true){
                                    $this.parents().find('.user-chat-privacy-settings-badge').text($this.text());
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function(result){

                            }
                        });
                    }
                },
                _settings_status: {
                    _chat_disable: function(e){

                        var $this = $(e.target);
                        var data = {
                            'status_type' : 'chat',
                            'status' : $this.is(':checked'),
                            '_token': $this.parents('#user-chat-settings-form').find('input[name="_token"]').val()
                        };
                        dating.service._user._update._settings_status._chat_disable(data, {
                            success: function(result){
                                if(result.status == true){
                                    if($this.is(':checked') == false){
                                        $this.parents().find('.user-chat-privacy-settings').prop('disabled', true);
                                        console.log($this.parents().find('.user-chat-privacy-settings'));
                                    }
                                    else{
                                        $this.parents().find('.user-chat-privacy-settings').prop('disabled', false);
                                    }
                                }
                                Materialize.toast(result.message, 4000);

                            },
                            done: function(result){

                            }
                        });
                    },
                    _profile_disable: function(e){

                        var $this = $(e.target);
                        var data = {
                            'status_type' : 'profile',
                            'status' : $this.is(':checked'),
                            '_token': $this.parents('#user-profile-settings-form').find('input[name="_token"]').val()
                        };
                        dating.service._user._update._settings_status._profile_disable(data, {
                            success: function(result){
                                if(result.status == true){
                                    if($this.is(':checked') == false){
                                        $this.parents().find('.user-profile-privacy-settings').prop('disabled', true);
                                    }
                                    else{
                                        $this.parents().find('.user-profile-privacy-settings').prop('disabled', false);
                                    }
                                }
                                Materialize.toast(result.message, 4000);

                            },
                            done: function(result){

                            }
                        });
                    }
                },
                _profile: {
                    _name: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._name(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _email_address: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._email_address(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    console.log($this.parents().closest('li').has('.active').find(".collapsible-header"));
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _password: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._password(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    console.log($this.parents().closest('li').has('.active').find(".collapsible-header"));
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _birth_date: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._birth_date(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    console.log($this.parents().closest('li').has('.active').find(".collapsible-header"));
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _country: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._country(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    console.log($this.parents().closest('li').has('.active').find(".collapsible-header"));
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _gender: function (e) {
                        var $this = $(e.target);
                        var data = $this.serialize();
                        dating.service._user._update._profile._gender(data, {
                            success: function (result) {
                                if (result.status == true || result.status == "true") {
                                    console.log($this.parents().closest('li').has('.active').find(".collapsible-header"));
                                    $this.parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
                                }
                                Materialize.toast(result.message, 4000);
                            },
                            done: function (result) {
                            }
                        });
                    },
                    _avatar: function (e) {
                        var $this = $(e.target);
                        //var input = $($this.find('input[name="character_avatar"]'));

                        var _file = $this[0].files[0];
                        var formData = new FormData();
                        var aForm = $this.serializeArray();
                        formData.append("user_avatar", _file);
                        formData.append("_token", $this.parent().find('input[name="_token"]').val());

                        aForm.forEach(function (element) {
                            formData.append(element.name, element.value);
                        });

                        dating.service._user._update._profile._avatar(formData, {
                            success: function (result) {
                                if (result.status == "true" || result.status == true) {
                                    $this.parents().find(".parallax").find("img").attr('src', window.base_url + result.link);
                                }
                            },
                            done: function (result) {

                            }
                        })
                    }
                }
            },
            _delete: {}
        },

        _character: {
            _display: {
                _get_list: function(e){
                    var $this = $(e.target);
                },
                _get_details: function(data){

                }
            },
            _create: {

            },
            _update: {
                _current: function (e) {
                    var $this = $(e.target);
                    var data = $this.parents().closest('.character-details-container').data('character');
                    data._token = $this.parents("form").find('input[name="_token"]').val();
                    data.character_id = data.id;
                    dating.service._character._update._current(data, {
                        success: function(result){
                            /*$this.parents().find('.character-avatar-mini').attr('src', );*/
                            $this.parents().find('.current-character-avatar').attr('src', window.base_url + result.character_avatar_mini);
                            Materialize.toast(result.result_message, 4000);
                        },
                        done: function(data){
                        }
                    });
                },
                _used: function(e){
                    var $this = $(e.target);
                    var data = $this.closest('.character-details-container').data('character');
                    data._token = $this.parents("form").find('input[name="_token"]').val();
                    dating.service._character._display._get_details(data, {
                        success: function(result){
                            //console.log(result);
                            var $form_edit_character = $($this.parents().find('#modal-edit-character').children('form')[0]);
                            $form_edit_character.find("input[name='character_id']").val(result.id);
                            $form_edit_character.find("input[name='character_name']").val(result.character_name).focus();
                            $form_edit_character.find("input[name='character_age']").val(result.character_age).focus();
                            $form_edit_character.find("img.responsive-img").attr('src', window.base_url + result.character_avatar_mini);
                            $form_edit_character.find("input[name='character_description']").val(result.character_description).focus();

                        },
                        done: function(result){
                            //console.log(result);
                        }
                    });
                    //console.log(data);
                },
                _save: function(e){
                    var $this = $(e.target);

                    var input = $($this.find('input[name="character_avatar"]'));

                    var _file = input[0].files[0];
                    var formData = new FormData();
                    var aForm = $this.serializeArray();
                    formData.append("character_avatar", _file);
                    formData.append("_token", $this.find('input[name="_token"]').val());

                    aForm.forEach(function (element) {
                        formData.append(element.name, element.value);
                    });
                    dating.service._character._update._save(formData, {
                        success: function(result){
                            var $character = $('body').find('li').has('.active');
                            $character.children().find('img').attr('src', window.base_url + result.character_avatar_mini);
                            $character.children().find('.span-collapsible-header-character-name').text(result.character_name);
                            $character.children().find('.span-collapsible-body-character-description').text(result.character_description);

                            $('#modal-edit-character').closeModal();
                            Materialize.toast("Successfully updated character", 4000);

                        },
                        done: function(result){
                        }
                    })

                },
                _archive: function(e){
                    var $this = $(e.target);
                    var data = {
                        'character_id': $this.closest('.character-details-container').data('character').id,
                        '_token': $this.parents("form").find('input[name="_token"]').val()
                    };
                    console.log(data);
                    //var character_status = $this.parents().closest('.collapsible-characters-container').data('character-status');
                    dating.service._character._update._archive(data, {
                        success: function(result){
                            Materialize.toast(result.message, 4000);
                            var $active_characters_container = $this.parents().closest('.collapsible-active-characters-container');
                            var $character = $active_characters_container.find('li').has('.active');
                            $character.fadeOut(500, function(){ $(this).remove();});
                            var $archived_characters_container = $($this.parents().find('.collapsible-archived-characters-container'));
                            $archived_characters_container.find('.collapsible').append($(result.view));
                            dating.core.init._reload();
                        },
                        done: function(result){

                        }
                    });

                },
                _activate: function(e){
                    var $this = $(e.target);
                    var data = {
                        'character_id': $this.closest('.character-details-container').data('character').id,
                        '_token': $this.parents("form").find('input[name="_token"]').val()
                    };
                    //var character_status = $this.parents().closest('.collapsible-characters-container').data('character-status');
                    dating.service._character._update._activate(data, {
                        success: function(result){
                            Materialize.toast(result.message, 4000);
                            var $archived_characters_container = $this.parents().closest('.collapsible-archived-characters-container');
                            var $character = $archived_characters_container.find('li').has('.active');
                            $character.fadeOut(500, function(){ $(this).remove();});
                            var $active_characters_container = $($this.parents().find('.collapsible-active-characters-container'));
                            $active_characters_container.find('.collapsible').append($(result.view));
                            dating.core.init._reload();
                        },
                        done: function(result){

                        }
                    });

                }

            },
            _delete: {
                _used: function(e) {
                    var $this = $(e.target);
                    var data = {
                        'character_id': $this.find('input[name="character_id"]').val(),
                        '_token': $this.find('input[name="_token"]').val()
                    };
                    dating.service._character._delete._used(data, {
                        success: function(result){
                            $('#modal-delete-character').closeModal();
                            Materialize.toast(result.message, 4000);
                            var $character = $('body').find('li').has('.active');
                            $character.fadeOut(300, function(){ $(this).remove();});
                        },
                        done: function(result){

                        }
                    });
                },
                _assign_id: function(e){
                    var $this = $(e.target);
                    var data = $this.closest('.character-details-container').data('character');
                    $('body').find('#modal-delete-character').find('form').find('input[name="character_id"]').val(data.id);
                }
            }
        },
        _family: {
            _display: {
                _get_list: function(e){
                    var $this = e.target;
                    var CSRF_TOKEN = $('#modal-create-character').find('input[name="_token"]').val();
                    var sHtml = '';
                    var i=0;
                    var valHmtl = $('.option-choose-character');

                    valHmtl.material_select('destroy');
                    valHmtl.html("");
                    $('.div-choose-character').find('.caret').html("");
                    var data = {
                        specy_id : $($this).val(),
                        _token: CSRF_TOKEN
                    };
                    dating.service._family._display._get_list(data, {
                        success: function(response){
                            for(i; i < response.length; i++){
                                sHtml = sHtml + '<option value=" '+ response[i].id +' ">' + response[i].family_name + '</option>';
                            }
                            $('.div-choose-character').find('.caret').html("");
                            valHmtl.append(sHtml);
                            valHmtl.material_select('update');
                            valHmtl.find('caret').remove();
                        },
                        done: function(result){

                        }
                    });
                },
                _get_details: function(e){

                }
            },
            _create: {

            },
            _update: {

            },
            _delete: {

            }
        },
        _comment: {
            _display: {
                _get_list: function(e) {
                },
                _get_details: function(e){
                    var $this = $(e.target);
                    var $div_comment_container = $('#modal-comment');
                    var from_id = $this.data('comment-from-id');
                    var to_user_id = $this.parents('.user-profile-information').data('user');
                    var from_type = $this.data('comment-from-type');
                    console.log(from_type);
                    var data = {
                        "from_id" : from_id,
                        "from_type" : from_type,
                        "_token" : $div_comment_container.find('form').find('input[name="_token"]').val()
                    };
                    dating.service._comment._display._get_details_from_photo(data, {
                        success: function(result){
                            if(result.status == true || result.status == "true"){
                                $div_comment_container.find('.comment-item').html((result.what_to_display + result.view));
                            }
                            else{
                                Materialize.toast(result.message);
                            }
                        },
                        done: function(result){

                        }
                    });

                    $div_comment_container.find('form').find('input[name="comment-to-user-id"]').val(to_user_id);
                    $div_comment_container.find('form').find('input[name="comment-from-id"]').val(from_id);
                    $div_comment_container.find('form').find('input[name="comment-from-type"]').val(from_type);
                },
                _add_photo_preview: function(e){
                    var $this = $(e.target);
                    $this.parents('.comment-form-container').find('.photo-comment-preview').find('img').attr('src', URL.createObjectURL(e.target.files[0]));
                    $this.parents('.comment-form-container').find('.photo-comment-preview').show();
                },
                _delete_photo_preview: function(e){
                    var $this = $(e.target);
                    console.log($this);
                    $this.parents('.comment-form-container').find('input[name="comment-photo"]').wrap('<form>').closest('form').get(0).reset();
                    $this.parents('.comment-form-container').find('input[name="comment-photo"]').unwrap();
                    $this.parents('.comment-form-container').find('.photo-comment-preview').hide();
                    console.log($this.parents('.comment-form-container').find('input[name="comment-photo"]'));
                }
            },
            _create: {
                _add: function(e){

                    var $this = $(e.target);
                    var input = $($this.find('input[name="comment-photo"]'));
                    var _file = input[0].files[0];
                    var formData = new FormData();
                    var aForm = $this.serializeArray();
                    var $div_comment_container = $('#modal-comment');

                    formData.append("comment-photo", _file);
                    aForm.forEach(function (element) {
                        formData.append(element.name, element.value);
                    });

                    dating.service._comment._create._add(formData, {
                        success: function(result){
                            $div_comment_container.find('.comment-item').find('.collection').append(result.view);
                            $div_comment_container.find('form').find('input[name="comment-text"]').val("");
                            $div_comment_container.find('input[name="comment-photo"]').wrap('<form>').closest('form').get(0).reset();
                            $div_comment_container.find('input[name="comment-photo"]').unwrap();
                            $div_comment_container.find('.photo-comment-preview').hide();
                            $div_comment_container.focusout();
                        },
                        done: function(result){

                        }
                    });
                }
            },
            _update: {

            },
            _delete: {

            }
        },
        _like: {
            _display: {
                _get_list: function(e) {
                },
                _get_details: function(e){

                }
            },
            _create: {
                _add: function(e){
                    var $this = $(e.target);
                    $this.parent().removeClass("animated bounce");

                    var $div_comment_container = $('#modal-comment');
                    var like_from_id = $this.data('like-from-id');
                    var to_user_id = $this.parents('.user-profile-information').data('user');
                    var like_from_type = $this.data('like-from-type');
                    var data = {
                        "like_from_id" : like_from_id,
                        "_token" : $div_comment_container.find('form').find('input[name="_token"]').val(),
                        "to_user_id" : to_user_id,
                        "like_from_type" : like_from_type
                    };
                    dating.service._like._create._add(data, {
                        success: function(result){
                            if(result.status == "true" || result.status == true){
                                result.like = $.parseJSON(result.like);
                                if((result.like.liked == "true" || result.like.liked == true) && (result.like.unliked == "false" || result.like.unliked == false)){
                                    $this.parent().removeClass("lighten-1");
                                    $this.parent().addClass("darken-3");
                                    if($this.data('to-animate') == "true" || $this.data('to-animate') == true){
                                        $this.parent().addClass("animated bounce");
                                    }
                                }
                                else{
                                    $this.parent().removeClass("darken-3");
                                    $this.parent().addClass("lighten-1");
                                }
                            }else{
                                Materialize.toast(result.message, 4000);
                            }
                        },
                        done: function(result){

                        }
                    });
                }
            },
            _update: {

            },
            _delete: {

            }
        },

        _mate: {
            _display: {
                _get_list: function(e) {
                },
                _get_details: function(e){

                }
            },
            _create: {
                _add: function(e){
                    var $this = $(e.target);
                    //console.log($this.parents().find('form').find('input[name="_token"]').val());
                    var data = {
                        "from_user_id" : $this.parents().find('#logged-in-user').data('user'),
                        "to_user_id"    : $this.parents().closest('.user-profile-information').data('user'),
                        "_token"        : $this.parents().find('form').find('input[name="_token"]').val()
                    };
                    dating.service._mate._create._add(data, {
                        success: function(result){
                            if(result.status == "true" || result.status == true){
                                $this.text('done');
                                $this.addClass('user-cancel-mate-request');
                                $this.removeClass('user-add-mate-request');
                                console.log(result.mate);
                                $this.parents().find('#mate-info-container').attr('data-mate', result.mate);
                            }else{
                                Materialize.toast(result.message, 4000);
                            }
                        },
                        done: function(result){

                        }
                    });

                }
            },
            _update: {
                _cancel: function(e){
                    var $this = $(e.target);
                    var data = $this.parents().find('#mate-info-container').data('mate');
                    data._token = $this.parents().find('form').find('input[name="_token"]').val();
                    console.log(data);
                    dating.service._mate._update._cancel(data, {
                        success: function(result){
                            if(result.status == "true" || result.status == true){
                                $this.text('contacts');
                                $this.removeClass('user-cancel-mate-request');
                                $this.addClass('user-add-mate-request');
                                $this.attr('data-mate', result.mate);
                                $this.parents().find('#mate-info-container').attr('data-mate', result.mate);
                            }else{
                                Materialize.toast(result.message, 4000);
                            }
                        },
                        done: function(result){

                        }
                    });
                },
                _accept: function(e){
                    var $this = $(e.target);
                    var data = $this.parents().find('#mate-info-container').data('mate');
                    data._token = $this.parents().find('form').find('input[name="_token"]').val();
                    dating.service._mate._update._accept(data, {
                        success: function(result){
                            if(result.status == "true" || result.status == true){
                                var $target = $this.parents().find('.user-profile-information').children().find('.dropdown-button');
                                $target.data('activates', "");
                                $target.children().find('.user-options-mate').addClass('user-cancel-mate-request').text('pause_circle_outline');
                                $target.children().find('.user-options-mate').attr('data-mate', result.mate);
                                Materialize.toast(result.message, 4000);
                            }else{
                                Materialize.toast(result.message, 4000);
                            }
                        },
                        done: function(result){

                        }
                    });
                },
                _remove: function(e){
                    var $this = $(e.target);
                    var data = $this.parents().find('#mate-info-container').data('mate');
                    data._token = $this.parents().find('form').find('input[name="_token"]').val();
                    console.log(data);

                    //return false;
                    dating.service._mate._update._remove(data, {
                        success: function(result){
                            if(result.status == "true" || result.status == true){
                                console.log(result);
                                $this.addClass('user-add-mate-request');
                                $this.text('contacts');
                                $this.removeClass('user-remove-mate');
                                $this.data('mate', data);
                                $this.parents().find('#mate-info-container').attr('data-mate', result.mate);
                                Materialize.toast(result.message, 4000);
                            }else{
                                Materialize.toast(result.message, 4000);
                            }
                        },
                        done: function(result){

                        }
                    });
                }
            },
            _delete: {

            }
        },

        _updates: {
            _display: {
                _get_details: function(e){
                    var data = {
                        'iOffset' : 0,
                        '_token' : e.parents().find('form').find('input[name="_token"]').val()
                    };
                    dating.service._updates._display._get_details(data, {
                        success: function(response){
                            e.append(response.view);
                        },
                        done: function(response){

                        }
                    });
                }
            }

        }


    }
};

dating.core.init.onload();
