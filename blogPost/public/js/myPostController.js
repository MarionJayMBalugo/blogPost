$(document).ready(()=>{
    let mypost=new RedirectPage();
    mypost.viewAllPost();
    mypost.viewMyPost();
});

//class for redirecting pages
let RedirectPage=function(){
    this.toHome=()=>{  
        location.replace("/home");    
    };
    this.toMyPost=()=>{  
        location.replace("user/myPost");    
    };
    this.viewAllPost=()=>{
        $('#viewAllPosts').on('click',()=>{
            this.toHome();
        });
    }
    this.viewMyPost=()=>{
        $('#viewMyPosts').on('click',()=>{
            this.toMyPost();
        });
    }
}

