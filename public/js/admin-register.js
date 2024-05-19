$(function(){
    $(".kelas .dropdown-menu a").click(function(){
      $(".kelas .btn:first-child").text($(this).text());
      $(".kelas .btn:first-child").val($(this).text());
      $("#input-kelas").val($(this).text().toLowerCase());
   });
   $(".jurusan .dropdown-menu a").click(function(){
      $(".jurusan .btn:first-child").text($(this).text());
      $(".jurusan .btn:first-child").val($(this).text());
      $("#input-jurusan").val($(this).text().toLowerCase());
   });

});