function loadFile(event){
    console.log(event.target.files[0].size);

    var width = event.target.offsetWidth;
    var height = event.target.offsetHeight;
    /*if(width > 301 || height > 301){
        *//*var r = confirm("Do you want your image to be resized to 300 x 300? Please confirm");
         if(r == true){
         j_crop(event);
         }*//*
        alert("Please choose an image that is less than 301 x 301");
    }
    else{
        j_crop(event);
    }*/
    j_crop(event);
}
function j_crop(event){
    $('.jcrop-preview').attr('src', URL.createObjectURL(event.target.files[0]));
    var output = document.getElementById('target');
    var jcrop_api,
        boundx,
        boundy,
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();

    var element = $('<img class="image-display">');
    element.attr('src', URL.createObjectURL(event.target.files[0]));
    element.Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        aspectRatio: 1
        //trueSize: [500,370]
    },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
        console.log(this);
        // Move the preview into the jcrop container for css positioning
        $preview.appendTo(jcrop_api.ui.holder);
    });

    //console.log(element);
    $('.modal-avatar-preview-crop').openModal();
    $('.user-avatar-preview').html(element);

    function updatePreview(c)
    {
        if (parseInt(c.w) > 0)
        {
            var rx = xsize / c.w;
            var ry = ysize / c.h;

            $pimg.css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
        }
        updateCoords(c);
    }
    function updateCoords(c)
    {
        jQuery('body').find('input[name="x"]').val(c.x);
        jQuery('body').find('input[name="y"]').val(c.y);
        jQuery('body').find('input[name="w"]').val(c.w);
        jQuery('body').find('input[name="h"]').val(c.h);
    }
}