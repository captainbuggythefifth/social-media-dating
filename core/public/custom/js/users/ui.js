//VIEW - BINDERS ONLY INCLUDING OBJECT CALL
var dating = dating || {};


//$('.fixed-action-btn').openFAB();

var $datingHTMLBody = $('body');

$datingHTMLBody.on('change', '.option-choose-specy', function(e){
    dating.core.Binders._family._display._get_list(e);
});


$datingHTMLBody.on('click', '.character-options-change', function(e){

    dating.core.Binders._character._update._current(e);

});

$datingHTMLBody.on('click', '.character-options-edit', function(e){
    dating.core.Binders._character._update._used(e);
});

$datingHTMLBody.on('click', '.user-profile-privacy-settings', function(e){

});

$datingHTMLBody.on('submit', '#edit-used-character', function(e){
    e.preventDefault();
    dating.core.Binders._character._update._save(e);
});

$datingHTMLBody.on('click', '.character-options-delete', function(e){
    dating.core.Binders._character._delete._assign_id(e);
});

$datingHTMLBody.on('submit', '#delete-used-character', function(e){
    e.preventDefault();
    dating.core.Binders._character._delete._used(e);
});

$datingHTMLBody.on('click', '[data-user-profile-settings-list]', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._settings._profile(e);
});

$datingHTMLBody.on('click', '[data-user-chat-settings-list]', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._settings._chat(e);
});

$datingHTMLBody.on('change', '#user-chat-disable-options', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._settings_status._chat_disable(e);
});

$datingHTMLBody.on('change', '#user-profile-disable-options', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._settings_status._profile_disable(e);
});

$datingHTMLBody.on('click', '.character-options-archive', function(e){
    e.preventDefault();
    dating.core.Binders._character._update._archive(e);
});

$datingHTMLBody.on('click', '.character-options-activate', function(e){
    e.preventDefault();
    dating.core.Binders._character._update._activate(e);
});

$datingHTMLBody.on('click', '.user-change-avatar', function(e){
    e.preventDefault();
    $datingHTMLBody.find('#user_avatar').click();
});

$datingHTMLBody.on('change', '#user_avatar', function(e){
    dating.core.Binders._user._update._profile._avatar(e);
});

$datingHTMLBody.on('mouseover', '.parallax-container, .profile-current-character-avatar', function(e){
    e.stopPropagation();
    $('.edit-parallax-photo').css({
        visibility : "inherit"
    });
});

$datingHTMLBody.on('mouseout', '.parallax-container', function(){
    $('.edit-parallax-photo').css({
        visibility : "hidden"
    });
});

$datingHTMLBody.on('click', '.editable', function(e){
    dating.core.Binders._user._display._get_info(e);
});

$datingHTMLBody.on('click', '.cancel-accordion-button', function(e){
    $(this).parents().closest('li').has('.active').find(".collapsible-header").trigger("click");
});

$datingHTMLBody.on('submit', '#user-profile-name-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._name(e);
});

$datingHTMLBody.on('submit', '#user-profile-emailaddress-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._email_address(e);
});

$datingHTMLBody.on('submit', '#user-profile-password-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._password(e);
});

$datingHTMLBody.on('submit', '#user-profile-birthdate-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._birth_date(e);
});

$datingHTMLBody.on('submit', '#user-profile-country-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._country(e);
});

$datingHTMLBody.on('submit', '#user-profile-gender-form', function(e){
    e.preventDefault();
    dating.core.Binders._user._update._profile._gender(e);
});

$datingHTMLBody.on('click', '.user-add-mate-request', function(e){
    e.preventDefault();
    //dating.core.Binders._user._update._profile._gender(e);
    dating.core.Binders._mate._create._add(e);
});

$datingHTMLBody.on('click', '.user-cancel-mate-request', function(e){
    e.preventDefault();
    dating.core.Binders._mate._update._cancel(e);
});

$datingHTMLBody.on('click', '.user-accept-mate-request', function(e){
    e.preventDefault();
    dating.core.Binders._mate._update._accept(e);
});

$datingHTMLBody.on('click', '.user-remove-mate', function(e){
    e.preventDefault();
    dating.core.Binders._mate._update._remove(e);
});

$datingHTMLBody.on('click', '.user-comment-add', function(e){
    e.preventDefault();
    dating.core.Binders._comment._display._get_details(e);
});

$datingHTMLBody.on('submit', '#comment-form', function(e){
    e.preventDefault();
    dating.core.Binders._comment._create._add(e);
});

$datingHTMLBody.on('change', 'input[name="comment-photo"]', function(e){
    dating.core.Binders._comment._display._add_photo_preview(e);
});

$datingHTMLBody.on('click', '.comment-photo-delete', function(e){
    dating.core.Binders._comment._display._delete_photo_preview(e);
});

$datingHTMLBody.on('click', '.user-like-from-photo, .user-like-from-character', function(e){
    dating.core.Binders._like._create._add(e);
});


$(window).scroll(function(){
    var scrolledDown = window.scrollY;
    var o1 = $('.navbar-fixed').offset();
    var o2 = $('.current-character-avatar').offset();
    var dx = o1.left - o2.left;
    var dy = o1.top - o2.top;
    var distance = Math.sqrt(dx * dx + dy * dy);
    //console.log(dy);


    if($(window).width() > 500){
        if(scrolledDown > 0 && scrolledDown < 210){
            $('.navbar-fixed').css({
                visibility: "inherit",
                display: "block"
            });

            $('.add-character').css({
                visibility: "hidden",
                display: "block"
            });
        }
        else if(scrolledDown > 211 && scrolledDown < 500){
            $('.navbar-fixed').css({
                visibility: "hidden",
                display: "block"
            });

            $('.add-character').css({
                visibility: "visible",
                display: "block"
            });
        }

        else{
            $('.navbar-fixed').css({
                visibility: "inherit",
                display: "block"
            });
        }

    }
    else{
        if(scrolledDown > 0 && scrolledDown < 440){
            $('.navbar-fixed').css({
                visibility: "inherit",
                display: "block"
            });
        }
        else if(scrolledDown > 441 && scrolledDown < 540){
            $('.navbar-fixed').css({
                visibility: "hidden",
                display: "block"
            });
        }
        else{
            $('.navbar-fixed').css({
                visibility: "inherit",
                display: "block"
            });
        }
    }

});

$datingHTMLBody.ready(function(){
    dating.core.Binders._updates._display._get_details($datingHTMLBody.find('.homepage-updates-container'));
});

/*
$datingHTMLBody.on('mouseover', '.parallax-container', function(){
    */
/*$('.fixed-action-btn').show();*//*

        $('.edit-parallax-photo').fadeIn();
});
$datingHTMLBody.on('mouseout', '.parallax-container', function(){
    */
/*$('.fixed-action-btn').show();*//*

    $('.edit-parallax-photo').fadeOut();
});*/
