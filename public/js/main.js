$(document).ready(function(){

    function mobileSearch(action){
        if(action == 'show'){
        $('#screen-overlay').show();
        $('#mobile-search').css('display', 'flex');
        }
        if(action == 'hide'){
            $('#screen-overlay').hide();
            $('#mobile-search').hide();
        }
    }

    function mobileProfile(action){
        if(action == 'show'){
        $('#screen-overlay').show();
        $('#mobile-profile').css('display', 'flex');
        }
        if(action == 'hide'){
            $('#screen-overlay').hide();
            $('#mobile-profile').hide();
        }
    }

    $('#mobile-search-show').on('click', function(){
        mobileSearch('show');
    });

    $('#mobile-search-hide').on('click', function(){
        mobileSearch('hide');
    });

    $('#mobile-profile-show').on('click', function(){
        mobileProfile('show');
    });

    $('#mobile-profile-hide').on('click', function(){
        mobileProfile('hide');
    });

    $('#screen-overlay').on('click', function(){
        mobileSearch('hide');
        mobileProfile('hide');
    })
})
