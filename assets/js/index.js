$(function () {
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
});