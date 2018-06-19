(function($) {
    "use strict";

    // Page scrolling - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // autocomplete for forms
    $('#country').autocomplete({
        lookup: countries,
    });
    $('#skillName').autocomplete({
        lookup: skills,
    });
    $('#updateSkillName').autocomplete({
        lookup: skills,
    });
    $('#search').autocomplete({
        lookup: skills,
    });
    
    // hide/ show label for form inputs
    $('input').keyup(function(){
        if($(this).val() == '') {
            $(this).next().show();
        }
        else {
            $(this).next().hide();
        }
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Fit Text Plugin for Main Header
    // $("h1").fitText(
    //     1.2, {
    //         minFontSize: '35px',
    //         maxFontSize: '65px'
    //     }
    // );

    // Offset for Main Navigation
    // $('#mainNav').affix({
    //     offset: {
    //         top: 50
    //     }
    // });

    // $('#sidebar-toggle').click(function(){   
    //     $('#wrapper').toggleClass('toggled');

    //     if( $('#wrapper').hasClass('toggled') ){
    //         $(this).removeClass('btn-secondary');
    //         $(this).addClass('btn-primary btn-greyscale-base');
    //     }
    //     else {
    //         $(this).addClass('btn-secondary');
    //         $(this).removeClass('btn-primary btn-greyscale-base');
    //     }
    // });

    // toggle share section
    // $('#share_button').click(function(){   
    //     $("#share").toggle();
    // });

    // submit order by form radio button
    // $('input[name=order]').change(function(){
    //     $('form#order_by').submit();
    // });
    
    // submit form when radio buttons are changed
    $('input[name=work]').change(function(){
        $('form#lookingForWork').submit();
    });
    $('input[name=order]').change(function(){
        $('form#orderBy').submit();
    });
    $('input[name=color]').change(function(){
        $('form#skillTheme').submit();
    });

    // submit skill color form radio button
    // $('input[name=color]').change(function(){
    //     $('form#skill_color').submit();
    // });

    // only one collapse menu at once
    // $('#main-navigation').on('shown.bs.collapse', function () {
    //     $("#toolbox-navigation").removeClass("in");
    // });
    // $('#toolbox-navigation').on('show.bs.collapse', function () {
    //     $("#main-navigation").removeClass("in");
    // });
    
    // fade content when navigation is open in mobile
    $('#main-navigation').on('shown.bs.collapse', function () {
        $("#profile #wrapper").addClass("fade");
    });
    $('#main-navigation').on('hidden.bs.collapse', function () {
        $("#profile #wrapper").removeClass("fade");
    });

    // $('#toolbox-navigation').on('show.bs.collapse', function () {
    //     $("#profile #wrapper").addClass("fade");
    // });
    // $('#toolbox-navigation').on('hidden.bs.collapse', function () {
    //     $("#profile #wrapper").removeClass("fade");
    // });

    // icon for user skills   
    // $('#showSkills').on('shown.bs.collapse', function () {
    //     $("#show-skills-icon").removeClass("fa-plus-circle");
    //     $("#show-skills-icon").addClass("fa-minus-circle");
    // });
    // $('#showSkills').on('hidden.bs.collapse', function () {
    //     $("#show-skills-icon").removeClass("fa-minus-circle");
    //     $("#show-skills-icon").addClass("fa-plus-circle");
    // });

    // icon for user education   
    // $('#showEducation').on('shown.bs.collapse', function () {
    //     $("#show-education-icon").removeClass("fa-plus-circle");
    //     $("#show-education-icon").addClass("fa-minus-circle");
    // });
    // $('#showEducation').on('hidden.bs.collapse', function () {
    //     $("#show-education-icon").removeClass("fa-minus-circle");
    //     $("#show-education-icon").addClass("fa-plus-circle");
    // });

    // icon for adding skill   
    // $('#collapseSkills').on('shown.bs.collapse', function () {
    //     $("#new-skills-icon").addClass("open");
    // });
    // $('#collapseSkills').on('hidden.bs.collapse', function () {
    //     $("#new-skills-icon").removeClass("open");
    // });

    // icon for adding education   
    // $('#collapseEducation').on('shown.bs.collapse', function () {
    //     $("#new-education-icon").addClass("open");
    // });
    // $('#collapseEducation').on('hidden.bs.collapse', function () {
    //     $("#new-education-icon").removeClass("open");
    // });

    // counter for percentage counter
    $('.bar-percentage[data-percentage]').each(function() {
      var progress = $(this);
      var percentage = Math.ceil($(this).attr('data-percentage'));
      $({countNum: 0}).animate({countNum: percentage}, {
        duration: 2000,
        easing:'linear',
        step: function() {
        // What todo on every count
        var pct = '';
        if(percentage == 0){
          pct = Math.floor(this.countNum) + '%';
        }else{
          pct = Math.floor(this.countNum+1) + '%';
        }
        // progress.text(pct) && progress.siblings().children().css('width',pct);
        progress.text(pct);
        }
      });
    });

    // counter for bar animation
    $('.bar[data-percentage]').each(function() {
      var bar = $(this);
      var percentage = Math.ceil($(this).attr('data-percentage'));
      $({countNum: 0}).animate({countNum: percentage}, {
        duration: 1000,
        easing:'linear',
        step: function() {
        // What todo on every count
        var pct = '';
        if(percentage == 0){
          pct = Math.floor(this.countNum) + '%';
        }else{
          pct = Math.floor(this.countNum+1) + '%';
        }
        bar.css('width',pct);
        }
      });
    });

    // LOCKED SCROLL
    $("#wrapper").scroll(function() {
        if($(this).scrollTop() > 90 ) {
            $("#mainNav").removeClass("affix-top");
            $("#mainNav").addClass("affix");    
        } else {
            $("#mainNav").removeClass("affix");
            $("#mainNav").addClass("affix-top");
        }
    });

    // Initialize WOW.js Scrolling Animations
    new WOW().init();

})(jQuery);
