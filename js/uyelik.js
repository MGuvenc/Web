$('.mesaj a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });
 
btn2.onclick=function(){
    mesaj.innerHTML ="Giriş Başarılı!";
}