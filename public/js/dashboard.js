$(function(){

    function updateForm(action){
        if(action == 'show'){
            $('#editContainer').css("display", "flex" );
            $('#screen-overlay').show();
            $('body').css("overflow", "hidden" );
        }
        if(action == 'hide'){
            $('#editContainer').hide();
            $('#screen-overlay').hide();
            $('body').css("overflow", "scroll" );
        }
    }

    $("#updateBtn").on('click', function(){
        console.log('Ok');
        updateForm('show');
    })

    $("#updateFormCancel").on('click', function(e){
        e.preventDefault();
        updateForm('hide');
    })

    $('#avatar').on('change', function(){
        let file = this.files[0];
        let reader = new FileReader();
        reader.onload = function(event){
            $('#avatarPreview').attr("src",event.target.result);
        };
        reader.readAsDataURL(file);
    });
})
