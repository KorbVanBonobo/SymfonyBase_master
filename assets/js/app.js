import 'bootstrap';

$(function () {

   var total_compteur = 0, data_temp = [], data_compteur = [], data_compteur_temp = [], color_index = ["#810000","#ff5a5a","#ff0000","#a34f00","#ffa551","#ff7b00","#b19f00","#ffee56","#ffe600","#2fa500","#7bff47","#48ff00","#00a098","#57fff7","#00fff2","#001b94","#4a6bff","#002fff","#6500a0","#be4fff","#9e00fa","#97008b","#ff4bf0","#ff00ea","#acacac","#585858","#000000","#c0883f","#c06d00","#6e3f00","#ffffff"];
   

   
  
   $(".activation-btn").click(function(e){
    e.preventDefault();
    var $self = $(this);
    var $active = $self.closest('tr').find(".active")
    //var $activation = $active.attr('data');
    console.log($self);
    console.log($self.attr('href'));
    //console.log($activation);
    $.post($self.attr('href'), {}, function(data){

        if (data.status){

            $active.html('en boutique');
            $self.css("color", "green" )

        }else{

            $active.html('en attente de validation');
            $self.css("color", "red" )
        }
        
    }, 'json');
    })


    var header = $(".header");
    var logo = $(".logo");
    var siteTitle = $(".siteTitle");
    var mainPage = $(".mainPage");
    var headJumbo = $(".headJumbo");
    var articles = $(".articles");
    var rechercher = $(".rechercher");
    var editeur = $(".editeur");
    var headerTop = $(".headerTop");
    var headerFoot = $(".headerFoot");
    var guide = $(".guide");

$(".main").scroll(function () {
        var scroll = $(".main").scrollTop();

        if (scroll >= 100) {
            header.removeClass('header').addClass("header2");
            logo.removeClass('logo').addClass("logo2");
            siteTitle.removeClass('siteTitle').addClass("siteTitle2");
            mainPage.removeClass('mainPage').addClass("mainPage2");
            headJumbo.removeClass('headJumbo').addClass("headJumbo2");
            articles.removeClass('articles').addClass("articles2");
            rechercher.removeClass('rechercher').addClass("rechercher2");
            editeur.removeClass('editeur').addClass("editeur2");
            headerTop.removeClass('headerTop').addClass("headerTop2");
            headerFoot.removeClass('headerFoot').addClass("headerFoot2");
            guide.removeClass('guide').addClass("guide2");
        } else {
            header.removeClass("header2").addClass('header');
            logo.removeClass("logo2").addClass('logo');
            siteTitle.removeClass('siteTitle2').addClass("siteTitle");
            mainPage.removeClass('mainPage2').addClass("mainPage");
            headJumbo.removeClass('headJumbo2').addClass("headJumbo");
            articles.removeClass('articles2').addClass("articles");
            rechercher.removeClass('rechercher2').addClass("rechercher");
            editeur.removeClass('editeur2').addClass("editeur");
            headerTop.removeClass('headerTop2').addClass("headerTop");
            headerFoot.removeClass('headerFoot2').addClass("headerFoot");
            guide.removeClass('guide2').addClass("guide");
        }
    });

// Pour l'index



$('.row-oeuvre').each(function(index, element){
    var $el = $(element);
    var oeuvre_taille_x = $el.find('.oeuvre-taillex').attr('data');
    var oeuvre_taille_y = $el.find('.oeuvre-tailley').attr('data');
    var $active = $el.closest('tr').find(".active") ;
    var $bouton = $el.find(".activation-btn");
    
    if ($active.attr('data')){

        $active.html('en boutique');
        $bouton.css("color", "green" );

    }else{

        $active.html('en attente de validation');
        $bouton.css("color", "red" );
    }
    

    var data = $el.find('.oeuvre-img').attr('data');
    data_temp = JSON.parse(data);
    data = [];
    for (var x in data_temp){
      data.push(data_temp[x]);
      
    }

    var $pixel = $('<div class="post_it_miniature"></div>');
    var $pixel2 = $('<div class="b_post_it"></div>');
    $.each(data, function(key, color){
        var $newPixel = $pixel.clone();
        var $newPixel2 = $pixel2.clone();
        $newPixel.css('background-color', color);
        $newPixel2.css('background-color', color);
        $el.find('.main-editor_miniature').append($newPixel);
        $el.find('.b_main').append($newPixel2);


    var taille_x = oeuvre_taille_x * 4;
    var taille_y = oeuvre_taille_y * 4;
    var b_taille_x = oeuvre_taille_x * 10;
    var b_taille_y = oeuvre_taille_y * 10;
    $el.find(".main-editor_miniature").css('height', taille_y + 'px' );
    $el.find(".main-editor_miniature").css('width', taille_x + 'px' ); 

    // pour la boutique
    $el.find(".b_main").css('height', b_taille_y + 'px' );
    $el.find(".b_main").css('width', b_taille_x + 'px' ); 


});

});



// Affichage du compteur
data_compteur = $('.compteur').attr('data');
data_compteur_temp =JSON.parse(data_compteur);
data_compteur = [];
 
for (var y in data_compteur_temp){
    data_compteur.push(data_compteur_temp[y]);  
}
console.log(data_compteur)
$.each(data_compteur, function(key, color){
   
    if ( data_compteur[key] != 0 ){

        $('<p>' + data_compteur[key] + '</p><div class="carre_couleur" style="background-color :' + color_index[key] +'"></div>').appendTo( ".compteur_c");
        total_compteur += data_compteur[key];
    }
    
});
$(".total_post_it").text('Total de post-it -> ' + total_compteur + ' avec :')
$(".temp_moyen_post_it").text('Temps de creation estimé : ' + Math.round((total_compteur) / 8) +' minutes')
$(".prix_post_it").text('Prix : ' + (Math.round(((total_compteur) * 1.5)) / 100).toString().replace('.', ',') +' €')









});
