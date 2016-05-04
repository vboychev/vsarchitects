$('.lightbox .w-col-4').each(function(index, el) {
    var a = $(this).find('img').attr('src');
    var b = {"items": [
            {
                "type": "image",
                "url": "https://daks2k3a4ib2z.cloudfront.net/5484729a8088a52a27608d60/54b2bccefd1016be5d473acf_light1.jpg",
                "width": 800,
                "height": 800
            }
        ],
        "group": "Gallery"};
    $(this).find('img').append(b);
});
