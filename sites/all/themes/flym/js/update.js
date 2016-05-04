//Update JS for theme
WebFont.load({
    google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic", "Raleway:200,300,regular,500,600,700,800,900", "Playfair Display:regular,italic,700,700italic,900,900italic:latin,cyrillic,latin-ext"]
    }
});
(function($) {
    $(document).ready(function() {
        
        $('.comment-form textarea').attr('placeholder','Write Message');
        
        $('nav.nav-menu-main nav >ul.w-list-unstyled >li.li-nav').each(function(index, el) {
            if ($(this).find('a.nav-link').is('.active') || $(this).find('a.nav-link').is('.active-trail')) {
                $(this).find('>ul').show();
            }
        });

        $('.skill .li-progres .pbar').each(function(index, el) {
            var progres = $(this).find('.pbar-overlay').attr('data-ix');
            $(this).find('.pbar-overlay').css('width', progres);
        });

        setTimeout(function() {
            if ($('.blog-content').find('.item-content').length > 2) {
                $('.blog-content').masonry({
                    itemSelector: '.item-content',
//                        columnWidth: 1,
//                        isAnimated: true,
//                        isFitWidth: true,
                });
            }
        }, 500);
        $('.section-wrapper.sec-slider .m-slider .w-slider-mask .w-slide.slide ').each(function(index, el) {
            var img_slide = $(this).find('>img').attr('src');
            $(this).css('background-image', " url('" + img_slide + "')");
            $(this).find('>img').remove();
        });
    });
    
     
 function initPhotoGallery () {
    var imagesArray = [];

    $('.photo-gallery').on('click', '.gallery-item a', function(event) {
      event.preventDefault();

      var gallery = $(this).parents('.photo-gallery');
      var galleryElements = gallery.find('.gallery-item>a');

      for (var i = 0; i < galleryElements.length; i++) {
        imagesArray.push($(galleryElements[i]).attr('href'));
      };

      var image = $(this).attr('href');

      var template = '<div id="gallery-modal">';
      template += '<div class="centrize">';
      template += '<div class="v-center">';
      template += '<div class="gallery-image">';
      template += '<a href="#" id="gallery-close"><i class="ti-close"></i></a>';
      template += '<a href="#" class="gallery-control gallery-prev"><i class="ti-angle-left"></i></a>';
      template += '<img src="'+imagesArray[imagesArray.indexOf(image)]+'" alt="">';
      template += '<a href="#" class="gallery-control gallery-next"><i class="ti-angle-right"></i></a>';
      template += '</div>';
      template += '</div>';
      template += '</div>';
      template += '</div>';

      $('body').append(template);
      $('body').addClass('modal-open');

      $('#gallery-modal').fadeIn(300);

    });

    $('body').on('click', '.gallery-control', function(event) {
      event.preventDefault();
      event.stopPropagation();

      var currentImage = $('.gallery-image').find('img');

      if ($(this).hasClass('gallery-next')) {
        if (imagesArray.indexOf(currentImage.attr('src')) >= (imagesArray.length - 1)) {
          return false;
        }

        currentImage.fadeOut(300, function() {
          var nextImage = imagesArray[imagesArray.indexOf(currentImage.attr('src')) + 1]
          $(currentImage).attr('src', nextImage);
        }).fadeIn(300);
      }

      else if ($(this).hasClass('gallery-prev')) {
        if (imagesArray.indexOf(currentImage.attr('src')) < 1) {
          return false;
        }

        currentImage.fadeOut(300, function() {
          var nextImage = imagesArray[imagesArray.indexOf(currentImage.attr('src')) - 1]
          $(currentImage).attr('src', nextImage);
        }).fadeIn(300);

      }

    });

    $('body').on('click', '#gallery-close', function(event) {
      event.preventDefault();
      $('#gallery-modal').fadeOut(300, function() {
        $('#gallery-modal').remove();
      });
      $('body').removeClass('modal-open');
    });

    $('body').on('click', '.gallery-image', function(event) {
      event.stopPropagation();
    });

    $('body').on('click', '#gallery-modal', function(event) {
      $('#gallery-close').trigger('click');
    });

    $(document).keyup(function(e) {
      if (e.keyCode == 27) {
        $('#gallery-close').trigger('click');
      }
      if (e.keyCode == 37) {
        $('.gallery-control.gallery-prev').trigger('click');
      }
      if (e.keyCode == 39) {
        $('.gallery-control.gallery-next').trigger('click');
      }
    });
 }
 initPhotoGallery ();
  
})(jQuery);