// login js
var popup = {
  warningshow : function(selector,text) {
    var self = this;
    var warning = $(document.createElement('div'));
    warning.addClass('warningbox').append(text);
    warning.prependTo($(selector)).hide().slideDown();
    warning.one('click', function() {
      self.warningautomove($(this));
    });
    self.warningclear(warning);
    return true;
  },
  warningautomove: function(obj) {
    obj.fadeOut(function(){
      this.remove();
    });
  },
  warningclear : function(element) {
    setTimeout(this.warningautomove, '3000', element);
  },
  openprogress:function(){
    $("#myprogress").show();
  },
  closeprogress:function(){
    $("#myprogress").hide();
  },
  goprogress:function(t){
    $("#myprogress .progress-bar").attr("aria-valuenow" ,t);
    $("#myprogress .progress-bar").css("width", t+"%");
    $("#myprogress .sr-only").text(t+"%");
  },
  openwarning:function(text){
    this.warningshow('#warningpopup',text);
  },
  opencomfirm:function(text,fun){
    var a = '<div>'+text+'</div>';
    a += '<div>';
    a += '<button type="button" onclick="popup.closecomfirm()" class="btn btn-default btn-sm">CANCEL</button>&nbsp;&nbsp;';
    a += '<button type="button" onclick="'+fun+'" class="btn btn-primary btn-sm">TRUE</button>';
    a += '</div>';
    $("#comfirmpopup > .comfirmpopup").html(a);
    $("#comfirmpopup").show();
  },
  closecomfirm:function(){
    $("#comfirmpopup>.comfirmpopu").empty();
    $("#comfirmpopup").hide();
  },
  openloading:function(){
    $("#loadingpopup").show();
  },
  closeloading:function(){
    $("#loadingpopup").hide();
  }
};

(function($, popup){
  $(function(){
    $("#loginsubmit").click(function(){
      popup.openwarning("login error");
      window.location.reload();
    });
  });
})(jQuery, popup);
