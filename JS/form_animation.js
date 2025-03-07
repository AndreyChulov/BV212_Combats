$(".login-form>a").on("click", function(event){
    console.log(event)

    let isSignUpLink = $(event.currentTarget).hasClass("signUpLink");
    let isLoginLink = $(event.currentTarget).hasClass("loginLink");
    let isRestoreLink = $(event.currentTarget).hasClass("restoreLink");

    console.log(isRestoreLink, isSignUpLink, isLoginLink);

    $(".form-container")
        .removeClass("form-signUp")
        .removeClass("form-login")
        .removeClass("form-forget")

    if (isSignUpLink === true){
        $(".form-container").addClass("form-signUp");
    } else
    if (isLoginLink === true){
        $(".form-container").addClass("form-login");
    } else
    if (isRestoreLink === true){
        $(".form-container").addClass("form-forget");
    }



    //let style = $(event.currentTarget).sty
    //event.elem.addClass("form-closing")
    //console.log(style)
})

